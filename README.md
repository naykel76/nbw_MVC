# Install and Configure NBW Framework

## Create tables and update “nbw_mvc” to the new database name


## Update assets/src/includes/config.php

1. Site variables
	- $appRoot = '/nbw_mvc/app';
	- $baseUrl = 'http://localhost/nbw_mvc/app';
	- $siteName = 'NBW Site and FrameWork';
2. Database Credentials
	- define('DB_HOST','localhost');
	- define('DB_USER','root');
	- define('DB_PASS','YourDBPass');
	- define('DB_NAME','YourDBNAME');


## Update app/.htaccess
1. RewriteBase /YourRoot/app