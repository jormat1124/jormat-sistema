<?php include("frontend/header.php"); 
if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 
  
$query = "SELECT * FROM login";
$resultado = mysqli_query($conn,$query);?>

<br>
<!-- Mensaje-->
<?php if(isset($_SESSION['message'])) { 
        if(($_SESSION['message']) != ($_SESSION['message_type'])){?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php }} $_SESSION['message_type']=''; $_SESSION['message']=''; ?>
    <div class="container">
<div class="card card-body ">

  <h2><i class="fa fa-users" aria-hidden="true"></i> Usuarios <a class="btn btn-danger"  href="registraru-vista.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Nuevo Usuario </a></h2>
  <p>Nota: Solo editar los datos en caso de que sea necesario</p>            
  <table class="table table-striped">
    <thead >
      <tr>
        
        <th>Usuario</th>
        <th>Tipo</th>
        <th>Ganancia</th>
        <th>Clave</th>
        <th>Estado</th>
        <th>Opción</th>
      </tr>
    </thead>
    <?php $total=0; while($row = mysqli_fetch_array($resultado)){ ?>
      <tr>
        <td><?php echo $row['usuario']?></td>
        <td><?php if($row['tipo']== '1'){echo "Administrador";} else {echo "Estandar";}?></td>
        <td><?php echo $row['porciento']?>%</td>
        <td><?php echo "No Disponible"; ?></td>
        <td ><?php echo $row['estado']?></td>
        <td><a class="btn btn-warning" href="elogin.php?nombre=<?php echo $row['usuario'];?>">  <i class="fa fa-cog" aria-hidden="true"></i></a></td>

      </tr>
      <?php } ?>
      <thead>

  </table>
</div>
</div>

<?php ;break;}} include ("frontend/footer.php")?>