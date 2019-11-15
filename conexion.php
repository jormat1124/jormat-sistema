<?php

    
    try{
         $conexion = new PDO('mysql:host=localhost;dbname=jormatsystem', 'root', '');
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }
    
if(!isset($_SESSION)){

    session_start(); 
}
  

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'jormatsystem'
);

 

?>