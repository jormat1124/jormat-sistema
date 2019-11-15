<?php  

include('conexion.php');

if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 

$socio = $_SESSION['nombre'];
$error = '';
if(isset($_POST['save'])){
    $tipo_ingreso= $_POST['inlineMaterialRadiosExample'];
    $cantidad = $_POST['cantidad'];
    $detalle = $_POST['detalle'];

    
    if (empty($socio) or empty($tipo_ingreso) or empty($cantidad) or empty($detalle)){
        $_SESSION['message'] = 'Por favor verificar todos los campos';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}

    if($cantidad <= '1'){
        $_SESSION['message'] = 'Por favor ingresar datos positivos';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}


   if ($error == ''){
    $query = "INSERT INTO gastos(socio,tipo_gasto,cantidad,detalle) values ('$socio','$tipo_ingreso','$cantidad','$detalle')";

    
    $result = mysqli_query($conn,$query);

    $_SESSION['message'] = 'Información Guardada correctamente';
    $_SESSION['message_type'] = 'success';

    if(!$result){
        $_SESSION['message'] = 'Por favor verifique los datos ingresados';
        $_SESSION['message_type'] = 'danger';
       ;}
    
   }
  
        header("location: inversion-vista.php");
}


;break;}}

?>
