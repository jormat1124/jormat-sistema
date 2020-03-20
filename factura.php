<?php
include('conexion.php');
if(!isset($_SESSION['rol'])) {header('location: login.php');}

$error = '';


if (isset($_POST['anadir'])){
    $socio = $_SESSION['nombre'];
    $idarticulo = $_POST['anadir'];
    $pventa = $_POST['precioventa'.$idarticulo];
    $cantidad = $_POST['cantidad'.$idarticulo];


    $exis = "SELECT * FROM articulos WHERE id_articulo = '$idarticulo'";
    $resulta = mysqli_query($conn,$exis);
    while($row = mysqli_fetch_array($resulta)){$idarticulo = $row['id_articulo']; $disponible = $row['existencia']; $pcompra =  $row['precio_compra']; }
    
    $total_venta = ($pventa * $cantidad);
    $pcompra = $pcompra * $cantidad;
    $total_ganancia = ($total_venta - $pcompra);

    if($disponible == 0){
        $_SESSION['message'] = 'Este articulo no se encuentra disponible';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';
        header('location: factura-vista.php');
    }

    if($cantidad <= -1){
      $_SESSION['message'] = 'Por favor ingresar valores positivos';
      $_SESSION['message_type'] = 'danger';
      $error = '1222';
      header('location: factura-vista.php');
    }

  if ($error == ''){

       
        
        $query = "INSERT INTO FACTURA(l_id_articulo,cantidad,socio,total_venta,total_invertido,total_ganancia) value ('$idarticulo','$cantidad','$socio','$total_venta','$pcompra','$total_ganancia')";
        $resulta = mysqli_query($conn,$query);
        
        $cantidad = $disponible - $cantidad;
        $quer = "UPDATE articulos SET  existencia = '$cantidad' WHERE id_articulo = '$idarticulo'";
        mysqli_query($conn,$quer);
     
        $_SESSION['message'] = 'Articulo vendido correctamente :)';
        $_SESSION['message_type'] = 'success';
        header('location: informe-venta.php');
        
  }}?>