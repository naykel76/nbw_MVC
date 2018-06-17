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
            $_results, // store the result set retuned from the query
            $resultsCount = 0;

  
    public function __construct(){
        // un-comment to display errors
        $options = array(
            // PDO::ATTR_PERSISTENT => true,
            // PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
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

    // https://www.youtube.com/watch?v=PaBWDOBFxDc&list=PLfdtiltiRHWF5Rhuk7k4UAU1_yLAZzhWc&index=8
    public function query($sql, $params = array()) {
        $this->error = false;

        if($this->query = $this->db->prepare($sql)) { // store query in query parameter
            $x = 1;

            // loop to parameters to bind 5:30
            if(count($params)) {
                foreach($params as $param) {
                    $this->query->bindValue($x, $param); // bind position x to parameter
                    $x++; // position counter for bind position loop
                }
            }

            if($this->query->execute()) { // run stored query
                // echo "<h5>The query has been run successfully</h5>";
                $this->_results = $this->query->fetchAll(PDO::FETCH_OBJ); // return results as object and set $results patemeter
                $this->resultsCount = $this->query->rowCount();
            } else {
                $this->error = true;
            }
        }

        return $this;
    }

    // construct query sql (the query queryAction)
    public function queryAction($action, $table, $where = array()) {
        if(count($where) === 3) {
            $operators = array('=', '>', '<', '>=', '<=');

            $field    = $where[0];
            $operator = $where[1];
            $value    = $where[2];

            if(in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

                if(!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }

        }

        return false;
    }

    public function delete($table, $where) {
       return $this->queryAction('DELETE ', $table, $where);
    }

    public function get($table, $where) {
       return $this->queryAction('SELECT *', $table, $where);
    }

    public function count() {
        return $this->resultsCount;
    }

    public function error() {
        return $this->error;
    }

    public function results() {
        return $this->_results;
    }

    public function first() {
        $data = $this->results();
        return $data[0];
    }

}
