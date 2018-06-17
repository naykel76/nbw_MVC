<?php 

    /*
        Define application settings and database config
    */

    $appRoot = '/nbw_mvc/app';
    $baseUrl = 'http://localhost/nbw_mvc/app';
    $siteName = 'NBW Site and FrameWork';

    // Database Credentials (Constants)
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','nbw_mvc');

    define('APPROOT', $_SERVER['DOCUMENT_ROOT'] . $appRoot);
    define('BASEURL', $baseUrl);
    define('SITENAME', $siteName);
