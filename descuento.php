<?php include("frontend/header.php"); ?>

<?php  if(!isset($_SESSION['rol'])) {header('location: login.php');}
$user = $_SESSION['nombre'];
//Consulta para ver los usuarios.
$query0 = "SELECT * FROM login Where estado='activo' and usuario!='$user'";
$resultado0 = mysqli_query($conn,$query0);
?>
<div class="container p-5">
<div class= col-md-8> 

<div class="card card-body -8">

        <form action="aefectivo.php" method="post">
            
        <h1><i class="fa fa-spinner"></i> Descuento Quinsenal</h1>

        <h3>Aplicar A:</h3>

        <?php while($row0= mysqli_fetch_array($resultado0)){ $nombre =$row0['usuario']; ?>
        
        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="<?php echo $nombre;?>" name="nombresocio">
        <label class="form-check-label" for="materialInline1"><?php echo $nombre;?></label>
        </div>
      
         <?php   }?>

        <br><h3>Cantidad*</h3>

        <div class="form-group">
        <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" autofocus>
        </div>

        <br><h3>Detalle*</h3>
        

        <div class="form-group">
        <input type="text" name="detalle" class="form-control" placeholder="Detalle" autofocus>
        </div>
            
            <i>Nota: "Por favor verifique la cantidad", debido a que despues de aplicado no se puede cambiar</i>  
            <br><br><input type="submit" class="btn btn-success btn-block" name="savedescuento" value="Aplicar Descuento">        
    </form>
    </div>
</div>
</div>
<?php include ("frontend/footer.php")?>