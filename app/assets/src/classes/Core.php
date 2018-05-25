<?php

/* -- CORE CLASS -------------------------------
   Creates URL & loads core controller
   URL (array) FORMAT - /controller/method/params 
   URL (array) FORMAT - /$url[0]/$url[1]/params
   the url 
*/
  
  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        // print_r($this->getUrl());
        $url = $this->getUrl();
        
        // Look in controllers for $url[0] value to set as $currentController
        if(file_exists('../app/assets/src/controllers/' . ucwords($url[0]). '.php')){
            // If the file exists in controllers, set as $currentController
            $this->currentController = ucwords($url[0]);
            // Unset 0 Index
            unset($url[0]);
        } 

        // Require the controller
        require_once '../app/assets/src/controllers/'. $this->currentController . '.php';
        // Instantiate the controller (the class in the controller)
        $this->currentController = new $this->currentController;

        // Check for the method (second part) of the $url[1]
        if(isset($url[1])){
            // Check to see if method exists in $currentController and set to $currentMethod
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                // Unset 1 index
                unset($url[1]);
            }
        }


        // Get params
        // NBW what are the params used for???
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

    /* get the url from the address bar */
    public function getUrl(){
        // check to see if url is set
        if(isset($_GET['url'])){
            // remove trailing slash from URL root/dir/ = root/dir
            $url = rtrim($_GET['url'], '/');
            // remove any characters that a URL should NOT have
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // break URL into array root/dir/file.php = ['root', 'dir', 'file.php']
            $url = explode('/', $url);
            return $url;
        }
    }
} 

