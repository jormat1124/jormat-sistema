
<?php include("frontend/header.php"); 


if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 

    

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

$query0 = "SELECT * FROM login";
$resultado0 = mysqli_query($conn,$query0);
$cont = 0;

while($row0= mysqli_fetch_array($resultado0)){$usuarios[$cont]=$row0['usuario'];$cont++;}

$query1 = "SELECT * FROM gastos where (tipo_gasto = 'socio' and socio = '$usuarios[0]') and fecha_gato BETWEEN '$fecha1' and '$fecha2'";
$resultado1 = mysqli_query($conn,$query1);
$resultado10 = mysqli_query($conn,$query1);

$query2 = "SELECT * FROM gastos where (tipo_gasto = 'socio' and socio = '$usuarios[1]') and fecha_gato BETWEEN '$fecha1' and '$fecha2'";
$resultado2 = mysqli_query($conn,$query2);
$resultado20 = mysqli_query($conn,$query2);

$query3 = "SELECT * FROM gastos where (tipo_gasto = 'socio' and socio = '$usuarios[2]') and fecha_gato BETWEEN '$fecha1' and '$fecha2'";
$resultado3 = mysqli_query($conn,$query3);
$resultado30 = mysqli_query($conn,$query3);

$query4 = "SELECT * FROM gastos where tipo_gasto = 'gastonegocio' and fecha_gato BETWEEN '$fecha1' and '$fecha2'";
$resultado4 = mysqli_query($conn,$query4);
$resultado40 = mysqli_query($conn,$query4);

$query5 = "SELECT * FROM ingreso where tipo_ingreso = 'negocio' and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$resultado5 = mysqli_query($conn,$query5);
$resultado50 = mysqli_query($conn,$query5);

$query6 = "SELECT f.num_factura,f.factura,a.articulo,a.precio_venta,f.cantidad,f.rebaja,f.total_venta,f.total_ganancia,f.fecha_venta FROM articulos a inner join factura f on a.id_articulo = f.l_id_articulo where f.fecha_venta BETWEEN '$fecha1' and '$fecha2' ";
$resultado6 = mysqli_query($conn,$query6);
$resultado60 = mysqli_query($conn,$query6);
?>
<br>
<div class="container">
<div class="card card-body ">
<form action="socio-vista.php" method="post">
<h2>Contabilidad Quincenal</h2>           
 <table class="table table-striped">

    <thead class="thead-dark">
      <tr>
        <th>Manejo del Efectivo</th>
        <th>Total</th>
        <th>Opción</th> 
      </tr>
    </thead>
  
    <tr>
    <td style="color:#018E6E;"><?php echo $usuarios[0]?> !Avance!</td>
    <?php $total1=0; while($row1 = mysqli_fetch_array($resultado1)){$total1=$total1+$row1['cantidad'];} ?>
    <td style="color:#018E6E;font-size:15px;">$<?php echo $total1?></td> 
    <td><button class="btn btn-info"  name="buscar" value="0" type="submit"><label class="lnr lnr-warning" ></label> Detalle  </button></td> 
    </tr>

<!-- Detalle de los avances -->
<?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='0')){?>

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
        <td ><?php echo $row10['fecha_gato']; ?></td>
        </tr>
        
<?php }}?>



    <tr>
    <td style="color:#018E6E;" ><?php echo $usuarios[1]?> !Avance!</td>
    <?php $total2=0; while($row2 = mysqli_fetch_array($resultado2)){$total2=$total2+$row2['cantidad'];} ?>
    <td style="color:#018E6E;font-size:15px;">$<?php echo $total2?></td> 
    <td><button class="btn btn-info"  name="buscar" value="2" type="submit"><label class="lnr lnr-warning" ></label> Detalle  </button></td> 
    </tr>

<?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='2')){?>

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

    <tr>
    <td style="color:#018E6E;"><?php echo $usuarios[2]?> !Avance!</td>
    <?php $total3=0; while($row3 = mysqli_fetch_array($resultado3)){$total3=$total3+$row3['cantidad'];} ?>
    <td style="color:#018E6E;font-size:15px;">$<?php echo $total3?></td>
    <td><button class="btn btn-info"  name="buscar" value="3" type="submit"><label class="lnr lnr-warning" ></label> Detalle  </button></td> 
     </tr>

<?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='3')){?>

<thead>
      <tr>
        <th>Detalle</th>
        <th>Cantidad</th>
        <th>Fecha</th>
        </tr>
</thead>

<?php while($row30= mysqli_fetch_array($resultado30)){ ?>
        <tr>
        <td ><?php echo $row30['detalle']; ?></td>
        <td ><?php echo $row30['cantidad']; ?></td>
        <td ><?php echo $row30['fecha_gato']; ?></td>
        </tr>
        
<?php }}?>


    <tr>
    <td style="color:#E30509;">Total gastos !Negocio!</td>
    <?php $total4=0; while($row4 = mysqli_fetch_array($resultado4)){$total4=$total4+$row4['cantidad'];} ?>
    <td style="color:#E30509;font-size:15px;">$<?php echo $total4  ?></td>
    <td><button class="btn btn-outline-danger"  name="buscar" value="4" type="submit"><label class="lnr lnr-warning" ></label> Detalle  </button></td> 
    </tr>


    <?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='4')){?>

<thead>
      <tr>
        <th>Detalle</th>
        <th>Cantidad</th>
        <th>Fecha</th>
        </tr>
</thead>

<?php while($row40= mysqli_fetch_array($resultado40)){ ?>
        <tr>
        <td style="color:#712525;"><?php echo $row40['detalle']; ?></td>
        <td style="color:#712525;"><?php echo $row40['cantidad']; ?></td>
        <td style="color:#712525;"><?php echo $row40['fecha_gato']; ?></td>
        </tr>
        
<?php }}?>



    <tr>
    <td style="color:#0593E3;">Generado - !Gastos!</td>
    <?php $total5=0; while($row5 = mysqli_fetch_array($resultado5)){$total5=$total5+$row5['cantidad'];} ?>
    <td style="color:#0593E3;font-size:15px;">$<?php echo $total5+$total2+$total3-$total4;  ?></td>
    <td><button class="btn btn-outline-primary"  name="buscar" value="5" type="submit"><label class="lnr lnr-warning" ></label> Detalle  </button></td> 
    </tr>

  <?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='5')){?>

<thead>
      <tr>
        <th>Detalle</th>
        <th>Cantidad</th>
        <th>Fecha</th>
        </tr>
</thead>

<?php while($row50= mysqli_fetch_array($resultado50)){ ?>
        <tr>
        <td style="color:#0593E3;"><?php echo $row50['detalle']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['cantidad']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['fecha_ingreso']; ?></td>
        </tr>
        
<?php }}?>

<!-- Ventas -->


<tr>
    <td style="color:#CA13DF;">Ganancia Ventas</td>
    <?php $total6=0; while($row6 = mysqli_fetch_array($resultado6)){$total6=$total6+$row6['total_ganancia'];} ?>
    <td style="color:#CA13DF;font-size:15px;">$<?php $total6 = $total6*0.50;echo $total6;  ?></td>
    <td><button class="btn btn-outline-primary"  name="buscar" value="6" type="submit"><label class="lnr lnr-warning" ></label> Detalle  </button></td> 
    </tr>

  <?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='6')){?>

<thead>
      <tr>
        <th>Articulo</th>
        <th>Cantidad</th>
        <th>Rebaja</th>
        <th>Total Venta</th>
        <th>Ganancia</th>
        <th>Fecha</th>
        </tr>
</thead>

<?php $ganancia =0; while($row60= mysqli_fetch_array($resultado60)){ ?>
        <tr>
        <td style="color:#0593E3;"><?php echo $row60['articulo']; ?></td>
        <td style="color:#0593E3;"><?php echo $row60['cantidad']; ?></td>
        <td style="color:#0593E3;"><?php echo $row60['rebaja']; $ganancia = $row60['total_ganancia']; $ganancia = $ganancia*0.50;?></td>
        <td style="color:#0593E3;"><?php echo $row60['total_venta'];  ?></td>
        <td style="color:#0593E3;"><?php echo $ganancia;  ?></td>
        <td style="color:#0593E3;"><?php echo $row60['fecha_venta']; ?></td>
        </tr>
        
<?php }}?>


</table>

<!-- Totol de los pagos a los chicos -->
     

<?php $totaltotal = $total1+$total2+$total3+$total5+$total6-$total4?>    
 <table class="table table-striped">
    <thead>
      <tr>
        <th>Ganancia Socios</th>
        <th>Sub-Total</th>
        <th>Descuento</th>
        <th>Total-Neto</th>
        
      </tr>
    </thead>
   
    <tr>
    <td><?php echo $usuarios[1]?></td>
    <td style="color:#4F0847;font-size:30px;">$<?php echo ($totaltotal*0.20)?></td> 
    <td style="color:#E30529;font-size:30px;">$<?php echo  $total2;?></td>
    <td style="color:#0593E3;font-size:30px;">$<?php echo ($totaltotal*0.20)-$total2;?></td> 
    </tr>

    <tr>
    <td><?php echo $usuarios[2]?></td>
    <td style="color:#4F0847;font-size:30px;">$<?php echo ($totaltotal*0.20)?></td> 
    <td style="color:#E30529;font-size:30px;">$<?php echo  $total3;?></td>
    <td style="color:#0593E3;font-size:30px;">$<?php echo ($totaltotal*0.20)-$total3;?></td> 
    </tr>


  </table>

  </form>
</div>
</div>


<br><br>



<?php  ;break;}}include ("frontend/footer.php")?>