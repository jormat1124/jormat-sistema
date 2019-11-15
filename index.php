<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: principal-vista.php');
    }else{
        header('location: login.php');
    }


?>