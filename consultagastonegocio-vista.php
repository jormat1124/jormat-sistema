<?php include("frontend/header.php"); 
if(!isset($_SESSION['rol'])) {header('location: login.php');}
 $nombre = $_SESSION['nombre'];
 ini_set('date.timezone','America/Santo_Domingo');
 $dia = date("d",time());
 $mes = date("m-",time());
 $ano = date("Y-",time());
 $hora = " 23:55:00";
 $hora1 = " 05:00:00";

if($dia<=15){
    $dia1 = 1;
}
else
 $dia1 = 16;

 $fecha1 = $ano.($mes).($dia1).$hora1;
 $fecha2 = $ano.($mes).$dia.$hora;

$query = "SELECT * FROM gastos where tipo_gasto = 'gastonegocio' and fecha_gato BETWEEN '$fecha1' and '$fecha2'";
$resultado = mysqli_query($conn,$query);?>
<div class="container">
<br>

<div class="card card-body ">
<div class="container">
  <h2>Gastos del Negocio</h2>
  <p>Estos son los gastos de esta quincena</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Detalle</th>
        <th>Cantidad</th>
        <th>Fecha</th>
      </tr>
    </thead>
    <?php $total=0; while($row = mysqli_fetch_array($resultado)){ ?>
      <tr>
        
        <td><?php echo $row['detalle']?></td>
        <td style="color:#FD3C40">$<?php echo $row['cantidad']?></td>
        <td><?php echo $row['fecha_gato']; $total=$total+$row['cantidad']; } ?></td>
        
      </tr>
      <thead>
      <tr>
        <th><h2 style="color:#9C2C2E">Total: RD$<?php echo $total;?></h2></th>
      </tr>

  </table>
</div>
</div>

<?php include ("frontend/footer.php")?>