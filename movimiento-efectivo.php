<?php include ("conexion.php");

if(!isset($_SESSION['rol'])) {header('location: login.php');}
$nombre = $_SESSION['nombre'];



//Para enviar a caja
if(isset($_POST['prestamo'])){

  $datos = $_POST['prestamo'];
  $quer = "UPDATE ingreso SET  estado = 'prestado' WHERE id_ingreso = '$datos'";
  $resultado = mysqli_query($conn,$quer);
}
if(isset($_POST['enviarcaja'])){
  $datos = $_POST['enviarcaja'];
  $quer = "UPDATE ingreso SET  estado = 'caja' WHERE id_ingreso = '$datos'";
  $resultado = mysqli_query($conn,$quer);

}
if(isset($_POST['enviarbanco'])){
  $datos =  $_POST['enviarbanco'];
  $quer = "UPDATE ingreso SET  estado = 'banco' WHERE id_ingreso = '$datos'";
  $resultado = mysqli_query($conn,$quer);

}
//Enviado de todo
if(isset($_POST['todoprestamo'])){

  $datos = $_POST['prestamo'];
  $quer = "UPDATE ingreso SET  estado = 'prestado'";
  $resultado = mysqli_query($conn,$quer);
}
if(isset($_POST['todoenviarcaja'])){
  $datos = $_POST['enviarcaja'];
  $quer = "UPDATE ingreso SET  estado = 'caja'";
  $resultado = mysqli_query($conn,$quer);

}
if(isset($_POST['todoenviarbanco'])){
  $datos =  $_POST['enviarbanco'];
  $quer = "UPDATE ingreso SET  estado = 'banco' ";
  $resultado = mysqli_query($conn,$quer);

}
header("location: movimiento-efectivo-vista.php");



?>
