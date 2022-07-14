<?php
   
    session_start();

    if(isset($_SESSION['conectado']) &&  $_SESSION['conectado'] == true )
    {
        header("Location: View/listaClientes.php");
    }

    $class = $_GET['class'];
    $method = $_GET['method'];

   $class .= 'Controller';

    require_once 'Controller/'. $class . '.php';

    $obj = new $class();
    $obj->$method();
?>