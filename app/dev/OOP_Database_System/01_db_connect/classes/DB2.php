<?php 

/*
	This class is built on the singleton pattern where you get the instance of
	the database if it has already been instantiated rather than connecting to
	the database on each page.
*/

class DB2{

	private static $instance = null; // store the instance of db if available

	private $db, // store the instantiated db object so it can be stored and used elseware
			$query, // the last query executed
			$error = false,
			$results, // store the result set retuned from the query
			$resultsCount = 0;

  
    public function __construct(){
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
            // echo "<h5>Connected successfully</h5>";
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

	// function to check to see if already connected to the database (object has been instatiated)
	public static function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new DB2();
		}
		return self::$instance;
	}


}
