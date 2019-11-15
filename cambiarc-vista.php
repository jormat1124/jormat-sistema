<?php include ("frontend/header.php");?>
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

        <form action="cambiarc.php" method="post">
            
        <h1>Cambio de contraceña </h1>
        <p>Señor por seguridad poner datos sencillos y faciles de recordar porque solo usted puede verla</p>
        
        <div class="form-group">
        <label for="exampleInputEmail1">Contraceña Anterior</label>
        <input type="password" name="clavea" class="form-control" placeholder="Contraceña" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Contraceña</label>
        <input type="password" name="clave" class="form-control" placeholder="Contraceña" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Repita la Contraceña</label>
        <input type="password" name="clave2" class="form-control" placeholder="Confirmar contraseña" autofocus>
        </div>

            <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar Cambios"  >

    </form>
    </div>
</div>
</div>
 
<?php include ("frontend/footer.php")?>