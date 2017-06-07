<?php
  //Se incluye la configuración de conexión a datos en el
  //SGBD: SISGCS.
  require_once 'config/config.php';
  
  //Para registrar productos es necesario iniciar los proveedores
  //de los mismos, por ello la variable controller para este
  //ejercicio se inicia con el 'proveedor'.

  if(isset($_SESSION['user_session'])){

      //$controller = 'login';
      $controller = 'proyecto';
  	  $controller = 'metodologia';
      $controller = 'etapa';
      $controller = 'entregable';
      $controller = 'usuario';
      $controller = 'rol';
      $controller = 'proyectoentregable';
      $controller = 'especialidad';

      // Todo esta lógica hara el papel de un FrontController
      if(!isset($_REQUEST['c']))
      {
        //Llamado de la página principal
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;
        $controller->Index();
      }
      else
      {
        // Obtiene el controlador a cargar
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

        // Instancia el controlador
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;

       
        // Llama la accion
        call_user_func( array( $controller, $accion ) ) ;
      }
  }

  else
  {  
        // Obtiene el controlador a cargar
        $controller = 'login';
        //header("Location: ?c=login&a=index");exit;  
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'login';

        require_once "controller/login.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new LoginController();
        $controller->Index(); 

        call_user_func( array( $controller, $accion ) );
  }