<?php include("frontend/header.php"); 

if(!isset($_SESSION['rol'])) {header('location: login.php');}
    
    // captura del nombre
    $nombre = $_SESSION['nombre'];
//Manejo de fechas para los diferentes usuarios

 ini_set('date.timezone','America/Santo_Domingo');
 $dia = date("d",time());
 $mes = date("m-",time());
 $ano = date("Y-",time());
 $hora = " 23:55:00";
 $hora1 = " 05:00:00";
$fechayhoraactual = date("Y-m-d H:i:s",time());

if($dia<=15){$dia1 = 1;}
else{$dia1 = 16;}
 

 $fecha1 = $ano.($mes).($dia1).$hora1;
 $fecha2 = $ano.($mes).$dia.$hora;
 
//Contador para verificar los ingresoss
$queryhogar = "SELECT * FROM hogares "; //where tipo_ingreso = 'negocio' and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'
$Rhogar = mysqli_query($conn,$queryhogar);


/*$contadorpromedio = $dia-$dia1+1; $cantidadtotal = 0;
while($row0= mysqli_fetch_array($RIngresosU)){
$cantidadtotal = $cantidadtotal + $row0['cantidad'];
}  
$estado = $cantidadtotal/$contadorpromedio;

//Query y consulta para que los usuarios puedan verificar los ingresos diarios
$queryIngresou = "SELECT * FROM ingreso where (tipo_ingreso = 'negocio' and socio = '$nombre') and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
if (($dia == 15  ||  $dia == 30) or ($_SESSION['rol']==1)){
    $RIngresos2 = mysqli_query($conn,$queryIngreso0);
    
}
else
{ 
    $RIngresos2 = mysqli_query($conn,$queryIngresou);
}
*/
?>
<br>
<div class="container">
<div class="card card-body ">

<!--Mensaje de que los datos están guardados-->
<i class="fa fa-pie-chart" aria-hidden="true"></i>


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

        </tr>
</thead>
<!--Para sacar el como vamos más todo lo relacionado-->
<?php while($row50= mysqli_fetch_array($Rhogar)){ ?>
        <tr>
        <td style="color:#0593E3;"><?php echo $row50['cedula']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['cliente']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['ip_hogar']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['tarifa']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['ubicacion']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['estado']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['comentario']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['ultimo_pago']; ?></td>
        
        </tr>
        
<?php } ?>
</table>

<?php include ("frontend/footer.php")?>