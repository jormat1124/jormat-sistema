<?php 
include ("conexion.php");
if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 

$error = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $telefono = $_POST['telefono'];
        $familiar = $_POST['familiar'];
        $telefonof = $_POST['telefonof'];
        
        if (empty($cedula) or empty($nombre) or empty($apellido) or empty($edad) or empty($sexo) or empty($telefono) or empty($familiar) or empty($telefonof)){
            $_SESSION['message'] = 'Rellenar todos los campos';
            $_SESSION['message_type'] = 'danger';
            $error = '1222';
         
        }else{
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=jormatsystem', 'root', '');
           }catch(PDOException $prueba_error){
               echo "Error: " . $prueba_error->getMessage();
           }
            
            $statement = $conexion->prepare('SELECT * FROM socio WHERE cedula = :cedula LIMIT 1');
            $statement->execute(array(':cedula' => $cedula));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $_SESSION['message'] = 'Este Usuario ya existe';
                $_SESSION['message_type'] = 'danger';
                $error = '12222';
            }
            
            if ($telefono == $telefonof){

                $_SESSION['message'] = 'Los telefonos son iguales';
                $_SESSION['message_type'] = 'danger';
                $error = '1222';
               
            }
        }
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO SOCIO (cedula, nombre, apellido, edad, sexo, telefono, familiar, telefonof) VALUES (:cedula, :nombre, :apellido, :edad, :sexo, :telefono, :familiar, :telefonof)');
            $statement->execute(array(
                
                'cedula' => $cedula,
                'nombre' => $nombre,
                'apellido' =>  $apellido,
                'edad' => $edad,
                'sexo' =>  $sexo,
                'telefono' =>  $telefono,
                'familiar' => $familiar,
                'telefonof' => $telefonof

            ));
            
    $_SESSION['message'] = 'Usuario registrado exitosamente';
    $_SESSION['message_type'] = 'success';
  
            }
        }

    header("location: registrars-vista.php");

    ;break;}}
?>