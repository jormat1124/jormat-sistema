<?php include("frontend/header.php"); 

if(!isset($_SESSION['rol'])) {header('location: login.php');}
?>
<br>
<div class="container">
<div class="card card-body ">
<div class="col-sm-5">

<form action="articulo-vista.php" method="POST">

<h1>Articulos
<?php if(isset($_SESSION['rol'])){switch($_SESSION['rol']){case 1:?>     
 <a class="btn btn-danger"  href="aarticulo-vista.php"><label class="lnr lnr-enter-down" ></label> Nuevo Articulo </a>
 <?php break;}}?>
</h1>

<!--Añadir articulos-->
<?php    
if(isset($_POST['anadir'])>=1){ ;?>
    
    <p>Nota: Solo ingrese la cantidad de articulos de la compra actual</p>

        <div class="form-group ">
        <input type="text" name="cantidad" class="form-control" placeholder="Cantidad" autofocus>
        </div>
        <button type="submit" class="btn btn-success" value="<?php echo $_POST['anadir'];?>" name="save">Guardar</button>
<!--Codigo para añadirlo-->
<?php }
if (isset($_POST['save'])){
     if(($_POST['save'])!=($_POST['cantidad'])){
      $error = '';   
    $articulo = $_POST['save'];
    $cantidad = $_POST['cantidad'];

    if($cantidad < '1'){
      $_SESSION['message'] = 'Por favor ingrese valores positivos, datos no guardados';
      $_SESSION['message_type'] = 'danger';
      $error = '1222';}

  if ($error == ''){
        $query = "SELECT * FROM articulos WHERE id_articulo = '$articulo'";
        $resulta = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($resulta)){$cantidade = $row['existencia'];}
        
        $cantidad = $cantidad + $cantidade;
        $quer = "UPDATE articulos SET  existencia = '$cantidad' WHERE id_articulo = '$articulo'";
        mysqli_query($conn,$quer);
     
        $_SESSION['message'] = 'Nueva cantidad añadida, por favor no actualize debido a que se duplicara la cantidad';
        $_SESSION['message_type'] = 'primary';

        $_POST['save'] = '';
        $_POST['cantidad'] = '';
    
  }
}}  ?>

<!--Mensaje de que se a;adio o modifico el articulo-->
<?php   
        if(isset($_SESSION['message'])) { 
        if(($_SESSION['message']) != ($_SESSION['message_type'])){?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php }} $_SESSION['message_type']=''; $_SESSION['message']=''; 

?>
<!--Eliminar articulo-->
<?php if(isset($_POST['eliminar'])){ 
 $temp2 = $_POST['eliminar']; 
 $quer2 = "DELETE FROM articulos WHERE id_articulo = '$temp2'";
 mysqli_query($conn,$quer2);
 $_POST['eliminar']='';

}?>


<!--Buscar Curso-->

<br>
<div class="form-group d-inline-block align-top"> 
   <input type="text" name="informacion" class="form-control" placeholder="Nombre del articulo">
</div>  
<button class="btn btn-info d-inline-block align-top" type="submit" name="buscar"><label class="lnr lnr-enter-down "  ></label> Buscar Articulo </button>  
</div>  
<!--Consulta buscar curso-->

<?php if(isset($_POST['buscar'])){ 
$nombre = $_POST['informacion']; 
$query = "SELECT * FROM articulos where articulo like '%$nombre%'";}
else
{
    $query = "SELECT * FROM articulos";
}
$resultado = mysqli_query($conn,$query); ?>

<table class="table ">
<thead>
  <tr>
    <th>Articulo</th>
    <th>Detalle</th>
    <th>P-Venta</th>
    <th>Existencia</th>
    <?php if(isset($_SESSION['rol'])){switch($_SESSION['rol']){case 1:?>
    <th>P-Minimo</th>
    <th>P-Compra</th>
    <th>Proveedor</th>
    <th>Opciones</th>
    <?php break;}}?>
  </tr>
</thead>

<?php $total=0;while($row = mysqli_fetch_array($resultado)){ ?>

<tr>
        <td><?php echo $row['articulo']?></td>
        <td><?php echo $row['detalle']?></td>
        <td><?php echo $row['precio_venta']?></td>
        <td style="color:#FD3C40; font-size:30px"><?php echo $row['existencia']?></td>
        <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
        <td><?php echo $row['precio_minimo']?></td>    
        <td><?php echo $row['precio_compra']?></td>  
        <td><?php echo $row['proveedor']?></td>  
        <?php break;}}?>
        <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
        <td>
          <button class="btn btn-primary" type="submit" name="anadir" value="<?php echo $row['id_articulo']?>" >A-Cantidad</button> 
          <button class="btn btn-danger" type="submit" name="eliminar" value="<?php echo $row['id_articulo']?>" >Eliminar-A</button> 
        </td> 
        <?php break;}}?>
        <?php $total=$total+$row['existencia']; } ?></td>

      </tr>
      <thead>
      <tr>
        <?php if(isset($_SESSION['rol'])){switch($_SESSION['rol']){case 1:?>
        <th><h2 style="color:#9C2C2E">Articulos: <?php echo $total;?></h2></th>
        <?php break;}}?>
      </tr>

  </table>  
</form>
</div>
</div>
</div>
<?php include ("frontend/footer.php")?>