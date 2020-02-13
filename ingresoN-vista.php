<?php include("frontend/header.php"); 

if(!isset($_SESSION['rol'])) {header('location: login.php');}
?>

<div class="container p-5">
<div class= col-md-8> 
<div class="card card-body -8">

        <form action="ingreso.php" method="post">
            
        <h1><i class="fa fa-plus-circle" aria-hidden="true"></i> Ingreso de efectivo</h1>

        <br><h3>Tipo de ingreso*</h3>
        <i>"Tenga pendiente que la recarga no pertenece a juegos"</i>
        <p></p>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="hogar"name="inlineMaterialRadiosExample" checked>
        <label class="form-check-label" for="materialInline1">Hogares</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="recarga"name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline1">Recarga/Tarjeta</label>
        </div>
        
        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="negocio" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Otros</label>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Cantidad</label>
        <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Detalle</label>
        <input type="text" name="detalle" class="form-control" placeholder="Detalle" autofocus>
        </div>
            
            <i>Nota: "Por favor verifique el tipo de ingreso y espeficar en detalles".</i>  
            <br><br><input type="submit" class="btn btn-success btn-block" name="save" value="Añadir Ingreso"  >

         

         
        
    </form>
    </div>
</div>
</div>
<?php include ("frontend/footer.php")?>
