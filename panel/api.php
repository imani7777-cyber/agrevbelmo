<?php

    class con extends SQLite3 {

        function __construct() {
            $dbPath = dirname(__DIR__,1) . '/panel/database.db';
            if (!file_exists($dbPath)) {
                die("Database file not found: " . $dbPath);
            }
            $this->open($dbPath);

            // 🔥 IMPORTANT
            $this->busyTimeout(5000);

            // 🔥 PERFORMANCE + LOCK FIX
            $this->exec("PRAGMA journal_mode=WAL;");
            $this->exec("PRAGMA synchronous=NORMAL;");
            $this->exec("PRAGMA temp_store=MEMORY;");
            $this->exec("PRAGMA cache_size=10000;");
        }

        function command($sql,$params = []) {

            $stmt = $this->prepare($sql);

            if (!$stmt) {
                die("Prepare Error: " . $this->lastErrorMsg());
            }

            foreach ($params as $key => $value) {

                if (is_int($value)) {
                    $stmt->bindValue(':' . $key, $value, SQLITE3_INTEGER);
                } else {
                    $stmt->bindValue(':' . $key, $value, SQLITE3_TEXT);
                }

            }

            $result = $stmt->execute();

            if (!$result) {
                die("SQL Error: " . $this->lastErrorMsg());
            }

            return $result;
        }

        function MyData($data) {
            $my_array = [];
            while ($row = $data->fetchArray(SQLITE3_ASSOC)) {
                $my_array[] = $row;
            }
            $data->finalize();
            return $my_array;
        }
    }

    $connexion = new con();

    function insert_data($table,$data = []) {
        GLOBAL $connexion;
        if(empty($table) || !is_array($data)) {
            return false;
        }
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        return $connexion->command($sql,$data);
    }

    function update_data($table,$data = [],$condition = []) {
        GLOBAL $connexion;
        if(empty($table) || !is_array($data)) {
            return false;
        }
        $setParts = [];
        foreach($data as $key => $value) {
            $setParts[] = "$key = :set_$key";
        }
        $whereParts = [];
        foreach($condition as $key => $value) {
            $whereParts[] = "$key = :where_$key";
        }
        $sql = "UPDATE $table SET "
            . implode(", ", $setParts)
            . " WHERE "
            . implode(" AND ", $whereParts);

        $params = [];
        foreach($data as $key => $value) {
            $params["set_$key"] = $value;
        }
        foreach($condition as $key => $value) {
            $params["where_$key"] = $value;
        }
        return $connexion->command($sql,$params);
    }

    function delete_data($table,$data = []) {
        GLOBAL $connexion;
        if(empty($table) || !is_array($data)) {
            return false;
        }
        $whereParts = [];
        foreach($data as $key => $value) {
            $whereParts[] = "$key = :$key";
        }
        $sql = "DELETE FROM $table WHERE "
            . implode(" AND ", $whereParts);
        return $connexion->command($sql,$data);
    }

    function get_data($table,$data = null) {
        GLOBAL $connexion;
        if(empty($table)) {
            return false;
        }
        $sql = "SELECT * FROM $table";
        $params = [];
        if(!empty($data)) {
            $conditions = [];
            foreach($data as $key => $value) {
                $conditions[] = "$key = :$key";
                $params[$key] = $value;
            }
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
        $sql .= " ORDER BY id DESC";
        $query = $connexion->command($sql,$params);
        return $connexion->MyData($query);
    }

    function action($jsonData) {

        GLOBAL $connexion;

        $jsonData = json_decode($jsonData, true);

        if ($jsonData === null) {
            echo "Invalid JSON data";
            exit;
        }

        if ($jsonData['action'] !== 'GET' && $jsonData['action'] !== 'INSERT' && $jsonData['action'] !== 'VISITORS' && $jsonData['action'] !== 'UPDATE' && $jsonData['action'] !== 'RESETGOTO' && $jsonData['action'] !== 'CHECKGOTO') {
            echo "Invalid Action";
            exit;
        }

        $action = $jsonData['action'];

        // ACTION : INSERT
        if( $action == 'INSERT' ) {
            $insert = insert_data('data',[
                'ip' => $jsonData['ip'],
                'created_at' => date('Y-m-d h:i:s'),
                'results' => json_encode($jsonData['results']),
            ]);
        }

        // ACTION : UPDATE
        if( $action == 'UPDATE' ) {
            $get = get_data('data',['ip' => $jsonData['ip']]);
            $dd = $get[0];
            $old = json_decode($dd['results'],true);
            $new = array_merge($old,$jsonData['results']);        
            $data = [
                'results' => json_encode($new),
            ];
            $conditions = [
                'id' => $dd['id'],
            ];
            $update = update_data('data',$data,$conditions);
        }

        // ACTION : GET
        if( $action == 'GET' ) {
            $check = get_data('data',['ip' => $jsonData['ip']]);
            if( count($check) == 0 ) {
                http_response_code(400); // Bad Request
                echo json_encode(['error' => 'Invalid Data']);
                exit;
            } else {
                return $check[0]["data"];
            }
        }

        // ACTION : VISITORS
        if($action == 'VISITORS') {
            $check = get_data('visitors',[
                'ip' => $jsonData['ip']
            ]);
            $needUpdate = true;
            if(count($check) > 0) {
                $visitor = $check[0];
                if(
                    $visitor['page'] == $jsonData['page']
                    &&
                    (time() - $visitor['last_activity']) < 15
                ) {
                    $needUpdate = false;
                }
            }
            if($needUpdate) {
                $sql = "
                    INSERT OR REPLACE INTO visitors
                    (
                        id,
                        ip,
                        page,
                        last_activity,
                        created_at,
                        updated_at
                    )
                    VALUES
                    (
                        (SELECT id FROM visitors WHERE ip = :ip),
                        :ip,
                        :page,
                        :last_activity,
                        COALESCE(
                            (SELECT created_at FROM visitors WHERE ip = :ip),
                            :created_at
                        ),
                        :updated_at
                    )
                ";
                $connexion->command($sql,[
                    'ip' => $jsonData['ip'],
                    'page' => $jsonData['page'],
                    'last_activity' => time(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }

        // ACTION : RESETGOTO
        if( $action == 'RESETGOTO' ) {
            $check = get_data('data',['ip' => $jsonData['ip']]);
            if( count($check) > 0 ) {
                $update = update_data('data',['goto' => 0],['ip' => $jsonData['ip']]);
            }
        }

        // ACTION : CHECKGOTO
        if( $action == 'CHECKGOTO' ) {
            $check = get_data('data',['ip' => $jsonData['ip']]);
            if( count($check) > 0 ) {
                return $check[0]["goto"];
            }
        }

    }

register_shutdown_function(function() {

    GLOBAL $connexion;

    /*file_put_contents(
        __DIR__ . "/shutdown_test.txt",
        date("H:i:s") . PHP_EOL,
        FILE_APPEND
    );*/

    if($connexion) {
        $connexion->close();
    }

});


?>