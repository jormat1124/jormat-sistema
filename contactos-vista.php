<?php include("frontend/header.php"); 
if(!isset($_SESSION['rol'])) {header('location: login.php');}
$query = "SELECT * FROM socio";
$resultado = mysqli_query($conn,$query);?>
<div class="container">
<br>

<div class="card card-body ">
<div class="container">
  <h2>Contactos Socios</h2>
  <p>Nota: Estos son datos personales cualquier utilización de los mismos sin autorización sera penalizada.</p>            
  <table class="table table-striped">
    <thead >
      <tr>
        
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Familiar</th>
        <th>Telefono</th>
      </tr>
    </thead>
    <?php $total=0; while($row = mysqli_fetch_array($resultado)){ ?>
      <tr>
        
        <td><?php echo $row['nombre']?></td>
        <td><?php echo $row['telefono']?></td>
        <td><?php echo $row['familiar']?></td>
        <td><?php echo $row['telefonof'];} ?></td>
        
      </tr>
      <thead>

  </table>
</div>
</div>

<?php include ("frontend/footer.php")?>