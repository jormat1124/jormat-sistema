<!--Añadir articulos-->
<?php   include('conexion.php');  


//En proceso, Aun falta editar
if (isset($_POST['save'])){
     if(($_POST['save'])!=($_POST['cantidad'])){
      $error = '';   
    $articulo = $_POST['save'];
    $cantidad = $_POST['cantidad'];

    if($cantidad < '1'){
      $_SESSION['message'] = 'Por favor ingrese valores positivos, datos no guardados';
      $_SESSION['message_type'] = 'danger';
      $error = '1222';}

  if ($error == ''){
        $query = "SELECT * FROM articulos WHERE id_articulo = '$articulo'";
        $resulta = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($resulta)){$cantidade = $row['existencia'];}
        
        $cantidad = $cantidad + $cantidade;
        $quer = "UPDATE articulos SET  existencia = '$cantidad' WHERE id_articulo = '$articulo'";
        mysqli_query($conn,$quer);
     
        $_SESSION['message'] = 'Nueva cantidad añadida, por favor no actualize debido a que se duplicara la cantidad';
        $_SESSION['message_type'] = 'primary';

        $_POST['save'] = '';
        $_POST['cantidad'] = '';
    
  }
}}  ?>

<!--Eliminar articulo-->
<?php if(isset($_POST['eliminar'])){ 

$temp2 = $_POST['eliminar']; 
$quer3 = "select * FROM articulos WHERE id_articulo  = '$temp2'";
$consulta = mysqli_query($conn,$quer3);
while($row = mysqli_fetch_array($consulta)){ 
    
    $articulo= $row['articulo'];
    $precioventa=$row['precio_venta'];
    $preciomedio=$row['precio_medio'];
    $preciominimo=$row['precio_minimo'];
    $preciocompra=$row['precio_compra'];
    $existencia=$row['existencia'];
    $proveedor=$row['proveedor'];
}

$quer2 = "DELETE FROM articulos WHERE id_articulo = '$temp2'";
 mysqli_query($conn,$quer2);
 $_SESSION['message'] = '!!Eliminado correctamente :)!! <br> Articulo: '.$articulo.'Precio Venta: '.$precioventa.'Precio Medio: '.$preciomedio.'Precio Minimo: '.$preciominimo.'Precio Compra: '.$preciocompra.'Existencia: '.$existencia.'Proveedor: '.$proveedor;
 $_SESSION['message_type'] = 'success';


 header("location: articulo-vista.php");

}?>


