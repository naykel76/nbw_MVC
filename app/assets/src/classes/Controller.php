<?php

/*
* Base Controller
* Loads the models and views
*/

    // echo "<h1>Base controller loaded!</h1>";

class Controller {

    // Load model
    public function model($model){
        // Require model file from model dir
        require_once '../app/assets/src/models/' . $model . '.php';

        // Instatiate model
        return new $model();
    }

    // Load view
    public function view($view, $data = []){
        // Check for view file in view dir
        if(file_exists('../app/assets/src/views/' . $view . '.php')){
            require_once '../app/assets/src/views/' . $view . '.php';
        } else {
        // View does not exist
            die('View does not exist');
        }
    }
}