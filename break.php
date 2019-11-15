<?php
 ini_set('date.timezone','America/Santo_Domingo'); $hora = date("H",time()); 
if($hora >=12 & $hora <=15){

include("conexion.php");
    
$query = "SELECT * FROM ponche order by id_ponche desc limit 0,1";
$resultado1 = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($resultado1)){$fuego = $row['id_ponche'];}

ini_set('date.timezone','America/Santo_Domingo');
$datof = date("d-m-Y H:i:s",time());
$quer = "UPDATE ponche SET receso = '$datof' WHERE id_ponche = '$fuego'";
 $result = mysqli_query($conn,$quer);
 if(!$result){
    die("Query Faile");
 }

 session_destroy();
 $_SESSION = array();
 
 header('location: index.php');
}
else
{header('location: login.php');}
?>