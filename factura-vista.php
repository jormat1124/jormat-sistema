<?php include("frontend/header.php"); 

if(!isset($_SESSION['rol'])) {header('location: login.php');}


$error = '';  
if (isset($_POST['anadir'])){
    $socio = $_SESSION['nombre'];
    $idarticulo = $_POST['anadir'];
    $pventa = $_POST['precioventa'.$idarticulo];
    $cantidad = $_POST['cantidad'.$idarticulo];


    $exis = "SELECT * FROM articulos WHERE id_articulo = '$idarticulo'";
    $resulta = mysqli_query($conn,$exis);
    while($row = mysqli_fetch_array($resulta)){$idarticulo = $row['id_articulo']; $disponible = $row['existencia']; $pcompra =  $row['precio_compra']; }
    
    $total_venta = ($pventa * $cantidad);
    $pcompra = $pcompra * $cantidad;
    $total_ganancia = ($total_venta - $pcompra);

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

  if ($error == ''){

       
        
        $query = "INSERT INTO FACTURA(l_id_articulo,cantidad,socio,total_venta,total_invertido,total_ganancia) value ('$idarticulo','$cantidad','$socio','$total_venta','$pcompra','$total_ganancia')";
        $resulta = mysqli_query($conn,$query);
        
        $cantidad = $disponible - $cantidad;
        $quer = "UPDATE articulos SET  existencia = '$cantidad' WHERE id_articulo = '$idarticulo'";
        mysqli_query($conn,$quer);
     
        $_SESSION['message'] = 'Articulo Añadido';
        $_SESSION['message_type'] = 'primary';


        
  }?>


  <?php }?>


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
          <button class="btn btn-success" type="submit" name="anadir" value="<?php echo $row['id_articulo']?>" >Añadir</button> 
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