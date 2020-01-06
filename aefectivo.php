<?php  

include('conexion.php');
  if(!isset($_SESSION['rol'])) {header('location: login.php');}

$socio = $_SESSION['nombre'];
$tipo_gasto = 'socio';
$error = '';
if(isset($_POST['save'])){
   
    $cantidad = $_POST['cantidad'];
    $detalle = $_POST['detalle'];
    $cantidadc = $_POST['cantidadc'];
    $detallec = $_POST['detallec'];


    if (empty($cantidad) & empty($cantidadc)){
        $_SESSION['message'] = 'Ingrese una cantidad';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}

    if (empty($detalle) & empty($detallec)){
        $_SESSION['message'] = 'Ingrese un detalle';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}
       

    if (($cantidad != '') & ($cantidadc != '')){
        $_SESSION['message'] = 'Solo puede ingresar una cantidad';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}


    if (($detalle != '') & ($detallec != '')){
        $_SESSION['message'] = 'Solo puede ingresar un detalle';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}

        if ($error == ''){

            if($detalle==""){ $detalle = $detallec;}

            if($cantidad==""){$cantidad = $cantidadc;}

            $query = "INSERT INTO gastos(socio,tipo_gasto,cantidad,detalle) values ('$socio','$tipo_gasto','$cantidad','$detalle')";
            $result = mysqli_query($conn,$query);
        
            $_SESSION['message'] = 'Avance de efectivo Guardado correctamente';
            $_SESSION['message_type'] = 'success';
        
            if(!$result){
                $_SESSION['message'] = 'Por favor verifique los datos ingresados';
                $_SESSION['message_type'] = 'danger';
                header("location: aefectivo-vista.php");
               ;}
            
           }

           header("location: consultaavance-vista.php");


}?>
