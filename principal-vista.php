

<?php include("frontend/header.php"); ?>
<?php  if(!isset($_SESSION['rol'])) {header('location: login.php');}?>




<br><br><br>
<img src="image/welcome.png" class="img-fluid rounded mx-auto d-block" alt="Responsive image">



<?php include ("frontend/footer.php")?>

