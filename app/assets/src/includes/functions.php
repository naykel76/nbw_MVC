<?php

    session_start();

    function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }
    
    // page redirect
    function redirect($page) {
        header('location: ' . BASEURL . '/' . $page);
    }
