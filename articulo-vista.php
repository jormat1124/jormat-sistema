<?php include("frontend/header.php"); 

if(!isset($_SESSION['rol'])) {header('location: login.php');}

//<!--Consulta buscar curso-->
 if(isset($_POST['buscar'])){ 
$nombre = $_POST['informacion']; 
$query = "SELECT * FROM articulos where articulo like '%$nombre%'";}
else
{
    $query = "SELECT * FROM articulos";
}
$resultado = mysqli_query($conn,$query); ?>

<br>

<div class="card card-body ">
<div class="col-sm-5">
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
<h1>Articulos
<?php if(isset($_SESSION['rol'])){switch($_SESSION['rol']){case 1:?>     
 <a class="btn btn-danger"  href="aarticulo-vista.php"><label class="lnr lnr-enter-down" ></label> Nuevo Articulo </a>
 <?php break;}}?>
</h1>

<!--Buscar Curso-->
<form action="articulo-vista.php" method="POST">
<br>
<div class="form-group d-inline-block align-top"> 
   <input type="text" name="informacion" class="form-control" placeholder="Nombre del articulo">
</div>  
<button class="btn btn-info d-inline-block align-top" type="submit" name="buscar"><label class="lnr lnr-enter-down "  ></label> Buscar Articulo </button>  
</div> 
</Form> 

<!--Tabla-->
<form action="articulo.php" method="POST">
<table class="table table-responsive table-striped ">
<thead>
  <tr>
    <th width="20%">Articulo</th>
    <th>Detalle</th>
    <th width="9%">Precio Venta</th>
    <th width="9%">Existencia</th>
     <th width="9%">Precio Minimo</th>
    <th width="9%">Precio Compra</th>
    <th>Proveedor</th>
    <th style="color:#FD3C40; " width="9%">Nueva Cantidad</th>
    <th style="color:#FD3C40; " width="9%">Precio Compra</th>
    <th width="15%">Opciones</th>
     </tr>
</thead>

<?php $total=0;while($row = mysqli_fetch_array($resultado)){ ?>

<tr>
<td><input type="text" name="articulo<?php echo $row['id_articulo']?>" class="form-control" value="<?php echo $row['articulo']?>"></td>
<td><input type="text" name="detalle<?php echo $row['id_articulo']?>" class="form-control" value="<?php echo $row['detalle']?>"></td>
<td><input type="number" name="precio_venta<?php echo $row['id_articulo']?>" class="form-control" value="<?php echo $row['precio_venta']?>"></td>
<td style="color:#FD3C40; font-size:30px"><?php echo $row['existencia']?></td>
<td><input type="number" name="precio_minimo<?php echo $row['id_articulo']?>" class="form-control" value="<?php echo $row['precio_minimo']?>"></td>
<td><input type="number" name="precio_compra<?php echo $row['id_articulo']?>" class="form-control" value="<?php echo $row['precio_compra']?>"></td>
<td><input type="text" name="proveedor<?php echo $row['id_articulo']?>" class="form-control" value="<?php echo $row['proveedor']?>"></td>
<td><input type="number" name="ncantidad<?php echo $row['id_articulo']?>" class="form-control" value="0"></td>
<td><input type="number" name="nprecio<?php echo $row['id_articulo']?>" class="form-control" value="0"></td>

<td >
          <button class="btn btn-primary" type="submit" name="anadir" title="Añadir Nueva Cantidad"value="<?php echo $row['id_articulo']?>" ><i class="fa fa-paper-plane" aria-hidden="true"></i></button> 
          <button class="btn btn-warning" type="submit" name="editar" title="Editar Articulo" value="<?php echo $row['id_articulo']?>" ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></button> 
          <button class="btn btn-danger" type="submit" name="eliminar"title="Eliminar Articulo"  value="<?php echo $row['id_articulo']?>" ><i class="fa fa-trash" aria-hidden="true"></i></button> 
</td> 
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