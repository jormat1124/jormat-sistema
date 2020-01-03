<?php 

include ("conexion.php");

if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 

$error = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
        $usuario = $_POST['usuario'];
        $tipo = "2";
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
    
        $porciento = $_POST['porciento'];

        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);
        
        
        
        if (empty($usuario) or empty($clave) or empty($clave2)){
            $_SESSION['message'] = 'Rellenar todos los campos';
            $_SESSION['message_type'] = 'danger';
            $error = '1222';
         
        }else{
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=jormatsystem', 'root', '');
           }catch(PDOException $prueba_error){
               echo "Error: " . $prueba_error->getMessage();
           }
            
            $statement = $conexion->prepare('SELECT * FROM login WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $_SESSION['message'] = 'Este Usuario ya existe';
                $_SESSION['message_type'] = 'danger';
                $error = '12222';
            }
            
            if ($clave != $clave2){

                $_SESSION['message'] = 'Las contraseñas no coinciden';
                $_SESSION['message_type'] = 'danger';
                $error = '1222';
               
            }
        }
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO login (id_login, usuario, tipo,porciento, clave) VALUES (null,:usuario, :tipo, :porciento, :clave)');
            $statement->execute(array(
                
                ':usuario' => $usuario,
                ':tipo' => $tipo,
                ':clave' => $clave,
                ':porciento' =>$porciento
            ));
            $_SESSION['message'] = 'Usuario registrado exitosamente';
            $_SESSION['message_type'] = 'success';
            }
        }

    header("location: alogin-vista.php");
    ;break;}}
?>