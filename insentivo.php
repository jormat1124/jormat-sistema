<?php include("frontend/header.php"); ?>

<?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 
$user = $_SESSION['nombre'];
//Consulta para ver los usuarios.
$query0 = "SELECT * FROM login Where estado='activo'";
$resultado0 = mysqli_query($conn,$query0);
?>
<div class="container p-5">
<div class= col-md-8> 

<!--Mensaje del descuento-->
<?php  

 
if(isset($_POST['saveinsentivo'])){
    $error = '';
    $user = $_SESSION['nombre'];
    $socio = $_POST['nombresocio'];
    $cantidad = $_POST['cantidad'];
    $detalle = $_POST['detalle'];
    //$cantidadc = $_POST['cantidadc'];
    //$detallec = $_POST['detallec'];

    if (empty($cantidad) & empty($cantidadc)){
        $_SESSION['message'] = 'Ingrese una cantidad';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}

    if (empty($detalle) & empty($detallec)){
        $_SESSION['message'] = 'Ingrese un detalle';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}

    if (empty($socio)){
        $_SESSION['message'] = 'Favor Selecional un Socio';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}
    if($cantidad < 1){
        $_SESSION['message'] = 'Verifique la cantidad debido a que no se pueden agregar valores negativos';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';
    }

        if ($error == ''){

            $query = "INSERT INTO  ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','insentivo','$cantidad','$detalle')";
            $result = mysqli_query($conn,$query);
        
            $_SESSION['message'] = 'Insentivo aplicado a :'. $socio ." Por: ".$detalle;
            $_SESSION['message_type'] = 'success';
        
            if(!$result){
                $_SESSION['message'] = 'No Guardado correctamente';
                $_SESSION['message_type'] = 'danger';
               }
           }
}
//Para guardar los datos del insentivo

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

<!--Html para el insentivo-->

<div class="card card-body -8">

        <form action="insentivo.php" method="post">
            
        <h1><i class="fa fa-spinner"></i> Insentivo!</h1>

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
            <br><br><input type="submit" class="btn btn-success btn-block" name="saveinsentivo" value="Aplicar Insentivo">        
    </form>
    </div>
</div>
</div>
<?php  ;break;}}include ("frontend/footer.php")?>