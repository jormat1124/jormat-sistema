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
$queryIngreso0 = "SELECT * FROM ingreso where tipo_ingreso = 'negocio' and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$RIngresosU = mysqli_query($conn,$queryIngreso0);
$contadorpromedio = $dia-$dia1+1; $cantidadtotal = 0;
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



<h2><i class="fa fa-balance-scale" aria-hidden="true"></i> Listado de ingresos 
</h2>
<p>Nota: Ingresos pertenecientes al negocio.</p>
<table class="table table-striped">
<thead>
      <tr>
        <th>Detalle</th>
        <th>Cantidad</th>
        <th>Socio</th>
        <th>Fecha</th>
        </tr>
</thead>
<!--Para sacar el como vamos más todo lo relacionado-->
<?php while($row50= mysqli_fetch_array($RIngresos2)){ ?>
        <tr>
        <td style="color:#0593E3;"><?php echo $row50['detalle']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['cantidad']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['socio']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['fecha_ingreso']; ?></td>
        </tr>
        
<?php } ?>
</table>

<?php 

if($estado < 900){
    echo "!!Animo Vamos a dar un poco más!!";
}
elseif($estado > 950 and $estado < 1200){
    echo "!!Muy bien!!, Si sigues así tu aproximado sera muy bueno";
}
elseif($estado > 1200 and $estado < 1500){
    echo "!!Excelente!!, Si sigues así tu aproximado sera excelente";
}
elseif($estado > 1500){
    echo "!!Genial!!, Ahora si que viene la paca";
}

 include ("frontend/footer.php")?>