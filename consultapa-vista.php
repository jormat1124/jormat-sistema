<?php include("frontend/header.php"); 

if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 

?>
<br>

<div class="container p-4">
<div class="card card-body">

<form action="consultapa-vista" method="post">
  <h2>Consultas generales</h2>
  <p>Aqui se encuentran las consultas de todo el software</p>
  <h2>Fecha & Hora</h2>
<p>Recuerda que dependiendo la fecha que pongas así sera tu consulta</p>


        <div class="col-sm-3">
        <label for="exampleInputEmail1"><h5>Fecha Inicial</h5></label>
        <input type="text" name="fechai"class="form-control datetimepicker-input" id="datetimepicker4" data-toggle="datetimepicker" data-target="#datetimepicker4"/>
        </div><br>

        <div class="col-sm-3">
        <label for="exampleInputEmail1"><h5>Fecha Final</h5></label>
        <input type="text" name="fechaf"class="form-control datetimepicker-input" id="datetimepicker" data-toggle="datetimepicker" data-target="#datetimepicker"/>
        </div><br>
        
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker4').datetimepicker({
                    format: "Y-M-D H:mm:ss",});
                   
                $('#datetimepicker').datetimepicker({
                    format: "Y-M-D H:mm:ss"});});
        </script>
  <h2>Elija que desea consultar</h2>
        <h5>Generales</h5>
        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="ingreso" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Ingresos</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="gastos"name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline1">Gastos</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="ventas" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Ventas</label>
        </div>

        <h5>Ingresos</h5>           
        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="negocio" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Negocio</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="hogar" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Hogares</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="recarga" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Recargas</label>
        </div>

        <h5>Gastos</h5>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="gastonegocio" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Gasto Negocio</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="inversionadmin" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Inversion Admin</label>
        </div>


        <h5>Inversiones</h5>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="inversionnegocio" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Inversiones Negocio</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="inversionred" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Inversion Red</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="inversionhogar" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Inversion Hogares</label>
        </div>



        
       


<br>  
  <button class="btn btn-danger"  name="buscar" value="1" type="submit"><h2>Mostrar Informe Detallado <label class="lnr lnr-chevron-down"></label></h2></button> 
<br>

 


<!-- Consultas -->
<?php if(isset($_POST['buscar'])){ //Consultas de los diferentes ingresos
$temp = '';
if ((empty($_POST['inlineMaterialRadiosExample']))or(empty($_POST['fechai']))or (empty($_POST['fechaf']))){$temp = '1234';?>
       
    <h2><i>Datos erroneos favor vuelva a realizar su consulta</i></h2>

<?php }

if($temp == ''){
 //*Ingresoss
    $fechai = $_POST['fechai'];
    $fechaf = $_POST['fechaf'];
    $tipo = $_POST['inlineMaterialRadiosExample'];



//Consultas de los ingresos 




if(($tipo == 'ingreso')or($tipo == 'negocio')or($tipo == 'hogar')or($tipo == 'recarga')){
if($tipo == 'ingreso'){
$ingreso = "SELECT * FROM ingreso where fecha_ingreso BETWEEN '$fechai' and '$fechaf'";
}else{
$ingreso = "SELECT * FROM ingreso where tipo_ingreso = '$tipo' and (fecha_ingreso BETWEEN '$fechai' and '$fechaf')";}
$resultado = mysqli_query($conn,$ingreso);
?>
<table class="table table-striped">
<thead>
      <tr>
      <th>Socio</th>
      <th>Tipo de Ingreso</th>
        <th>Cantidad</th>
        <th>Detalle</th>
        
        <th>Fecha</th>
        </tr>
</thead>
<?php $total = 0;while($row10= mysqli_fetch_array($resultado)){ ?>
        <tr>
        <td ><?php echo $row10['socio']; ?></td>
        <td ><?php echo $row10['tipo_ingreso']; ?></td>
        <td ><?php echo $row10['cantidad']; $total= $total+$row10['cantidad'];?></td>
        <td ><?php echo $row10['detalle']; ?></td>
        <td ><?php echo $row10['fecha_ingreso']; ?></td>
        </tr>
<?php }?> <b style="color:#F50000;font-size:50px;">Total: RD$ <?php echo $total;?>.00</b> 


</table><?php }?>
<?php
if(($tipo == 'gastos')or($tipo == 'inversionadmin')or($tipo == 'inversionred')or($tipo == 'inversionnegocio')or($tipo == 'inversionhogar')or($tipo == 'gastonegocio')){
if($tipo == 'gastos'){
$gasto = "SELECT * FROM gastos where fecha_gato BETWEEN '$fechai' and '$fechaf'";
}else{
$gasto = "SELECT * FROM gastos where tipo_gasto = '$tipo' and (fecha_gato BETWEEN '$fechai' and '$fechaf')";}
$resultad = mysqli_query($conn,$gasto);
?>
<table class="table table-striped">
<thead>
      <tr>
      <th>Socio</th>
      <th>Tipo de Gasto</th>
        <th>Cantidad</th>
        <th>Detalle</th>
        <th>Fecha</th>
        </tr>
</thead>
<?php $total = 0;while($row10= mysqli_fetch_array($resultad)){ ?>
        <tr>
        <td ><?php echo $row10['socio']; ?></td>
        <td ><?php echo $row10['tipo_gasto']; ?></td>
        <td ><?php echo $row10['cantidad']; $total= $total+$row10['cantidad'];?></td>
        <td ><?php echo $row10['detalle']; ?></td>
        <td ><?php echo $row10['fecha_gato']; ?></td>
        </tr>
<?php }?> <b style="color:#F50000;font-size:50px;">Total: RD$ <?php echo $total;?>.00</b> 


</table><?php }}?>

<?php 
if($tipo == 'ventas'){

$query = "SELECT a.articulo,f.cantidad,f.rebaja,f.total_venta,f.total_ganancia,f.socio,f.fecha_venta FROM articulos a inner join factura f on a.id_articulo = f.l_id_articulo where f.fecha_venta BETWEEN '$fechai' and '$fechaf' ";
$resultado = mysqli_query($conn,$query);?>

<table class="table table-striped">
<thead>
  <tr>

    <th>Producto</th>
    <th>Cantidad</th>
    <th>rebaja</th>
    <th>T-Venta</th>
    <th>T-Ganancia</th>
    <th>Socio</th>
    <th>Fecha Venta</th>
  </tr>
</thead>
<?php $total=0; $total1=0; $total2=0; $total3=0;  while($row = mysqli_fetch_array($resultado)){ ?>
  <tr>

    <td><?php echo $row['articulo']?></td>
    <td><?php echo $row['cantidad']; $total = $total + $row['cantidad'];?></td>
    <td><?php echo $row['rebaja']; $total1 = $total1 + $row['rebaja'];?></td>
    <td><?php echo $row['total_venta']; $total2 = $total2 + $row['total_venta']; ?></td>
    <td><?php echo $row['total_ganancia']; $total3 = $total3 + $row['total_ganancia'];?></td>
    <td><?php echo $row['socio'];?></td>
    <td><?php echo $row['fecha_venta'];?></td>
    </tr>
<?php }?>

    <b style="color:#F50000;font-size:30px;">T-Articulos-V: <?php echo $total;?></b><br>
    <b style="color:#F50000;font-size:30px;">T-Reabajado-V RD$ <?php echo $total1;?>.00</b><br>
    <b style="color:#F50000;font-size:30px;">T-Vendido RD$ <?php echo $total2;?>.00</b><br>
    <b style="color:#F50000;font-size:30px;">T-Ganancia RD$ <?php echo $total3;?>.00</b>  
</table>




<?php ;break;}}}} include ("frontend/footer.php")?>

