<?php 

class TEST {

    private $db;

    public function __construct() {
        // connect to db
        $this->db = DB2::getInstance();
    }

    // /*
    // | methods come from the database class
    // */
    // public function getResults() {
    //     // connectToDB->queryMethod->SQL
    //     $this->db->query("SELECT * FROM tbl_test");

    //     // connectToDB->resultSetMethod
    //     return $this->db->resultSet();
    // }



}


    
// original connection method
    // private $db;

    // public function __construct() {
    //     $this->db = new Database;
    // }