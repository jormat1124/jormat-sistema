<?php include("frontend/header.php");
if(!isset($_SESSION['rol'])) {header('location: login.php');}?>

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

        <form action="reclamo.php" method="post">
            
        <h1>Propuestas & Reclamos</h1>

        <br><h3>Tipo*</h3>

<div class="form-group form-check-inline">
<input type="radio" class="form-check-input" value="Negocio"name="tipoc">
<label class="form-check-label" for="materialInline1">Negocio</label>
</div>

<div class="form-group form-check-inline">
<input type="radio" class="form-check-input" value="Red" name="tipoc">
<label class="form-check-label" for="materialInline3">Red</label>
</div>

<div class="form-group form-check-inline">
<input type="radio" class="form-check-input" value="Software" name="tipoc">
<label class="form-check-label" for="materialInline3">Software</label>
</div>



        <h3>Detalle*</h3>
        <div class="form-group">
        <input type="text" name="detalle" class="form-control" placeholder="Detalle" autofocus>
        </div>
            
            <i>Nota: "Gracias por prestar su opinón".</i>  
            <br><br><input type="submit" class="btn btn-success btn-block" name="save" value="Guardar"  > 
    </form>
    </div>
</div>
</div>
<?php include ("frontend/footer.php")?>
