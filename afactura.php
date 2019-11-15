
<?php include("conexion.php");
if(isset($_POST['buscar'])){
    
    $_SESSION['message'] = $_POST['informacion'];
    header("location: afactura-vista.php");

}


$error = '';  
if (isset($_POST['anadir'])){
    $socio = $_SESSION['nombre'];
    $idarticulo = $_POST['anadir'];

    $exis = "SELECT * FROM articulos WHERE id_articulo = '$idarticulo'";
    $resulta = mysqli_query($conn,$exis);
    while($row = mysqli_fetch_array($resulta)){$idarticulo = $row['id_articulo']; $disponible = $row['existencia']; $pventa =  $row['precio_venta']; $pcompra =  $row['precio_compra'];   }
    
    if($disponible == 0){
        $_SESSION['message'] = 'Este articulo no se encuentra disponible';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';
    }

    if(!isset($_GET['id'])){

        $_SESSION['message'] = 'No puede aceder de esta forma';
        $_SESSION['message_type'] = 'danger'; 
        $error = '1222';
    }
    

  if ($error == ''){
        $idfactura = $_GET['id'];
        $cantidad = 1;
        $total_venta = $pventa * $cantidad;
        $total_ganancia = $total_venta - $pcompra;
        
        $query = "INSERT INTO FACTURA(factura,l_id_articulo,cantidad,rebaja,socio,total_venta,total_ganancia) value ('$idfactura',$idarticulo','$cantidad','$rebaja'";
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

header("location: factura-vista.php");

}  ?>