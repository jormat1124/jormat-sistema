<?php include("frontend/header.php"); 
 
if(!isset($_SESSION['rol'])) {header('location: login.php');}

 if((isset($_POST['completar'])) and ($_POST['completar'] >= 1)) {
  $temp = $_POST['completar']; 
$quer = "UPDATE reclamo SET  estado = 'Completado' WHERE id_reclamo = '$temp'";
mysqli_query($conn,$quer);
$_POST['completar'] = ''; 
}

if((isset($_POST['proceso'])) and ($_POST['proceso'] >= 1)){
  $temp1 = $_POST['proceso']; 
$quer1 = "UPDATE reclamo SET  estado = 'Implementando' WHERE id_reclamo = '$temp1'";
mysqli_query($conn,$quer1);
$_POST['proceso']='';
}

if((isset($_POST['eliminar'])) and ($_POST['eliminar'] >= 1)){
  $temp2 = $_POST['eliminar']; 
$quer2 = "DELETE FROM reclamo  WHERE id_reclamo = '$temp2'";
mysqli_query($conn,$quer2);
$_POST['eliminar']='';
}

$query = "SELECT * FROM reclamo ";
$resultado = mysqli_query($conn,$query);?>
<br>
<div class="container">
<div class="card card-body ">
<form action="consultareclamo-vista.php" method="post">
  <h2>Propuestas & Reclamos</h2>
  <p>Listado de propuestas & reclamos:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Fecha Reclamo</th>
        <th>Detalle</th>
        <th>Tipo</th>
        <th>Estado</th>
        <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
          <th>Socio</th>
         <th>Opciones</th>
        <?php break;}}?>  
      </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($resultado)){ ?>
      <tr>
        <td><?php echo $row['fecha_reclamo']?></td>
        <td><?php echo $row['detalle']?></td>
        
        <td><?php echo $row['tipo_reclamo']?></td>
        <td>
        <?php if($row['estado']=="Implementando"){?><i style="color:#F59100"><?php echo $row['estado'];}?></i>
        <?php if($row['estado']=="Completado"){?><i style="color:#00A3F5"><?php echo $row['estado'];}?></i>
        <?php if($row['estado']=="pendiente"){?><i style="color:#F50000"><?php echo $row['estado'];}?></i>


        </td>

        <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
          <td><?php echo $row['socio']?></td>
          <td>
          <button class="btn btn-primary"  name="completar" value="<?php echo $row['id_reclamo']?>" type="submit">Completar</button> 
          <button class="btn btn-warning"  name="proceso" value="<?php echo $row['id_reclamo']?>" type="submit">Implementando</button>
          <button class="btn btn-danger"  name="eliminar" value="<?php echo $row['id_reclamo']?>" type="submit">Eliminar</button>
          </td> 
        <?php ;}}}?>      
        </th>  
  </table>
</div>
</div>



<?php 




include ("frontend/footer.php")?>