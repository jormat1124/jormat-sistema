<?php  

include('conexion.php');
if(!isset($_SESSION['rol'])) {header('location: login.php');}
$socio = $_SESSION['nombre'];
$error = '';
if(isset($_POST['save'])){
   
    $tipoc = $_POST['tipoc'];
    $tipo = $_POST['tipo'];
    $detalle = $_POST['detalle'];
    $estado = "pendiente";
   

    if (empty($tipo) & empty($tipoc)){
        $_SESSION['message'] = 'Ingrese un tipo';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}

    if (empty($detalle)){
        $_SESSION['message'] = 'Ingrese un detalle';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}
       

    if (($tipo != '') & ($tipoc != '')){
        $_SESSION['message'] = 'Solo puede ingresar una cantidad';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}


        if ($error == ''){

            if($tipo==""){ $tipo = $tipoc;}

            if($cantidad==""){$cantidad = $cantidadc;}

            $query = "INSERT INTO reclamo(tipo_reclamo,detalle,socio,estado) values ('$tipo','$detalle','$socio','$estado')";
            $result = mysqli_query($conn,$query);
        
            $_SESSION['message'] = 'Guardado Correctamente';
            $_SESSION['message_type'] = 'success';
        
            if(!$result){
                $_SESSION['message'] = 'Por favor verifique los datos ingresados';
                $_SESSION['message_type'] = 'danger';
               ;}
            
           }

           header("location: reclamo-vista.php");


}?>
