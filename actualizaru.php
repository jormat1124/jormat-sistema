<?php 
include ("conexion.php");
if(isset($_SESSION['usuario'])) {
    header('location: principal.php');
}
if (isset($_POST['update'])){
    $temp2 = $_GET['temp'];

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $estado = $_POST['estado'];
    $porciento = $_POST['porciento'];
    if ($clave == 'user'){$clave = 'b14361404c078ffd549c03db443c3fede2f3e534d73f78f77301ed97d4a436a9fd9db05ee8b325c0ad36438b43fec8510c204fc1c1edb21d0941c00e9e2c1ce2';}
    $quer = "UPDATE login SET  usuario = '$usuario', clave = '$clave',estado = '$estado' , porciento = '$porciento'WHERE usuario = '$temp2'";
    $resultado = mysqli_query($conn,$quer);

    $_SESSION['message'] = 'Usuario actualizado exitosamente';
    $_SESSION['message_type'] = 'success';

    header("location: alogin-vista.php");
}?>