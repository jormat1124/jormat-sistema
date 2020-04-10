<?php

sleep(1);
include ("../conexion.php");
require("../mikrotik/variables.php");
require('../mikrotik/funciones.php');
require('../mikrotik/apimikrotik.php');
$API = new routeros_api();
$API->debug = false;
if ($API->connect(IP_MIKROTIK, USER, PASS)) {
    //Creacion Usuarios PPPoE Usermanager

    $nombre = strtolower($_POST['nombre']);
    $apellido = strtolower($_POST['apellido']);
    $celular = $_POST['celular'];
    $telefono = $_POST['telefono'];
    //$ubicacion = $_POST['ubicacion'];
   // $precio = $_POST['precio'];
    $plan = $_POST['plan'];
    $corresponde = $_POST['corresponde'];
    $dia = $_POST['dia'];



    
    $name = ($nombre.'_'.$apellido);
    $password = $corresponde;
    $service = "pppoe";
    $phone = ($celular.'-'.$telefono);
    $profile = $plan;
    $comentarios = date('Y-m-d');

        if(isset($user) || isset($password) || isset($plan)){
            //valido nombre usuario
            $API->write("/ppp/secret/getall",false);
            $API->write('?name='.$name,true);
            $READ = $API->read(false);
            $ARRAY = $API->parse_response($READ);
            //Crea usuario, customer y password
            if(count($ARRAY)>0){ // si el nombre de usuario "ya existe" lo edito
                echo "Error: El nombre no puede estar duplicado, el proceso no termino.";
            }else{
            $API->write("/ppp/secret/add",false);
            $API->write("=name=".$name,false);
            $API->write("=password=".$password,false);
            $API->write("=service=".$service,false);
            $API->write("=caller-id=".$phone,false);
            $API->write("=profile=".$plan,false);       
            $API->write("=comment=".$comentarios,true);
           
            $READ = $API->read(false);
         
        
        }
        
        
    }
}
?>