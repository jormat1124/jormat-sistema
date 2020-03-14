<?php include("frontend/header.php"); 
//Contador para verificar los ingresoss

if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 

    $qrconsulta = "SELECT * FROM ingreso where estado='caja'";
    $estado = "Negocio";
if(isset($_POST['dinerocaja'])){
    $qrconsulta = "SELECT * FROM ingreso where estado='caja'";  
    $estado = "Caja";
  }
  if(isset($_POST['dineroprestado'])){
    $qrconsulta = "SELECT * FROM ingreso where estado='prestado'";
    $estado = "Prestado";  
  }
  

  $RIngresosU = mysqli_query($conn,$qrconsulta);

?>




<br>

<div class="card card-body ">
<div class="card-header">
<h2><i class="fa fa-balance-scale" aria-hidden="true"></i> Listado de todos los ingresos. 
</h2>

<form action="movimiento-efectivo-vista.php" method="POST">

<button  class="btn btn-warning" type="submit" title="Mostrar dinero en Caja" name="dinerocaja"><i class="fa fa-hourglass-end" aria-hidden="true"></i>En caja</button> 
<button  class="btn btn-danger" type="submit" title="Mostrar dinero en negocio"name="dineroprestado"><i class="fa fa-paper-plane" aria-hidden="true"></i>Prestado </button> 


</form>


  </div>

<!--Mensaje de que los datos están guardados-->


<?php if(isset($_SESSION['message'])) { 
        if(($_SESSION['message']) != ($_SESSION['message_type'])){?>
        
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
    <?php }} $_SESSION['message_type']=''; $_SESSION['message']=''; ?>



<form action="movimiento-efectivo.php" method="POST">
<table class="table table-responsive table-striped">
<thead class="thead-dark">
      <tr>
        <th width="15%">Socio</th>
        <th width="30%">Detalle</th>
        <th width="5%">Cantidad</th>
        <Th width="10%">Estado</Th>
        <th width="20%">Fecha</th>
        <Th width="20%">Opciones</Th>
        </tr>
</thead>
<!--Para sacar el como vamos más todo lo relacionado-->

<?php $total = 0; while($row50= mysqli_fetch_array($RIngresosU)){ ?>
        <tr>
        <td style="color:#0593E3;"><?php echo $row50['socio']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['detalle']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['cantidad']; $total = $total+$row50['cantidad'];?></td>
        <td style="color:#0593E3;"><?php echo $row50['estado'];?></td>
        <td style="color:#0593E3;"><?php echo $row50['fecha_ingreso']; ?></td>
        <td>
<button  class="btn btn-danger" type="submit" title="Prestramo" name="prestamo" value="<?php echo $row50['id_ingreso'];?>" ><i class="fa fa-university" aria-hidden="true"></i> </button> 
<button  class="btn btn-warning" type="submit" title="Enviar A Caja" name="enviarcaja" value="<?php echo $row50['id_ingreso'];?>" ><i class="fa fa-hourglass-end" aria-hidden="true"></i> </button> 
<button  class="btn btn-success" type="submit" title="Enviar A Banco"name="enviarbanco" value="<?php echo $row50['id_ingreso'];?>" ><i class="fa fa-paper-plane" aria-hidden="true"></i> </button> 

       </td>
        </tr>
        
<?php } 


?>

<!--<h2>Para enviar todo los datos</h2>

<button  class="btn btn-danger" type="submit" title="Prestramo" name="todoprestamo" ><i class="fa fa-university" aria-hidden="true"></i> </button> 
<button  class="btn btn-warning" type="submit" title="Enviar A Caja" name="todoenviarcaja" ><i class="fa fa-hourglass-end" aria-hidden="true"></i> </button> 
<button  class="btn btn-success" type="submit" title="Enviar A Banco"name="todoenviarbanco" ><i class="fa fa-paper-plane" aria-hidden="true"></i> </button> 
-->

</table>

<H3>El total de efectivo en <?php echo $estado; ?> es:
 <?php echo " <b style='color:#FD0000'>$total";?></H3>
<?php include ("frontend/footer.php") ;break;}}?>