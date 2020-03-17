<?php include("frontend/header.php"); 

if(!isset($_SESSION['rol'])) {header('location: login.php');}
?>



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

<br>
<div class="container">
<div class="card card-body ">
<div class="col-sm-5">
<form action="factura-vista.php" method="POST">

<h2><i class="fa fa-shopping-bag fa-1x"></i> Ventas</h2>
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
</form>
<form action="factura.php" method="POST">
<h6>Listado detallado de articulos</h6>
<table class="table ">
<thead>
  <tr>
    <th>Articulo</th>
    <th>Detalle</th>
    <th width="3">Cantidad</th>
    <th>P-Venta</th>
    <th>Existencia</th>
    <th>Opciones</th>
  </tr>
</thead>

<?php $total=0;while($row = mysqli_fetch_array($resultado)){ ?>
<div>
<tr>
        <td><?php echo $row['articulo']?></td>
        <td><?php echo $row['detalle']?></td>
        <td><input type="number" name="cantidad<?php echo $row['id_articulo']?>" class="form-control" value="1"></td>
        <td>
        
        <select class="form-control" name = "precioventa<?php echo $row['id_articulo']?>">
        
                    <option  value="<?php echo $row['precio_venta']?>" ><?php echo $row['precio_venta']?></option>
                    <option value="<?php echo $row['precio_medio']?>" ><?php echo $row['precio_medio']?></option>
                    <option value="<?php echo $row['precio_minimo']?>" ><?php echo $row['precio_minimo']?></option>
                    
        </select>
        <td style="color:#FD3C40; font-size:30px"><?php echo $row['existencia']?></td>
        <td>
          <button class="btn btn-success" type="submit" name="anadir" value="<?php echo $row['id_articulo']?>" >Vender</button> 
        </td> 
        </tr>
        </div>
        <?php  } ?>

      
    
  </table>  
</form>
</div>
</div>
</div>
<?php include ("frontend/footer.php")?>