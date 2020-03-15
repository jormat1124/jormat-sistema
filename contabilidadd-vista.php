
<?php include("frontend/header.php");
 if(!isset($_SESSION['rol'])) {header('location: login.php');}
 ini_set('date.timezone','America/Santo_Domingo');

$nombre = $_SESSION['nombre'];

 $dia = date("d",time());
 $mes = date("m-",time());
 $ano = date("Y-",time());
 $hora = " 23:55:00";
 $hora1 = " 05:00:00";
 $fecha1 = $ano.($mes).($dia).$hora1;
 $fecha2 = $ano.($mes).$dia.$hora;
//Sql para mostrar los ingresos
$query1 = "SELECT * FROM ingreso where (socio = '$nombre' and tipo_ingreso = 'hogar') and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$resultado1 = mysqli_query($conn,$query1);

$query2 = "SELECT * FROM ingreso where (socio = '$nombre' and tipo_ingreso = 'negocio') and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$resultado2 = mysqli_query($conn,$query2);

$query3 = "SELECT * FROM ingreso where (socio = '$nombre' and tipo_ingreso = 'recarga') and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$resultado3 = mysqli_query($conn,$query3);

$query4 = "SELECT * FROM factura where (socio = '$nombre') and fecha_venta BETWEEN '$fecha1' and '$fecha2'";
$resultado4 = mysqli_query($conn,$query4);

$query5 = "SELECT * FROM ingreso where (socio = '$nombre' and tipo_ingreso = 'tarjeta') and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$resultado5 = mysqli_query($conn,$query5);

//Recargas de ambos turnos

$recargas = "SELECT * FROM ingreso where ( tipo_ingreso = 'recarga') and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$rrecargas = mysqli_query($conn,$recargas);

?>
<div class="container">
<br>
<!--Consultas para ver los ingresos-->
<div class="card card-body ">
<div class="container">
<h2>Contabilidad</h2>       
<h5>Listado de totales pertenecientes a usted</h5>    
 <table class="table table-striped">
    <thead>
      <tr>
        <th>Tipo</th>
        <th>Cantidad</th>
        
    </tr>
    </thead>
    <tr>
    <td>Hogares</td>
    <?php $total1=0; while($row1 = mysqli_fetch_array($resultado1)){$total1=$total1+$row1['cantidad'];} ?>
    <td><?php echo $total1  ?></td> 
    </tr>

    <tr>
    <td>Negocio</td>
    <?php $total2=0; while($row2 = mysqli_fetch_array($resultado2)){$total2=$total2+$row2['cantidad'];} ?>
    <td><?php echo $total2  ?></td> 
    </tr>

    <tr>
    <td>Tarjeta</td>
    <?php $total5=0; while($row5 = mysqli_fetch_array($resultado5)){$total5=$total5+$row5['cantidad'];} ?>
    <td><?php echo $total5  ?></td> 
    </tr>


    <tr>
    <td>Ventas</td>
    <?php $total4=0; while($row4 = mysqli_fetch_array($resultado4)){$total4=$total4+$row4['total_venta'];} ?>
    <td><?php echo $total4  ?></td> 
    </tr>

    <tr>
    <td>Recargas:</td>
    <?php $total3=0; while($row3 = mysqli_fetch_array($resultado3)){$total3=$total3+$row3['cantidad'];}
    $totalr=0; while($rowr = mysqli_fetch_array($rrecargas)){$totalr=$totalr+$rowr['cantidad'];} ?>
    
    <td><?php echo $total3;  ?></td> 
    </tr>



    
      <tr>
        <th>
        <h2 style="color:#9C2C2E">Total Registrado: $<?php echo $total1+$total2+$total3+$total4+$total5;?> </h2>
        <h2>Total en recargas normales: <?php echo $totalr;?></h2>
        <i style="color:#CB2629">Nota: Los ingresos registrados se encuentran dentro de la contabilidad por lo que ya no hay que registrarlos, El total de las recargas normales tiene que coincidir con el total de la misma en la plataforma.</i></th>  
        <th><a href="consultaingresonegocio-vista.php"  class="btn btn-danger"> Verificar Ingresos</a><a href="informe-venta.php"  class="btn btn-warning"> Verificar Ventas </a></th>
    
     </tr>

  </table>
 
<div class= col-md-8> 



<!--Formulario-->
<div class="card card-body -8">

        <form action="contabilidadd.php" method="post">
            
        <h2>Ingresos</h2>

        <br><h3>Negocio</h3>

        <div class="form-group">
        <input type="number" name="cantidadn" class="form-control" placeholder="Cantidad" autofocus>
        </div>

        <i style="color:#CB2629">Nota: Tener pendiente los datos ingresados, debido a que no se pueden editar y despues de guardados no se puede volver a guardar.</i>  
       

<!--Ventana emergente-->           
<div class="modal fade" id="ven">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contabilidad</h5>
                </button>
            </div>

            <div class="modal-body">
            <p>¿Está seguro que los datos están correctos?</p>
                
            </div>
            <div class="modal-footer">
            <input type="submit" class="btn btn-primary" name="save" value="Enviar">
  
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retificar</button>
            </div>
        </div>
    </div>
</div>  




        </div>
        </form>
<!--Sql para validar si ya se ha guardado la contabilidad-->
<?php 

$queryconsultacontabilidadd = "SELECT * FROM ingreso where (((fecha_ingreso BETWEEN '$fecha1' and '$fecha2') and detalle = 'Ingresos diarios')and tipo_ingreso = 'negocio') ORDER BY id_ingreso asc ";
$Rcontabilidad = mysqli_query($conn,$queryconsultacontabilidadd);
$id_contabilidadd="0";

while($rowciv =mysqli_fetch_array($Rcontabilidad)){$id_contabilidadd= $rowciv['id_ingreso'];}
if($id_contabilidadd=="0"){
?>
    <br><br><a href="#ven" class="btn btn-success btn-block" data-toggle="modal">Guardar</a>
<?php }
else {
    echo "Nota: Los ingresos ya se encuentran registrados, por lo que no puede volver a guardarlos, en caso de aver un ingreso extra por favor ponerlo como ingresos X, y especificar en el detalle.";
   
}


?>


    

<?php include ("frontend/footer.php");

?>