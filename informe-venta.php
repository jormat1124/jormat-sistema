<?php include("frontend/header.php"); 
$nombre = $_SESSION['nombre'];
ini_set('date.timezone','America/Santo_Domingo');

$fecha = date("Y-m-d",time());
$hora = " 23:55:00";
$hora1 = " 05:00:00";

$fecha1 = $fecha.$hora1;
 $fecha2 = $fecha.$hora;

 if((isset($_POST['eliminar'])) and ($_POST['eliminar'] >= 1)){
  $temp2 = $_POST['eliminar']; 
$quer2 = "DELETE FROM factura  WHERE num_factura = '$temp2'";
mysqli_query($conn,$quer2);
$_POST['eliminar']='';
}



$query = "SELECT f.num_factura,a.articulo,a.precio_venta,f.cantidad,f.total_venta,f.fecha_venta FROM articulos a inner join factura f on a.id_articulo = f.l_id_articulo where (f.socio = '$nombre') and f.fecha_venta BETWEEN '$fecha1' and '$fecha2' ";
$resultado = mysqli_query($conn,$query);
?>

<!--Mensaje de que se a;adio o modifico el articulo-->
<?php   
        if(isset($_SESSION['message'])) { 
        if(($_SESSION['message']) != ($_SESSION['message_type'])){?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php }} $_SESSION['message_type']=''; $_SESSION['message']=''; 

?>

<br>
<div class="container">
<div class="card card-body ">
<form action="informe-venta.php" method="post">
  
    <h2>Informe de ventas</h2> 
  <i>Estas son las ventas pertenecientes a usted en este día</i>
   
  </h2> 
  <table class="table table-striped">
    <thead>
      <tr>
    
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Total vendido </th>
        <!--<th>Opciones</th>-->
        
      </tr>
    </thead>
    <?php $total=0; while($row = mysqli_fetch_array($resultado)){ ?>
      <tr>
    
        <td><?php echo $row['articulo']?></td>
        <td><?php echo $row['precio_venta']?></td>
        <td><?php echo $row['cantidad']?></td>
        <td><?php echo $row['total_venta']; ?></td>
        <?php $total = $total + $row['total_venta'];?></td>
        <!--
        <td>
        <button class="btn btn-danger"  name="eliminar" value="<?php echo $row['num_factura']; $total = $total+$row['total_venta']; ?>" type="submit">Debolver Articulo</button>      
        </td> -->
        </tr>
    <?php }?>
        <td><h2>Total: RD$<?php ;echo $total;?></h2></td>
  </table>
</div>
</div>
<?php 
include ("frontend/footer.php")?>