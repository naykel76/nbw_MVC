<?php
class Pages extends Controller{
    public function __construct(){
    }


    public function index(){
        
        $data = ['title' => 'Page Title'];

        $this->view('pages/index', $data);
    }

    public function test() {

        echo "<h5 class='txt-green'>'test' METHOD loaded from ./controllers/Pages.php!</h5>";
        
        /* -- LOAD VIEW and PASS DATA ------------------------
        | view takes 2 parameters ($view, $data = []) 
        | add data to the array ['arrayItemTitle' => 'array data'] or ['key' => 'value']
        | */

        $data = [
            'title' => 'This is the title from the data array',
            'firstname' => 'Nathan',
            'lastname' => 'Watts'
        ];

        $this->view('pages/test', $data);
    }
}

