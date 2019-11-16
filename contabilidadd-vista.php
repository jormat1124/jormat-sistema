
<?php include("frontend/header.php");
 if(!isset($_SESSION['rol'])) {header('location: login.php');}
 ini_set('date.timezone','America/Santo_Domingo');
$horal = date("H",time());

$horal = 22;

if($horal >16 & $horal <24){

$nombre = $_SESSION['nombre'];

 $dia = date("d",time());
 $mes = date("m-",time());
 $ano = date("Y-",time());
 $hora = " 23:55:00";
 $hora1 = " 05:00:00";
 $fecha1 = $ano.($mes).($dia).$hora1;
 $fecha2 = $ano.($mes).$dia.$hora;


 
$query1 = "SELECT * FROM ingreso where (socio = '$nombre' and tipo_ingreso = 'hogar') and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$resultado1 = mysqli_query($conn,$query1);

$query2 = "SELECT * FROM ingreso where (socio = '$nombre' and tipo_ingreso = 'negocio') and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$resultado2 = mysqli_query($conn,$query2);

$query3 = "SELECT * FROM ingreso where (tipo_ingreso = 'recarga') and fecha_ingreso BETWEEN '$fecha1' and '$fecha2'";
$resultado3 = mysqli_query($conn,$query3);

$query4 = "SELECT * FROM factura where (socio = '$nombre') and fecha_venta BETWEEN '$fecha1' and '$fecha2'";
$resultado4 = mysqli_query($conn,$query4);

?>
<div class="container">
<br>

<div class="card card-body ">
<div class="container">
<h2>Contabilidad</h2>           
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
    <td>Ventas</td>
    <?php $total4=0; while($row4 = mysqli_fetch_array($resultado4)){$total4=$total4+$row4['total_venta'];} ?>
    <?php $total3=0; while($row3 = mysqli_fetch_array($resultado3)){$total3=$total3+$row3['cantidad'];} ?>
    <td><?php echo $total4  ?></td> 
    </tr>

      <tr>
        <th><h2 style="color:#9C2C2E">Ingresos X: $<?php echo $total1+$total2;?> </h2><h2 style="color:#9C2C2E">Ventas: $<?php echo $total4;?> </h2><h2 style="color:#9C2C2E">Recargas: $<?php echo $total3;?> </h2><br><i style="color:#CB2629">Nota: Los Ingresos X y las ventas se encuentran dentro de la contabilidad, por lo cual hay que ponerlo aparte.</i></th>  
        <th><a href="ingresonegocio-vista.php"  class="btn btn-danger"> Verificar Ingresos</a><a href="informe-venta.php"  class="btn btn-warning"> Verificar Ventas </a></th>
    
     </tr>

  </table>
 
<div class= col-md-8> 

    <?php if(isset($_SESSION['message'])) { 
        if(($_SESSION['message']) != ($_SESSION['message_type'])){
        if($_SESSION['message_type']=='success'){?><a href="index.php" class="btn btn-danger btn-lg btn-block">Cerrar Software </a><?php }?>
          
        <br>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
    <?php }} ?>

    <?php if(isset($_SESSION['message2'])) { 
        if(($_SESSION['message2']) != ($_SESSION['message_type2'])){?>
        
        <div class="alert alert-<?= $_SESSION['message_type2'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message2'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        
    <?php }} $_SESSION['message_type2']=''; $_SESSION['message2']=''; ?>

<div class="card card-body -8">

        <form action="contabilidadd.php" method="post">
            
        <h2>Ingresos</h2>

        <br><h3>Negocio</h3>

        <div class="form-group">
        <input type="text" name="cantidadn" class="form-control" placeholder="Cantidad" autofocus>
        </div>

        <br><h3>Recargas</h3>

        <div class="form-group">
        <input type="text" name="cantidadr" class="form-control" placeholder="Cantidad" autofocus>
        </div>

            <i style="color:#CB2629">Nota: Tener pendiente los datos ingresados, debido a que no se pueden editar.</i>  
            <br><br><a href="#ven" class="btn btn-success btn-block" data-toggle="modal">Guardar</a>
            
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
    </form>
    </div>
</div>
</div>
</div>
</div>

<?php 


if(isset($_SESSION['message'])) { 
    if(($_SESSION['message']) != ($_SESSION['message_type'])){
    if($_SESSION['message_type']=='success'){   session_destroy();
        $_SESSION = array();
     



    }} $_SESSION['message_type']=''; $_SESSION['message']='';}




}
include ("frontend/footer.php");

?>