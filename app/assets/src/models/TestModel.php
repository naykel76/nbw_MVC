<?php 

class TestModel {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    /*
    | methods come from the database class
    */
    public function getResults() {
        // connectToDB->queryMethod->SQL
        $this->db->query("SELECT * FROM tbl_test");

        // connectToDB->resultSetMethod
        return $this->db->resultSet();
    }

}