<?php

/*
    Default controller
*/
class Pages extends Controller{
    public function __construct(){
    }


    public function index(){
        
        $data = ['title' => 'Page Title'];

        $this->view('pages/index', $data);
    }


}
