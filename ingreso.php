<?php  include('conexion.php');

if(!isset($_SESSION['rol'])) {header('location: login.php');}

$socio = $_SESSION['nombre'];
$error = '';
$tarjeta = 0;
if(isset($_POST['save'])){
    $tipo_ingreso="negocio";
    if(isset($_POST['inlineMaterialRadiosExample'])){$tipo_ingreso= $_POST['inlineMaterialRadiosExample'];};
    $cantidad = $_POST['cantidad'];
    $detalle = $_POST['detalle'];


    if (empty($cantidad) or empty($detalle)){
        $_SESSION['message'] = 'Por favor verificar todos los campos';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}      

    if($cantidad <= '1'){
        $_SESSION['message'] = 'Por favor ingresar datos positivos';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}

   //Guardado de las recargas

   if(isset($_POST['tarjeta'])){
    $tarjeta = $_POST['tarjeta'];
    if(($error != '') or ($tarjeta <= '1')){
    $_SESSION['message'] = '"No guardado", Por favor ingresar datos positivos en la recarga';
    $_SESSION['message_type'] = 'danger';
    $error = '1222';}
     else{       
    $query = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','tarjeta','$tarjeta','$detalle')";
    $result = mysqli_query($conn,$query);
 }
    }   

//Guardadod de los datos del negocio
   if ($error == ''){
    $query = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','$tipo_ingreso','$cantidad','$detalle')";
    $result = mysqli_query($conn,$query);
    $_SESSION['message'] = 'Información Guardada correctamente';
    $_SESSION['message_type'] = 'success';

    if(!$result){
        $_SESSION['message'] = '"No guardado", Por favor verifique los datos ingresados';
        $_SESSION['message_type'] = 'danger';
       ;}
    
   }
   
    header("location:consultaingresonegocio-vista.php"); 
}


?>
