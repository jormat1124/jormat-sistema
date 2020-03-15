<?php include("frontend/header.php"); 
if(!isset($_SESSION['rol'])) {header('location: login.php');}

 $nombre = $_SESSION['nombre'];
 ini_set('date.timezone','America/Santo_Domingo');
 $dia = date("d",time());
 $mes = date("m-",time());
 $ano = date("Y-",time());
 $hora = " 23:55:00";
 $hora1 = " 05:00:00";

 $fecha1 = $ano.($mes).($dia).$hora1;
 $fecha2 = $ano.($mes).$dia.$hora;

//Negocio
$query = "SELECT * FROM ingreso where (socio = '$nombre' and fecha_ingreso BETWEEN '$fecha1' and '$fecha2')";
$negocio = mysqli_query($conn,$query);
//Recargas
$query3 = "SELECT * FROM ingreso where (socio != '$nombre' and tipo_ingreso = 'recarga') and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$recargas = mysqli_query($conn,$query3);
?>
<div class="container">
<br>

<div class="card card-body ">
<div class="container">


<?php if(isset($_SESSION['message'])) { 
        if(($_SESSION['message']) != ($_SESSION['message_type'])){?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php }} $_SESSION['message_type']=''; $_SESSION['message']=''; ?>



  <h2>Listado de Ingresos</h2>
  <p>Estos son los ingresos pertenecientes a hoy, Nota: No se encuentran las ventas debido a que tienen su propio modulo.</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Detalle</th>
        <th>Tipo de Ingreso</th>
        <th>Cantidad</th>
       <th>Socio</th>
        <th>Fecha</th>
      </tr>
    </thead>


    <?php $total=0; while($row = mysqli_fetch_array($recargas)){ ?>
      <tr>
        
        <td><?php echo $row['detalle']?></td>
        <td style="color:#FD3C40">Recargas Normales</td>
        <td style="color:#FD3C40">$<?php echo $row['cantidad']?></td>
        <td><?php echo $row['socio']?></td>
        <td><?php echo $row['fecha_ingreso']; $total=$total+$row['cantidad']; } ?></td>
        
      </tr>

      <?php $total2=0; while($row = mysqli_fetch_array($negocio)){ ?>
      <tr>
        
        <td><?php echo $row['detalle']?></td>
        <td><?php if($row['tipo_ingreso']=='recarga'){echo "Recargas Normales";}else{echo $row['tipo_ingreso']; }?></td>
        <td style="color:#FD3C40">$<?php echo $row['cantidad']?></td>
        <td><?php echo $row['socio']?></td>
        <td><?php echo $row['fecha_ingreso']; $total2=$total2+$row['cantidad']; } ?></td>
        
      </tr>



      <thead>
      <tr>
        <th><h2 style="color:#9C2C2E">Total: RD$<?php echo $total+$total2;?>.00</h2></th>
      </tr>

  </table>
</div>
</div>

<?php include ("frontend/footer.php")?>