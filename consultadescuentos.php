<?php include("frontend/header.php"); 
  if(!isset($_SESSION['rol'])) {header('location: login.php');}

 $nombre = $_SESSION['nombre'];
 ini_set('date.timezone','America/Santo_Domingo');
 $dia = date("d",time());
 $mes = date("m-",time());
 $ano = date("Y-",time());
 $hora = " 23:55:00";
 $hora1 = " 05:00:00";

 if($dia<=15){$dia1 = 1;}else{$dia1 = 16;}

 $fecha1 = $ano.($mes).($dia1).$hora1;
 $fecha2 = $ano.($mes).$dia.$hora;

$query = "SELECT * FROM gastos where (tipo_gasto = 'socio') and fecha_gato BETWEEN '$fecha1' and '$fecha2'";
$resultado = mysqli_query($conn,$query);
   
?>


<div class="container">
<br>

 
 <?php  if(isset($_SESSION['message'])) { 
        if(($_SESSION['message']) != ($_SESSION['message_type'])){?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
<?php }} $_SESSION['message_type']=''; $_SESSION['message']=''; ?>




<div class="card card-body ">
<div class="container">
  <h2>Avance de Efectivo</h2>
  <p>Listado de avance de efectivo de todos los usuarios</p>     
  <form action="aefectivo.php" method="post">       
  <table class="table table-striped">
    <thead>
      <tr>
        
      <th>Socio</th><th>Detalle</th><th>Cantidad</th><th>Fecha</th>
      
      <!--Ocpcion especiales admin-->
      <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
      <th>Opcion</th>
      <?php break;}}?>          
      </tr>
    </thead>
    <?php $total=0; while($row = mysqli_fetch_array($resultado)){ ?>
      <tr>
        
        <td><?php echo $row['socio']?></td>
        <td><?php echo $row['detalle']?></td>
        <td style="color:#FD3C40">$<?php echo $row['cantidad']?></td>
        <td><?php echo $row['fecha_gato']; $total=$total+$row['cantidad'];?></td>
        

        <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
        <td><button class="btn btn-danger" type="submit" name="eliminardescuento" value="<?php echo $row['id_gasto'];?>" >Eliminar</button></td> 
        <?php break;}}}?>   

      </tr>
      <thead>
      <tr>

      <?php if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
    <th><h2 style="color:#9C2C2E">Total: RD$<?php echo $total;?></h2></th>
    <?php break;}}?>  
         </tr>

  </table>
  </form>
</div>
</div>

<?php include ("frontend/footer.php")?>