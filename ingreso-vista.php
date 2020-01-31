<?php include("frontend/header.php"); 

if(!isset($_SESSION['rol'])) {header('location: login.php');}
?>

<div class="container p-5">
<div class= col-md-8> 

    
    <?php if(isset($_SESSION['message'])) { 
        if(($_SESSION['message']) != ($_SESSION['message_type'])){?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php }} $_SESSION['message_type']=''; $_SESSION['message']=''; ?>

<div class="card card-body -8">

        <form action="ingreso.php" method="post">
            
        <h1>Ingreso de efectivo</h1>

        <br><h3>Tipo de ingreso*</h3>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="hogar"name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline1">Hogares</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="juego" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Juego</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="otros" name="inlineMaterialRadiosExample">
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
            
            <i>Nota: "Por favor verifique el tipo de ingreso y en caso de que sea Juego u Otros, solo poner la ganancia del mismo y espeficar en detalles".</i>  
            <br><br><input type="submit" class="btn btn-success btn-block" name="save" value="Añadir Ingreso"  >

         
        
    </form>
    </div>
</div>
</div>
<?php include ("frontend/footer.php")?>
