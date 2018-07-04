<?php 

class TEST {

    private $db; // database instance
    private $_obj; // this is the object. normally be something like 'users' or 'articles'

    private $tbl = 'tbl_test';

    public function __construct() {
        // connect to db
        $this->db = DB2::getInstance();

        // $this->getSingle();
        $this->getAll();
    }

    public function getSingle() {
        $this->_obj = $this->db->get('tbl_test', array('firstname', '=', 'Mike'));

        if(!$this->_obj->count()) {
            echo "no records returned";
        } else {
            echo $this->_obj->first()->firstname;
        }
    }

    public function getAll() {
        $this->_obj = $this->db->query("SELECT * FROM $this->tbl");

        if(!$this->_obj->count()) {
            echo "no records returned";
        } else {
            foreach($this->_obj->results() as $result){
                // $result->columName;


                echo $result->firstname . $result->lastname . "</br>";
            }
        }
    }



    public function getArticles() {
        $this->db->query('SELECT * FROM tbl_articles');

        $results = $this->db->resultSet();

        return $results;
    }


    public function getArticleByID($id) {
        $this->db->query('SELECT * FROM tbl_articles WHERE id = :id');
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();

        return $row;
    }   

    public function getArticlesByCategory($category) {
        $this->db->query('SELECT * FROM tbl_articles WHERE category = :category');
        $this->db->bind(':category', $category);
        
        $results = $this->db->resultSet();

        return $results;
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
