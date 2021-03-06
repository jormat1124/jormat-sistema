<?php


include ("../conexion.php");
require("../mikrotik/variables.php");
//require('../mikrotik/funciones.php');
require('../mikrotik/apimikrotik.php');
ini_set('date.timezone','America/Santo_Domingo');
$API = new routeros_api();
$API->debug = false;
if ($API->connect(IP_MIKROTIK, USER, PASS)) {
    //Creacion Usuarios PPPoE Usermanager
    $cedula = $_POST['cedula'];
    $nombre = strtolower($_POST['nombre']);
    $apellido = strtolower($_POST['apellido']);
    $celular = $_POST['celular'];
    $telefono = $_POST['telefono'];
    $ubicacion = $_POST['ubicacion'];
    //Manejo de los precios
    $precio = $_POST['precio'];

    if($precio == 1800){
        $plan = "Plan5M";
    }
    if($precio == 1000){
        $plan = "Plan5M";
    }
    if($precio == 800){
        $plan = "Plan3M";
    }
    if($precio == 700){
        $plan = "Plan2M";
    }
    if($precio == 600){
        $plan = "Plan1.5M";
    }
    
//Para enviar el plan al mikrotik
    $planM = $precio;

   //Captura para registrar en mikrotik
    
    $corresponde = $_POST['corresponde'];
    $dia = $_POST['dia'];
    $name = str_replace(" ", "_",(($nombre.'_'.$apellido)));
    $password = $corresponde;
    $service = "pppoe";
    $phone = ($celular.'-'.$telefono);
    $comentarios = ("Dia Pago: ".$dia." Contactos: ".$phone." Ubicacion: ".$ubicacion." Instalado el :".date('Y-m-d H:i:s'));
    $error = "";



    //validacion para entrar
    if(strlen($cedula)!=11)
    {
        $_SESSION['message'] = 'Error: Verifique la cedula.';
        $_SESSION['message_type'] = 'danger';
        $error = 1222;  
    }

    if(strlen($celular)!=10)
    {
        $_SESSION['message'] = 'Error: Verifique el numero de telefono.';
        $_SESSION['message_type'] = 'danger';
        $error = 1222;  
    }
    

    if(isset($nombre) || isset($apellido) || isset($celular) || isset($ubicacion) || isset($precio)){
            //valido nombre usuario
            $API->write("/ppp/secret/getall",false);
            $API->write('?name='.$name,true);
            $READ = $API->read(false);
            $ARRAY = $API->parse_response($READ);
            //Crea usuario, customer y password
            if(count($ARRAY)>0){ // si el nombre de usuario "ya existe" lo edito
                $_SESSION['message'] = 'Error: El usuario no puede estar registrado dos veces.';
                $_SESSION['message_type'] = 'danger';
                $error = 1222;
            
            }


            if ($error == 0){    
                    $query = "INSERT INTO usuario_h(cedula,nombre,apellido,celular,telefono,ubicacion,precio,plan,coresponde,dia_corte) values ('$cedula','$nombre','$apellido','$celular','$telefono','$ubicacion','$precio','$plan','$corresponde','$dia')";
                    $result = mysqli_query($conn,$query);
                    //ingreso al mikrotik
                    
                
                    $_SESSION['message'] = ('!Guardado! Usuario: '.$name.' Contracena: '.$password);
                    $_SESSION['message_type'] = 'success';
                
                    if(!$result){
                        $_SESSION['message'] = 'Por favor verifique los datos ingresados';
                        $_SESSION['message_type'] = 'danger';
                        
                        header("location: ../anadir-h-vista.php");
        
                       }else{
                        $API->write("/ppp/secret/add",false);
                        $API->write("=name=".$name,false);
                        $API->write("=password=".$password,false);
                        $API->write("=service=".$service,false);
                        $API->write("=profile=".$planM,false);       
                        $API->write("=comment=".$comentarios,true);
                        $READ = $API->read(false);
                       }
                   
                   

                   
                    
                   header("location: ../consulta-c-h-vista.php");
        
                }
                header("location: ../anadir-h-vista.php");
            }
        }
    else{
        $_SESSION['message'] = 'Por favor verifique los datos ingresados';
                        $_SESSION['message_type'] = 'danger';
        header("location: anadir-h-vista.php");
    }
        

    
            
            
?>