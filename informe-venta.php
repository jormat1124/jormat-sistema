<?php include("frontend/header.php"); 
$nombre = $_SESSION['nombre'];
ini_set('date.timezone','America/Santo_Domingo');

$fecha = date("Y-m-d",time());
$hora = " 23:55:00";
$hora1 = " 05:00:00";

$fecha1 = $fecha.$hora1;
 $fecha2 = $fecha.$hora;


$query = "SELECT f.num_factura,f.factura,a.articulo,a.precio_venta,f.cantidad,f.rebaja,f.total_venta,f.fecha_venta FROM articulos a inner join factura f on a.id_articulo = f.l_id_articulo where (f.socio = '$nombre') and f.fecha_venta BETWEEN '$fecha1' and '$fecha2' ";
$resultado = mysqli_query($conn,$query);
?>
<br>
<div class="container">
<div class="card card-body ">
<form action="factura-vista.php" method="post">
  
    <h2>Informe de ventas</h2> 
  <i>Estas son las ventas pertenecientes a usted en este día</i>
   
  </h2> 
  <table class="table table-striped">
    <thead>
      <tr>
    
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>rebaja</th>
        <th>Sub Total </th>
        <th>Fecha Venta</th>
      </tr>
    </thead>
    <?php $total=0; while($row = mysqli_fetch_array($resultado)){ ?>
      <tr>
    
        <td><?php echo $row['articulo']?></td>
        <td><?php echo $row['precio_venta']?></td>
        <td><?php echo $row['cantidad']?></td>
        <td><?php echo $row['rebaja']?></td>
        <td><?php echo $row['total_venta']; ?></td>
        <td><?php echo $row['fecha_venta']; $total = $total + $row['total_venta'];?></td>
        </tr>
    <?php }?>
        <td><h2>Total: RD$<?php ;echo $total;?></h2></td>
  </table>
</div>
</div>
<?php 
include ("frontend/footer.php")?>