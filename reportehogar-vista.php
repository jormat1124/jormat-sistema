<?php include("frontend/header.php"); 

if(!isset($_SESSION['rol'])) {header('location: login.php');}


$queryhogar = "SELECT * FROM hogares ";
$Rhogar = mysqli_query($conn,$queryhogar);

?>
<br>
<div class="container">
<div class="card card-body ">

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



<h2><i class="fa fa-home" aria-hidden="true"></i>
 Home Network
</h2>
<p>Nota: .</p>
<table class="table table-striped">
<thead>
      <tr>
        <th>Cedula</th>
        <th>Cliente</th>
        <th>Ip Hogar</th>
        <th>Tarifa</th>
        <th>Ubicacion</th>
        <th>Estado</th>
        <th>Comentario</th>
        <th>Ultimo Pago</th>
        </tr>
</thead>
<!--Para sacar el como vamos más todo lo relacionado-->
<?php $totaltarifas = 0;while($row50= mysqli_fetch_array($Rhogar)){ ?>
        <tr>
        <td style="color:#0593E3;"><?php echo $row50['cedula']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['cliente']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['ip_hogar']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['tarifa']; $totaltarifas = $totaltarifas + $row50['tarifa']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['ubicacion']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['estado']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['comentario']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['ultimo_pago']; ?></td>
        
        </tr>
        
<?php } ?>
</table>

<?php 

echo $totaltarifas;

include ("frontend/footer.php")?>