<?php include("frontend/header.php"); 

if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 

//Manejo de fechas para los diferentes usuarios

 ini_set('date.timezone','America/Santo_Domingo');
 $dia = 15;
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
//Consulta para saber los usuarios y más
$query0 = "SELECT * FROM login Where estado='activo'";
$resultado0 = mysqli_query($conn,$query0);
$contusuarios = 0;

while($row0= mysqli_fetch_array($resultado0)){$usuarios[$contusuarios]=$row0['usuario'];$porciento[$contusuarios]=$row0['porciento'];$contusuarios++;}

//Contador para los gastos de usuario
$cont2 = 0;
while($cont2 < $contusuarios ){
$query[$cont2] = "SELECT * FROM gastos where (tipo_gasto = 'socio' and socio = '$usuarios[$cont2]') and fecha_gato BETWEEN '$fecha1' and '$fecha2'";
$resultado[$cont2] = mysqli_query($conn,$query[$cont2]);
$resultadod[$cont2] = mysqli_query($conn,$query[$cont2]);
$cont2++;
}

//Consultas para los totales de los  gastos ,ingresos y ventas

$querygastoN = "SELECT * FROM gastos where tipo_gasto = 'gastonegocio' and fecha_gato BETWEEN '$fecha1' and '$fecha2'";
$RgastoNegocio = mysqli_query($conn,$querygastoN);
$RgastoNegocio2 = mysqli_query($conn,$querygastoN);

$queryIngreso = "SELECT * FROM ingreso where tipo_ingreso = 'negocio' and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$RIngresos = mysqli_query($conn,$queryIngreso);
$RIngresos2 = mysqli_query($conn,$queryIngreso);

$queryVenta = "SELECT f.num_factura,f.factura,a.articulo,a.precio_venta,f.cantidad,f.rebaja,f.total_venta,f.total_ganancia,f.fecha_venta FROM articulos a inner join factura f on a.id_articulo = f.l_id_articulo where f.fecha_venta BETWEEN '$fecha1' and '$fecha2' ";
$Rventa = mysqli_query($conn,$queryVenta);
$Rventa2 = mysqli_query($conn,$queryVenta);
//Html para el guardado de la nomina
?>
<br>
<div class="container">
<div class="card card-body ">
<form action="socio-vista.php" method="post">
 <h2><i class="fa fa-users" aria-hidden="true"></i> Contabilidad Quincenal  <?php if($dia == 15 || $dia >= 30){ ?> 
  <a class="btn btn-outline-danger" href="#Snomina" data-toggle="modal" >
  <i class="fa fa-database" aria-hidden="true"></i> Save Nomina
  </a><?php }?></h2>

<table class="table table-striped">

    <thead class="thead-dark">
      <tr>
        <th>Manejo del Efectivo</th>
        <th>Total</th>
        <th>Opción</th> 
      </tr>
    </thead>

<!--Para mostrar los gatos de cada usuario registrado en el login-->    
  
<?php $contU=0; $totalavanceusuarios=0; while($contU < $contusuarios){ ?>
<tr>
<td style="color:#018E6E;"><?php echo $usuarios[$contU]?> !Avance!</td>
<?php $avance[$contU]=0; while( $row[$contU] = mysqli_fetch_array($resultado[$contU])){$avance[$contU]=$avance[$contU]+$row[$contU]['cantidad'];} ?>
<td style="color:#018E6E;font-size:15px;">$<?php echo $avance[$contU]?></td> 
<td><button class="btn btn-info"  name="buscar" value=<?php echo $contU ?> type="submit"><label class="lnr lnr-warning" ></label><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Detalle  </button></td> 
</tr>

<?php 
//Para sacar el total de los avances de todos los usuarioss
$totalavanceusuarios=$totalavanceusuarios+$avance[$contU];
//Para mostrar de forma detallada lo de cada usuario
if((isset($_POST['buscar'])) and ($_POST['buscar']==$contU)){?>

<thead>
      <tr>
        <th>Detalle</th>
        <th>Cantidad</th>
        <th>Fecha</th>
        </tr>
</thead>

<?php while($row[$contU]= mysqli_fetch_array($resultadod[$contU])){ ?>
        <tr>
        <td ><?php echo $row[$contU]['detalle']; ?></td>
        <td ><?php echo $row[$contU]['cantidad']; ?></td>
        <td ><?php echo $row[$contU]['fecha_gato']; ?></td>
        </tr>
        
<?php }}$contU++;}?>


<!--Consultas generales de las ventas, gastos e ingresos-->
<!--Detalles y consulta Gasto negocio-->
    <tr>
    <td style="color:#E30509;">Total gastos !Negocio!</td>
    <?php $totalgastoNegocio=0; while($rowgn = mysqli_fetch_array($RgastoNegocio)){$totalgastoNegocio=$totalgastoNegocio+$rowgn['cantidad'];} ?>
    <td style="color:#E30509;font-size:15px;">$<?php echo $totalgastoNegocio  ?></td>
    <td><button class="btn btn-outline-danger"  name="buscar" value="gn" type="submit"><label class="lnr lnr-warning" ></label><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Detalle  </button></td> 
    </tr>


    <?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='gn')){?>

<thead>
      <tr>
        <th>Detalle</th>
        <th>Cantidad</th>
        <th>Fecha</th>
        </tr>
</thead>

<?php while($gn2= mysqli_fetch_array($RgastoNegocio2)){ ?>
        <tr>
        <td style="color:#712525;"><?php echo $gn2['detalle']; ?></td>
        <td style="color:#712525;"><?php echo $gn2['cantidad']; ?></td>
        <td style="color:#712525;"><?php echo $gn2['fecha_gato']; ?></td>
        </tr>
        
<?php }}?>

<!--Detalles y consulta Generado del legocio mas los detalles-->
    <tr>
    <td style="color:#0593E3;">Generado + !Avaces! - !Gastos!</td>
    <?php $totalGeneradoNegocio=0; while($row5 = mysqli_fetch_array($RIngresos)){$totalGeneradoNegocio=$totalGeneradoNegocio+$row5['cantidad'];} ?>
    <td style="color:#0593E3;font-size:15px;">$<?php echo $totalGeneradoNegocio+$totalavanceusuarios-$totalgastoNegocio;?></td>
    <td><button class="btn btn-outline-primary"  name="buscar" value="INN" type="submit"><label class="lnr lnr-warning" ></label><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Detalle  </button></td> 
    </tr>

  <?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='INN')){?>

<thead>
      <tr>
        <th>Detalle</th>
        <th>Cantidad</th>
        <th>Fecha</th>
        </tr>
</thead>

<?php while($row50= mysqli_fetch_array($RIngresos2)){ ?>
        <tr>
        <td style="color:#0593E3;"><?php echo $row50['detalle']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['cantidad']; ?></td>
        <td style="color:#0593E3;"><?php echo $row50['fecha_ingreso']; ?></td>
        </tr>
        
<?php }}?>

<!-- Total de las ventas y ganancias -->


<tr>
    <td style="color:#CA13DF;">Ganancia Ventas</td>
    <?php $totalVentas=0; while($row6 = mysqli_fetch_array($Rventa)){$totalVentas=$totalVentas+$row6['total_ganancia'];} ?>
    <td style="color:#CA13DF;font-size:15px;">$<?php $totalVentas = $totalVentas*0.50;echo $totalVentas;  ?></td>
    <td><button class="btn btn-outline-primary"  name="buscar" value="TTV" type="submit"><label class="lnr lnr-warning" ></label><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Detalle  </button></td> 
    </tr>

  <?php if((isset($_POST['buscar'])) and ($_POST['buscar']=='TTV')){?>

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

<?php $ganancia =0; while($row60= mysqli_fetch_array($Rventa2)){ ?>
        <tr>
        <td style="color:#0593E3;"><?php echo $row60['articulo']; ?></td>
        <td style="color:#0593E3;"><?php echo $row60['cantidad']; ?></td>
        <td style="color:#0593E3;"><?php echo $row60['rebaja']; 
        $ganancia = $row60['total_ganancia']; $ganancia = $ganancia*0.50;?></td>
        <td style="color:#0593E3;"><?php echo $row60['total_venta'];  ?></td>
        <td style="color:#0593E3;"><?php echo $ganancia;  ?></td>
        <td style="color:#0593E3;"><?php echo $row60['fecha_venta']; ?></td>
        </tr>
        
<?php }}?>


</table>

<!-- Totol de los pagos a los chicos -->
     

<?php 
//para sacar el total general para paga a los usuarios
$totaltotal = $totalavanceusuarios+$totalGeneradoNegocio+$totalVentas-$totalgastoNegocio?>  
   

   
 <table class="table table-striped">
    <thead>
      <tr>
        <th>Ganancia Socios</th>
        <th>Sub-Total</th>
        <th>Descuento</th>
        <th>Total-Neto</th>
        
      </tr>
    </thead>
   <!--Total de la nomina de los usuarios estandar-->


   <?php 

//Total de las nominas de todos los usuarios
$contnominap=0; while($contnominap < $contusuarios){ 
$totalnominausuario[$contnominap] = $totaltotal*($porciento[$contnominap]/100);
$totalnetodelusuario[$contnominap] = (($totaltotal*($porciento[$contnominap]/100))-$avance[$contnominap]); 
$contnominap++;}
//Mostrados de los totales de las nominas de los usuarios
   $contnomina=1; while($contnomina < $contusuarios){ ?>

    <tr>
    <td><?php echo $usuarios[$contnomina]?></td>
    <?php //total de la nomina del usuario
    
    // Total neto de usuario
    ?>
    <td style="color:#4F0847;font-size:30px;">$<?php echo $totalnominausuario[$contnomina];?></td> 
    <td style="color:#E30529;font-size:30px;">$<?php echo  $avance[$contnomina];?></td>
    <td style="color:#0593E3;font-size:30px;">$<?php echo $totalnetodelusuario[$contnomina];?></td> 
    </tr>
    <?php $contnomina++;}?>

  </table>
  </form>
</div>
</div>

<!--Ventana emergente para el guardado de la nomina-->
<div class="modal fade" id="Snomina">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Ajustes <label class="lnr lnr-warning"></label></h5>
                </button>
            </div>
            <div class="modal-body">


<!--Query para añadir las nominas-->

<?php
//consulta para saber si se ha guardado antes la nomina 
$queryconsultanomina = "SELECT * FROM nomina where (fecha BETWEEN '$fecha1' and '$fecha2') ORDER BY id_nomina asc ";
$Rconnomina = mysqli_query($conn,$queryconsultanomina);
if(!$Rconnomina){echo "hey compa funciona";

  $conttotalnomina=0; while($conttotalnomina < $contusuarios){ 
    $query111 = "INSERT INTO nomina(socio_nombre,porciento_socio,total_nomina,total_descuento,total_neto) values ('$usuarios[$conttotalnomina]','$porciento[$conttotalnomina]','$totalnominausuario[$conttotalnomina]','$avance[$conttotalnomina]','$totalnetodelusuario[$conttotalnomina]')";
    $result = mysqli_query($conn,$query111);
    $conttotalnomina++;} 
  }
else{
  while($rowctn =mysqli_fetch_array($Rconnomina)){$id_cnomina= $rowctn['id_nomina'];}

}

//Insercion de todas las nominas



?>


            <!--Alerta de que esta guardada la nomina-->
             
            <div class="alert alert-success ?> alert-dismissible fade show" role="alert">
            Nomina guardada Correctamente
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            </div>
          
            <div class="modal-footer">
          
                
            
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<br><br>

<br><br>


<?php  ;break;}}include ("frontend/footer.php")?>