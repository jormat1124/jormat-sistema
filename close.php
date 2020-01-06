<?php 
include("conexion.php");
ini_set('date.timezone','America/Santo_Domingo');

$datof = date("Y-m-d H:i:s",time());
      
$query = "SELECT * FROM ponche order by id_ponche desc limit 0,1";
$resultado1 = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($resultado1)){$fuego = $row['id_ponche'];}

$quer = "UPDATE ponche SET salida = '$datof' WHERE id_ponche = '$fuego'";
$result = mysqli_query($conn,$quer);

session_destroy();
$_SESSION = array();
header('location: index.php');
?>