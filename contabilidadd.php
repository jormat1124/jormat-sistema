
<?php  
include('conexion.php');
if(!isset($_SESSION['rol'])) {header('location: login.php');}

ini_set('date.timezone','America/Santo_Domingo');

$socio = $_SESSION['nombre'];
$error = '';
$dia = date("d",time());
 $mes = date("m-",time());
 $ano = date("Y-",time());
 $hora = date(" H:i:s",time());
 $hora1 = " 05:00:00";
 $hora3 = date("H",time());     

 $horal = date("H",time());

 if($horal >16 & $horal <24){

 if($dia<=15){$dia1 = 1;}else{$dia1 = 16;}

 $fecha1 = $ano.($mes).($dia1).$hora1;
 $fecha2 = $ano.($mes).$dia.$hora;


//En proceso de movedera 
if(($dia == 13) or ($dia == 27)){

    $query5 = "SELECT * FROM ingreso where tipo_ingreso = 'negocio' and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
    $resultado5 = mysqli_query($conn,$query5);
    $total5=0; while($row5 = mysqli_fetch_array($resultado5)){$total5=$total5+$row5['cantidad'];}
    $total5 = (($total5*0.20) );
    $_SESSION['message2'] = 'Su aproximado para esta quinsena es de: $'.$total5.' Pesos' ;
    $_SESSION['message_type2'] = 'primary'; 
}

//Para guardar los datos de la contabilidad diaria
if((isset($_POST['save'])) and (isset($_SESSION['rol']))){
    $tipo_ingresoN= "negocio";
    $cantidadN = $_POST['cantidadn'];
    $detalleN = "Ingresos diarios";
    $tipo_ingresoR= "recarga";
    $cantidadR = $_POST['cantidadr'];
    $detalleR = "Ingresos diarios";
       
    if($cantidadN <= '-1'){
        $_SESSION['message'] = 'Por favor ingresar valores positivos, vuelva a introducir todos los datos nuevamente';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';
        header('location: contabilidadd-vista.php');}

    if($cantidadR <= '-1'){
        $_SESSION['message'] = 'Por favor ingresar valores positivos, vuelva a introducir todos los datos nuevamente';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';
        header('location: contabilidadd-vista.php');}

   if ($error == ''){
    $query = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','$tipo_ingresoN','$cantidadN','$detalleN')";
    $result = mysqli_query($conn,$query);
    $query2 = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','$tipo_ingresoR','$cantidadR','$detalleR')";
    $result2 = mysqli_query($conn,$query2);
    $_SESSION['message'] = 'Datos guardados Correctamente, Buen trabajo, pase feliz resto de la noche';
    $_SESSION['message_type'] = 'success';
    

    if(!$result){
        $_SESSION['message2'] = 'Datos de negocio no guardados, por introducir valores no numericos, por favor vuelva a Introduscalos nuevamente';
        $_SESSION['message_type'] = 'danger';
       ;}

       header('location: contabilidadd-vista.php');
   }

   //Para guardar los gastos mensuales del negocio

   if(($hora3 >= 20) and ($dia == 2)){

    $query = "INSERT INTO gastos(socio,tipo_gasto,cantidad,detalle) values ('$socio','gastonegocio','2500','Local & Internet')";
    mysqli_query($conn,$query);
    $query2 = "INSERT INTO gastos(socio,tipo_gasto,cantidad,detalle) values ('$socio','gastonegocio','500','Ahorro para Inversion')";
    mysqli_query($conn,$query2);
    $query3 = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','inversion','500','ingresos para invertir')";
    mysqli_query($conn,$query3);

}
if(($hora3 >= 20) and ($dia == 17)){

    $query = "INSERT INTO gastos(socio,tipo_gasto,cantidad,detalle) values ('$socio','gastonegocio','2500','Local & Internet')";
    mysqli_query($conn,$query);
    $query2 = "INSERT INTO gastos(socio,tipo_gasto,cantidad,detalle) values ('$socio','gastonegocio','500','Ahorro para Inversion')";
    mysqli_query($conn,$query2);
    $query3 = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','inversion','500','ingresos para invertir')";
    mysqli_query($conn,$query3);
}




//ESta es la parte de cerrar sección en la cual guarda la hora de salida del software
 }}
header('location: contabilidadd-vista.php');
?>
