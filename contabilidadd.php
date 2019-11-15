
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



if(($dia == 13) or ($dia == 27)){

    $query5 = "SELECT * FROM ingreso where tipo_ingreso = 'negocio' and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
    $resultado5 = mysqli_query($conn,$query5);
    $total5=0; while($row5 = mysqli_fetch_array($resultado5)){$total5=$total5+$row5['cantidad'];}
    $total5 = (($total5*0.20)-1000);
    $_SESSION['message2'] = 'Su aproximado para esta quinsena es de: $'.$total5.' Pesos' ;
    $_SESSION['message_type2'] = 'primary'; 
}

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
        $error = '1222';}

    if($cantidadR <= '-1'){
        $_SESSION['message'] = 'Por favor ingresar valores positivos, vuelva a introducir todos los datos nuevamente';
        $_SESSION['message_type'] = 'danger';
        $error = '1222';}

   if ($error == ''){
    $query = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','$tipo_ingresoN','$cantidadN','$detalleN')";
    $result = mysqli_query($conn,$query);
    $query2 = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','$tipo_ingresoR','$cantidadR','$detalleR')";
    $result2 = mysqli_query($conn,$query2);
    $_SESSION['message'] = 'Datos guardados Correctamente, Buen trabajo, pase feliz resto de la noche';
    $_SESSION['message_type'] = 'success';
    

    if(!$result){
        $_SESSION['message'] = 'Datos de negocio no guardados, por introducir valores no numericos, por favor vuelva a Introduscalos nuevamente';
        $_SESSION['message_type'] = 'danger';
       ;}

       if(!$result2){
        $_SESSION['message'] = 'Datos de las recargas no guardados, por favor vuelva a introducirlos nuevamente';
        $_SESSION['message_type'] = 'danger';
       ;}
   }
//ESta es la parte de cerrar sección en la cual guarda la hora de salida del software
        if ($_SESSION['message_type'] == 'success'){
            
               
        $query = "SELECT * FROM ponche order by id_ponche desc limit 0,1";
        $resultado1 = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($resultado1)){$fuego = $row['id_ponche'];}

        ini_set('date.timezone','America/Santo_Domingo');
        $datof = date("Y-m-d H:i:s",time());
        $quer = "UPDATE ponche SET salida = '$datof' WHERE id_ponche = '$fuego'";
        $result = mysqli_query($conn,$quer);

        if(($hora3 >= 20) and ($dia == 15)){

            $query = "INSERT INTO gastos(socio,tipo_gasto,cantidad,detalle) values ('$socio','gastonegocio','2000','Local & Internet')";
            mysqli_query($conn,$query);
            $query2 = "INSERT INTO gastos(socio,tipo_gasto,cantidad,detalle) values ('$socio','gastonegocio','500','Ahorro para Inversion')";
            mysqli_query($conn,$query2);
            $query3 = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','inversion','500','ingresos para invertir')";
            mysqli_query($conn,$query3);
            $_SESSION['message2'] = 'Hoy es el día especial.';
            $_SESSION['message_type2'] = 'primary';
        
        }
        if(($hora3 >= 20) and ($dia == 30)){
        
            $query = "INSERT INTO gastos(socio,tipo_gasto,cantidad,detalle) values ('$socio','gastonegocio','1500','Local & Internet')";
            mysqli_query($conn,$query);
            $query2 = "INSERT INTO gastos(socio,tipo_gasto,cantidad,detalle) values ('$socio','gastonegocio','500','Ahorro para Inversion')";
            mysqli_query($conn,$query2);
            $query3 = "INSERT INTO ingreso(socio,tipo_ingreso,cantidad,detalle) values ('$socio','inversion','1000','ingresos para invertir')";
            mysqli_query($conn,$query3);
        
            $_SESSION['message2'] = 'Hoy es el día especial. ';
            $_SESSION['message_type2'] = 'primary';
        
        }


        }
        header("location: contabilidadd-vista.php");
}

}
else
{header('location: login.php');}
?>
