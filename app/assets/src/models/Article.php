<?php 

class Article {

    private $db;

    public function __construct() {
        // create instance of database
        $this->db = new Database();
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




    
}

// SELECT * FROM `tbl_articles` WHERE id = 1