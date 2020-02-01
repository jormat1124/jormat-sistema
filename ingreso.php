<?php  include('conexion.php');

if(!isset($_SESSION['rol'])) {header('location: login.php');}

$socio = $_SESSION['nombre'];
$error = '';
if(isset($_POST['save'])){
    $tipo_ingreso= $_POST['inlineMaterialRadiosExample'];
    $cantidad = $_POST['cantidad'];
    $detalle = $_POST['detalle'];


    if (empty($socio) or empty($tipo_ingreso) or empty($cantidad) or empty($detalle)or){
        $_SESSION['message'] = 'Por favor verificar todos los campos';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}
   
        

    if($cantidad <= '1'){
        $_SESSION['message'] = 'Por favor ingresar datos positivos';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}


   if ($error == ''){
       if ($tipo_ingreso == 'juego' or $tipo_ingreso == 'otros'){ $query = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','negocio','$cantidad','$tipo_ingreso: $detalle')";}
       else{
    $query = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','$tipo_ingreso','$cantidad','$detalle')";
}
    
    $result = mysqli_query($conn,$query);

    $_SESSION['message'] = 'Información Guardada correctamente';
    $_SESSION['message_type'] = 'success';

    if(!$result){
        $_SESSION['message'] = 'Por favor verifique los datos ingresados';
        $_SESSION['message_type'] = 'danger';
       ;}
    
   }
  
        header("location: ingreso-vista.php");
}



?>
