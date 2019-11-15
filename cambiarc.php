<?php include("conexion.php");
if(!isset($_SESSION['rol'])) {header('location: login.php');}
            if(isset($_POST['save'])){

            $usuario_a = $_SESSION['nombre'];
            $usuario_b = $_SESSION['nombre'];
            $clavea = $_POST['clavea'];
            $clave = $_POST['clave'];
            $clave2 = $_POST['clave2'];
            $clavea = hash('sha512', $clavea);
            $clave = hash('sha512', $clave);
            $clave2 = hash('sha512', $clave2);
            $error;
            if ($clave != $clave2){
                $_SESSION['message'] = 'Las contraseñas no coinciden';
                $_SESSION['message_type'] = 'danger';
                $error = "1234";
            }

            //Consulta clave anterior//
            $query = "SELECT * from login WHERE usuario = '$usuario_a'";
                $resultadoc = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($resultadoc)){$claveaa = $row['clave'];}

            
            if ($clavea == $claveaa){                    
                $quer = "UPDATE login SET  clave = '$clave' WHERE usuario = '$usuario_b'";
                mysqli_query($conn,$quer);
                $_SESSION['message'] = 'INFORMACIÓN EDITADA CORRECTAMENTE';
                $_SESSION['message_type'] = 'primary';
            }
            else{
                $_SESSION['message'] = 'Verifique la contraceña anterior';
                $_SESSION['message_type'] = 'danger';

            }
        
        
        }

            header("location: cambiarc-vista.php");
        ?>