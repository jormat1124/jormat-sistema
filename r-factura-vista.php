<?php include("frontend/header.php"); 
 
if(!isset($_SESSION['rol'])) {header('location: login.php');}

//Eliminar articulo

if((isset($_POST['eliminar'])) and ($_POST['eliminar'] >= 1)){
  $temp2 = $_POST['eliminar']; 
$quer2 = "DELETE FROM factura  WHERE num_factura = '$temp2'";
mysqli_query($conn,$quer2);
$_POST['eliminar']='';
}


//consulta

$quer2 = "SELECT * FROM factura ORDER BY factura asc";
$resulta = mysqli_query($conn,$quer2);
while($row = mysqli_fetch_array($resulta)){$numero_factura = $row['factura']; }

//Nueva factura
if((isset($_POST['nuevaf']))){
$numero_factura = $numero_factura + 1;
}


$query = "SELECT f.num_factura,a.articulo,a.precio_venta,f.cantidad,f.rebaja,f.total_venta FROM articulos a inner join factura f on a.id_articulo = f.l_id_articulo ";
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
<form action="factura-vista.php" method="post">
  <h2>Factura: #<?php echo $numero_factura;?> <button class="btn btn-danger"  name="nuevaf"  type="submit" > Nueva Factura </button></h2>
    <p>Vendemos los mejores articulos al mejor precio</p> 
  <a href="afactura-vista.php?id=<?php echo $numero_factura;?>" class="btn btn-success"> Añadir articulo   </a>
   
  </h2> 
  <table class="table table-striped">
    <thead>
      <tr>
        <th>factura#</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>rebaja</th>
        <th>Sub Total </th>
         <th>Opciones</th>
      </tr>
    </thead>
    <?php $total=0; while($row = mysqli_fetch_array($resultado)){ ?>
      <tr>
        
        <td><?php echo $row['articulo']?></td>
        <td><?php echo $row['precio_venta']?></td>
        <td><?php echo $row['cantidad']?></td>
        <td><?php echo $row['rebaja']?></td>
        <td><?php echo $row['total_venta']; ?></td>
       
       
        <td>
        <button class="btn btn-danger"  name="eliminar" value="<?php echo $row['num_factura']; $total = $total+$row['total_venta']; ?>" type="submit">Eliminar</button>      
        </td>    
        </tr>
    <?php }?>
        <td><h2>Total: RD$<?php ;echo $total;?></h2></td>
  </table>
</div>
</div>
<?php 
include ("frontend/footer.php")?>