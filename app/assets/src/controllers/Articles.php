<?php 

class Articles extends Controller {

    public function __construct() {
        // load the model's
        $this->articleModel = $this->model('Article');
    }


    /* 
     | complete list of articles 
     */

    public function articles() {
        // set the model data to variable
        $articles = $this->articleModel->getArticles();

        // data array to accept data from model, or other
        $data = [
            'title' => 'Title Goes Here',
            'articles' => $articles
        ];

        $this->view('articles/articles', $data);
    }

    /* 
     | Articles by Category 
     */
    public function category($category) {
        // set the model data to variable
        $articles = $this->articleModel->getArticlesByCategory($category);

        // data array to accept data from model, or other
        $data = [
            'title' => 'Title Goes Here',
            'articles' => $articles
        ];

        $this->view('articles/category', $data);
    }



    public function show($id) {

        $article = $this->articleModel->getArticleById($id);
        

        $data = [
            'title' => 'article title',
            'article' => $article
        ];

        $this->view('articles/article', $data);
    }

}

    // public function getModel($name = 'form', $prefix = '', $config = array('ignore_request' => true))
    // {
    //     return parent::getModel($name, $prefix, $config);
    // }