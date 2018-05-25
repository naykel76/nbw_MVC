<?php 

    /*
        Define application settings and database config
    */

    $appRoot = '/nbw_mvc/app';

    // Database Credentials (Constants)
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','nbw_site');

    // App Root
    define('APPROOT', $_SERVER['DOCUMENT_ROOT'] . $appRoot);
    // URL Root (base)
    define('BASEURL', 'http://localhost/nbw_mvc/app');
    // Site Name
    define('SITENAME', 'NBW Site and FrameWork');
    // App Version
    define('APPVERSION', '1.0.0');