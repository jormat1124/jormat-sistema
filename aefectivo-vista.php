<?php include("frontend/header.php"); ?>

<?php  if(!isset($_SESSION['rol'])) {header('location: login.php');}?>

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

        <form action="aefectivo.php" method="post">
            
        <h1>Avance Efectivo</h1>

        <br><h3>Cantidad*</h3>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="5"name="cantidadc">
        <label class="form-check-label" for="materialInline1">5 Pesos</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="10" name="cantidadc">
        <label class="form-check-label" for="materialInline3">10 Pesos</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="15" name="cantidadc">
        <label class="form-check-label" for="materialInline3">15 Pesos</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="20" name="cantidadc">
        <label class="form-check-label" for="materialInline3">20 Pesos</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="25" name="cantidadc">
        <label class="form-check-label" for="materialInline3">25 Pesos</label>
        </div>

        <div class="form-group">
        <input type="text" name="cantidad" class="form-control" placeholder="Otra cantidad" autofocus>
        </div>

        <br><h3>Detalle*</h3>
        
        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="Agua"name="detallec">
        <label class="form-check-label" for="materialInline1">Agua</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="Jugo"name="detallec">
        <label class="form-check-label" for="materialInline1">Jugo</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="chulo"name="detallec">
        <label class="form-check-label" for="materialInline1">Chulo</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="Galletica"name="detallec">
        <label class="form-check-label" for="materialInline1">Galletica</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="tostada"name="detallec">
        <label class="form-check-label" for="materialInline1">Tostada</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="Chito"name="detallec">
        <label class="form-check-label" for="materialInline1">Chito</label>
        </div>


        <div class="form-group">
        <input type="text" name="detalle" class="form-control" placeholder="Otro detalle" autofocus>
        </div>
            
            <i>Nota: "Por favor verifique la cantidad".</i>  
            <br><br><input type="submit" class="btn btn-success btn-block" name="save" value="Añadir avance de efectivo"  >

         
        
    </form>
    </div>
</div>
</div>
<?php include ("frontend/footer.php")?>
