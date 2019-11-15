

<?php 
include("frontend/header.php");

if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 
  
$query = "SELECT * FROM socio";
$resultado = mysqli_query($conn,$query);?>

<br>
<div class="container">
<div class="card card-body ">

  <h2>Socio <a class="btn btn-danger"  href="registrars-vista.php"><label class="lnr lnr-enter-down" ></label> Nuevo Socio </a></h2>
  <p>Nota: Solo editar los datos en caso de que sea necesario</p>            
  <table class="table table-striped">
    <thead >
      <tr>
        
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th>Telefono</th>
        <th>Familiar</th>
        <th>Telefono</th>
        <th>Opción</th>
      </tr>
    </thead>
    <?php $total=0; while($row = mysqli_fetch_array($resultado)){ ?>
      <tr>
        <td><?php echo $row['cedula']?></td>
        <td><?php echo $row['nombre']?></td>
        <td><?php echo $row['apellido']?></td>
        <td><?php echo $row['edad']?></td>
        <td><?php echo $row['sexo']?></td>
        <td><?php echo $row['telefono']?></td>
        <td><?php echo $row['familiar']?></td>
        <td><?php echo $row['telefonof']?></td>
        
        <td><a class="btn btn-warning"> <label class="lnr lnr-warning" ></label> Editar </a></td>

      </tr>
      <?php } ?>
      <thead>

  </table>
</div>
</div>

<?php ;break;}}include ("frontend/footer.php")?>