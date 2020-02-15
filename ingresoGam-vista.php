<?php include("frontend/header.php"); 

if(!isset($_SESSION['rol'])) {header('location: login.php');}
?>

<div class="container p-5">
<div class= col-md-8> 
<div class="card card-body -8">

        <form action="ingreso.php" method="post">
            
        <h1><i class="fa fa-gamepad" aria-hidden="true"></i> Ingreso de Games</h1>
        <p>Por favor especique en el detalle a que juego pertenece, debido a que los juegos tienen su modulo.</p>

        <div class="form-group">
        <label for="exampleInputEmail1">Ganancia</label>
        <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Tarjeta</label>
        <input type="number" name="tarjeta" class="form-control" placeholder="Invertido" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Detalle</label>
        <input type="text" name="detalle" class="form-control" placeholder="Detalle" autofocus>
        </div>
            
            <i>Nota: "Por favor verifique los datos".</i>  
            <br><br><input type="submit" class="btn btn-success btn-block" name="save" value="Añadir Ingreso"  >

         
        
    </form>
    </div>
</div>
</div>
<?php include ("frontend/footer.php")?>