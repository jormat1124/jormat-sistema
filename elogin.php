<?PHP include ("frontend/header.php");

if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 
if(isset($_GET['nombre'])){
    $tem = $_GET['nombre'];
    $query = "SELECT * FROM login WHERE usuario = '$tem'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
     $row = mysqli_fetch_array($result);
    $nombre = $row['usuario'];
     $clave = $row['clave'];
    }
}

?>

<div class="container p-5">
<div class= col-md-8> 
<div class="card card-body -8">
    <form action="actualizaru.php?temp=<?php echo $nombre ?>" method="POST">
        
    <h1>Actualizar datos del usuario</h1>

        <div class="form-group">
        <label for="exampleInputEmail1">Usuario</label>
        <input type="text" name="usuario" class="form-control" value="<?php echo $nombre;?>" placeholder="Actualizar Nombre">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Contraceña</label>
        <input type="text" name="clave" class="form-control"  value="<?php echo "user"?>" placeholder="Actualizar Información">
        </div>
       
        <input type="submit" class="btn btn-success btn-block" name="update" value="Actualizar"  >

       
</form>  
</div>
</div>
</div>

<?php ;break;}} include ("frontend/footer.php");?>