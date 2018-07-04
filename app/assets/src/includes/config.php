<?php 

    /*
        Define application settings and database config

        This config should only be used for local development. The config path
        is updated during the build process and points to a config file stored
        outsite the public folder
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


        
