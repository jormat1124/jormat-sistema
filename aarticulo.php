<?php  include('conexion.php');

if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 

if(isset($_POST['save'])){
    $articulo = $_POST['articulo'];
    $detalle = $_POST['detalle'];
    $pventa = $_POST['venta'];
    $pmedio = $_POST['medio'];
    $pminimo = $_POST['minimo'];
    $pcompra = $_POST['compra'];
    $cantidad = $_POST['existencia'];
    $proveedor = $_POST['proveedor'];
    

    if (empty($articulo) or empty($detalle) or empty($pventa) or empty($pminimo)or empty($pcompra)or empty($cantidad)or empty($proveedor)){
        $_SESSION['message'] = 'Por favor verificar todos los campos';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}
   
        

    if($cantidad <= '1'){
        $_SESSION['message'] = 'Por favor ingresar datos positivos';
        $_SESSION['message_type'] = 'danger';
        $error = '1222'; }


   if ($error == ''){
       
    $query = "INSERT INTO articulos(articulo,detalle,precio_venta,precio_medio,precio_minimo,precio_compra,existencia,proveedor) values ('$articulo','$detalle','$pventa','$pmedio','$pminimo','$pcompra','$cantidad','$proveedor')";
    $result = mysqli_query($conn,$query);

    $_SESSION['message'] = 'Información Guardada correctamente';
    $_SESSION['message_type'] = 'success';
    
    if(!$result){
        $_SESSION['message'] = 'Por favor verifique los datos ingresados';
        $_SESSION['message_type'] = 'danger';
       }
    
   }
   break;}}
        header("location: articulo-vista.php");

}