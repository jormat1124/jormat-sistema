<?php include("frontend/header.php"); 

if(!isset($_SESSION['rol'])) {header('location: login.php');}


$error = '';  
if (isset($_POST['anadir'])){
  $idfactura = $_GET['id'];
    $socio = $_SESSION['nombre'];
    $idarticulo = $_POST['anadir'];
    $cantidad = $_POST['cantidad'];
    $rebaja = $_POST['rebaja'];

    $exis = "SELECT * FROM articulos WHERE id_articulo = '$idarticulo'";
    $resulta = mysqli_query($conn,$exis);
    while($row = mysqli_fetch_array($resulta)){$idarticulo = $row['id_articulo']; $disponible = $row['existencia']; $pventa =  $row['precio_venta']; $pcompra =  $row['precio_compra'];  $pminimo = $row['precio_minimo']; }
    
    $total_venta = ($pventa * $cantidad)-$rebaja;
    $pcompra = $pcompra * $cantidad;
    $pminimo = $pminimo * $cantidad;
    $total_ganancia = ($total_venta - $pcompra)-$rebaja;

    if($disponible == 0){
        $_SESSION['message'] = 'Este articulo no se encuentra disponible';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';
    }

    if($cantidad <= -1){
      $_SESSION['message'] = 'Por favor ingresar valores positivos';
      $_SESSION['message_type'] = 'danger';
      $error = '1222';
  }

  if($rebaja <= -1){
    $_SESSION['message'] = 'Por favor ingresar valores positivos';
    $_SESSION['message_type'] = 'danger';
    $error = '1222';
}

  if($total_venta < $pminimo)
{
  $_SESSION['message'] = 'Por favor ingresar un valor menor en la rebaja';
  $_SESSION['message_type'] = 'danger';
  $error = '1222';
}

    if(!isset($_GET['id'])){

        $_SESSION['message'] = 'No puede aceder de esta forma';
        $_SESSION['message_type'] = 'danger'; 
        $error = '1222';
    }
    

  if ($error == ''){

       
        
        $query = "INSERT INTO FACTURA(factura,l_id_articulo,cantidad,rebaja,socio,total_venta,total_ganancia) value ('$idfactura','$idarticulo','$cantidad','$rebaja','$socio','$total_venta','$total_ganancia')";
        $resulta = mysqli_query($conn,$query);
        
        $cantidad = $disponible - $cantidad;
        $quer = "UPDATE articulos SET  existencia = '$cantidad' WHERE id_articulo = '$idarticulo'";
        mysqli_query($conn,$quer);
     
        $_SESSION['message'] = 'Articulo Añadido';
        $_SESSION['message_type'] = 'primary';


        
  }?>


<META HTTP-EQUIV="Refresh" CONTENT="0; URL=factura-vista.php">

  <?php }?>


<br>
<div class="container">
<div class="card card-body ">
<div class="col-sm-5">
<form action="afactura-vista.php?id=<?php echo $_GET['id'];?>" method="POST">

<h1>Articulos</h1>

<!--Buscar Curso-->
<div class="form-group">
<label for="exampleInputEmail1">Cantidad</label>
<input type="text" name="cantidad" class="form-control" value="1">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Rebaja</label>
<input type="text" name="rebaja" class="form-control" value="0">
</div>

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
    <th>Opciones</th>
  </tr>
</thead>

<?php $total=0;while($row = mysqli_fetch_array($resultado)){ ?>

<tr>
        <td><?php echo $row['articulo']?></td>
        <td><?php echo $row['detalle']?></td>
        <td><?php echo $row['precio_venta']?></td>
        <td style="color:#FD3C40; font-size:30px"><?php echo $row['existencia']?></td>
        <td>
          <button class="btn btn-success" type="submit" name="anadir" value="<?php echo $row['id_articulo']?>" >Añadir</button> 
        </td> 
        
        <?php  } ?>

      </tr>
    
  </table>  
</form>
</div>
</div>
</div>
<?php include ("frontend/footer.php")?>