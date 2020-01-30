<?php  

include('conexion.php');
  if(!isset($_SESSION['rol'])) {header('location: login.php');}


$tipo_gasto = 'socio';
$error = '';
if(isset($_POST['saveavance'])){
    $socio = $_SESSION['nombre'];
    $cantidad = $_POST['cantidad'];
    $detalle = $_POST['detalle'];
    //$cantidadc = $_POST['cantidadc'];
    //$detallec = $_POST['detallec'];


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


}


//Para guardar el descuento.

if(isset($_POST['savedescuento'])){
    $user = $_SESSION['nombre'];
    $socio = $_POST['nombresocio'];
    $cantidad = $_POST['cantidad'];
    $detalle = "Desc X: ".$user.":  ".$_POST['detalle'];
    //$cantidadc = $_POST['cantidadc'];
    //$detallec = $_POST['detallec'];

    if (empty($cantidad) & empty($cantidadc)){
        echo 'Ingrese una cantidad';
        $error = '1222';}

    if (empty($detalle) & empty($detallec)){
        echo 'Ingrese un detalle';
        $error = '1222';}

    if (empty($socio)){
       echo 'Favor Selecional un Socio';
        $error = '1222';}
    if($cantidad < 1){
        echo "Verifique la cantidad debido a que no se pueden agregar valores negativos";
    }

        if ($error == ''){

            $query = "INSERT INTO gastos(socio,tipo_gasto,cantidad,detalle) values ('$socio','$tipo_gasto','$cantidad','$detalle')";
            $result = mysqli_query($conn,$query);
        
            $_SESSION['message'] = 'Descuento Guardado correctamente';
            $_SESSION['message_type'] = 'success';
        
            if(!$result){
                $_SESSION['message'] = 'No Guardado correctamente';
                $_SESSION['message_type'] = 'danger';
               }
               header("location: consultadescuentos.php");
           }
}

// Para eliminar el descuento

if(isset($_POST['eliminardescuento'])){ 
    $temp2 = $_POST['eliminardescuento']; 
    $quer2 = "DELETE FROM gastos WHERE id_gasto  = '$temp2'";
    mysqli_query($conn,$quer2);
    $_POST['eliminardescuento']='';
    
    $_SESSION['message'] = 'Eliminado correctamente';
    $_SESSION['message_type'] = 'danger';

    header("location: consultadescuentos.php");

   }

?>
