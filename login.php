<?php 

include ("conexion.php");

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }

    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave = hash('sha512', $clave);
        
        $statement = $conexion->prepare("SELECT * FROM login WHERE (usuario = :usuario AND clave = :clave)AND estado='activo'");
        
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave,
            
        ));
            
        $rows = $statement->fetch(PDO::FETCH_NUM);
        
        if ($rows !== false){
            $_SESSION['usuario'] = $usuario;
            $rol = $rows[2];
            $ponche = $rows[1];
           
                
            $query = "SELECT * FROM ponche order by id_ponche desc limit 0,1";
            $resultado1 = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($resultado1)){$fuego = $row['id_ponche']; $temp = $row['salida'];}
            
            if($temp == ''){

                ini_set('date.timezone','America/Santo_Domingo');
                $datof = date("d-m-Y H:i:s",time());
                $quer = "UPDATE ponche SET r_receso = '$datof' WHERE id_ponche = '$fuego'";
                $result = mysqli_query($conn,$quer);


            }
            if($temp != ''or $temp == null){
            $query1 = "INSERT INTO ponche (l_usuario) values ('$ponche')";
            $result = mysqli_query($conn,$query1);}

            $_SESSION['rol']=$rol;
            $_SESSION['nombre']=$ponche;

            header('location: principal-vista.php');

            
            }else{
            $error .= '<i>Datos incorrectos</i>';
              }
             }
    

require 'frontend/login-vista.php';


?>