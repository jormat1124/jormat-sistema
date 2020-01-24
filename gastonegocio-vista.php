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

        <form action="gastonegocio.php" method="post">
            
        <h1>Gastos Negocio</h1>

        <br><h3>Cantidad*</h3>
<!--
        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="25"name="cantidadc">
        <label class="form-check-label" for="materialInline1">25 Pesos</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="50" name="cantidadc">
        <label class="form-check-label" for="materialInline3">50 Pesos</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="100" name="cantidadc">
        <label class="form-check-label" for="materialInline3">100 Pesos</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="150" name="cantidadc">
        <label class="form-check-label" for="materialInline3">150 Pesos</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="200" name="cantidadc">
        <label class="form-check-label" for="materialInline3">200 Pesos</label>
        </div>
-->
        <div class="form-group">
        <input type="text" name="cantidad" class="form-control" placeholder="Cantidad" autofocus>
        </div>

        <br><h3>Detalle*</h3>
<!--        
        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="Galleticas"name="detallec">
        <label class="form-check-label" for="materialInline1">Galleticas</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="Maní"name="detallec">
        <label class="form-check-label" for="materialInline1">Maní</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="Fundas"name="detallec">
        <label class="form-check-label" for="materialInline1">Fundas</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="Aromatizantes"name="detallec">
        <label class="form-check-label" for="materialInline1">Aromatizantes</label>
        </div>

        <div class="form-group form-check-inline">
        <input type="radio" class="form-check-input" value="Mistolin"name="detallec">
        <label class="form-check-label" for="materialInline1">Utencilios</label>
        </div>
-->
        <div class="form-group">
        <input type="text" name="detalle" class="form-control" placeholder="Detalle" autofocus>
        </div>
            
            <i>Nota: "Por favor verifique la cantidad y el detalle".</i>  
            <br><br><input type="submit" class="btn btn-success btn-block" name="save" value="Save Gasto"  >

         
        
    </form>
    </div>
</div>
</div>
<?php include ("frontend/footer.php")?>
