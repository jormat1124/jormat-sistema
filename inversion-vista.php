<?php include("frontend/header.php"); 
if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 

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

        <form action="inversion.php" method="post">
            
        <h1>Inversión</h1>
        <i>La inversión es la clave principal de toda perdida o ganancia.</i>

        <br><h3>Tipo de Inversión*</h3>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="inversionnegocio" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Negocio</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="inversionhogar"name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline1">Hogares</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="inversionred" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Red</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="inversionadmin" name="inlineMaterialRadiosExample">
        <label class="form-check-label" for="materialInline3">Administrador</label>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Cantidad</label>
        <input type="text" name="cantidad" class="form-control" placeholder="Cantidad" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Detalle</label>
        <input type="text" name="detalle" class="form-control" placeholder="Detalle" autofocus>
        </div>
            
            <i>Nota: Por favor verifique todos los datos debido a que no se pueden eliminar.</i>  
            <br><br><input type="submit" class="btn btn-success btn-block" name="save" value="Guardar Inversión"  >

         
        
    </form>
    </div>
</div>
</div>
<?php ;break;}} include ("frontend/footer.php")?>
