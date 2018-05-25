<?php
    
    require_once 'includes/config.php';
    require_once 'includes/functions.php';

    // Load Libraries
    // require_once 'libraries/Core.php';
    // require_once 'libraries/Controller.php';
    // require_once 'libraries/Database.php';

      // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'classes/' . $className . '.php';
  });
  