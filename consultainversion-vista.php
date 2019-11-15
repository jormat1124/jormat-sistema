<?php include("frontend/header.php"); 
 if(!isset($_SESSION['rol'])) {header('location: login.php');}
 $nombre = $_SESSION['nombre'];
 

 $query = "SELECT * FROM factura";
 $resultado = mysqli_query($conn,$query);
 $resultado0 = mysqli_query($conn,$query);
 $ventast=0;$venta=0;$ganancia=0; while($row= mysqli_fetch_array($resultado)){$venta = $venta + $row['total_venta'];$ganancia = $ganancia + $row['total_ganancia'];}
 $ganancia = $ganancia*0.50;
 $ventast = $venta - $ganancia;

$query1 = "SELECT * FROM ingreso where (tipo_ingreso = 'inversion')";
$resultado1 = mysqli_query($conn,$query1);
$resultado10 = mysqli_query($conn,$query1);
$ingresot=0; while($row1= mysqli_fetch_array($resultado1)){$ingresot = $ingresot + $row1['cantidad'];}



$query2 = "SELECT * FROM gastos where (tipo_gasto = 'inversionnegocio')";
$resultado2 = mysqli_query($conn,$query2);
$resultado20 = mysqli_query($conn,$query2);
$inversiont=0; while($row2= mysqli_fetch_array($resultado2)){$inversiont = $inversiont + $row2['cantidad'];}
?>




<br>
<div class="container">
<div class="card card-body ">
<form action="consultainversion-vista" method="post">
  <h2>Presupuesto Inversión & Gastos</h2>
  <p>Este se constituye de las ventas, los ingresos mensuales restando las inversiones</p>


<br>
<button class="btn btn-info"  name="buscar" value="0" type="submit"  ><h2>Mostrar Ventas</h2>  </button>      
<br>
<br>
      
  <button class="btn btn-info"  name="buscar" value="1" type="submit"><h2>Ingresos Mensuales</h2>  </button> 
<br>
<br>
  <button class="btn btn-danger"  name="buscar" value="2" type="submit"><h2>Inversiones Realizadas</h2>  </button>       
<br>
<br>

 
<table class="table table-striped">

<!-- Detalle Ventas -->

<?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='0')){?>
  <i>Listado de todos los ingresos</i>
<thead>
      <tr>
        <th>Factura</th>
        <th>T-Venta</th>
        <th>T-Ganancia</th>
        <th>Fecha Ventas</th>
        </tr>
</thead>

<?php $ganancia=0;while($row= mysqli_fetch_array($resultado0)){ ?>
        <tr>
        <td ><?php echo $row['factura']; ?></td>
        <td ><?php echo $row['total_venta']; $ganancia=$row['total_ganancia'];  $ganancia = $ganancia*0.50;?></td>
        <td ><?php echo $ganancia; ?></td>
        <td ><?php echo $row['fecha_venta']; ?></td>
        </tr>
        
<?php }}?>

<!-- Detalle de los avances -->
<?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='1')){?>
  <i>Listado de todos los ingresos</i>
<thead>
      <tr>
        <th>Detalle</th>
        <th>Cantidad</th>
        <th>Fecha</th>
        </tr>
</thead>

<?php while($row10= mysqli_fetch_array($resultado10)){ ?>
        <tr>
        <td ><?php echo $row10['detalle']; ?></td>
        <td ><?php echo $row10['cantidad']; ?></td>
        <td ><?php echo $row10['fecha_ingreso']; ?></td>
        </tr>
        
<?php }}?>

<?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='2')){?>
<i>Listado de todas las inversiones</i>
<thead>
      <tr>
        <th>Detalle</th>
        <th>Cantidad</th>
        <th>Fecha</th>
        </tr>
</thead>

<?php while($row20= mysqli_fetch_array($resultado20)){ ?>
        <tr>
        <td ><?php echo $row20['detalle']; ?></td>
        <td ><?php echo $row20['cantidad']; ?></td>
        <td ><?php echo $row20['fecha_gato']; ?></td>
        </tr>
        
<?php }}?>


</table>


<!-- Camptura de los totales-->

<?php $total = ($ventast+$ingresot) - $inversiont;?>


  <h1 style="color:#9C2C2E"><?php if ($total > 1){echo "Disponible";}else{echo "Deuda";}?> total: RD$<?php echo $total?>.00</h1>
  
</div>
</div>



<?php include ("frontend/footer.php")?>