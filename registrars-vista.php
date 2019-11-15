<?php include ("frontend/header.php");
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
    <?php }}$_SESSION['message_type']=''; $_SESSION['message']=''; ?>


<div class="card card-body -8">

        <form action="registrars.php" method="post">
            
        <h1>Añadir Socio(a)</h1>
        <div class="form-group">
        <label for="exampleInputEmail1">Cedula</label>
        <input type="text" name="cedula" class="form-control" placeholder="Cedula" autofocus>
        </div>


        <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Apellido</label>
        <input type="text" name="apellido" class="form-control" placeholder="Apellido" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Edad</label>
        <input type="text" name="edad" class="form-control" placeholder="Edad" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Sexo</label>
        <input type="sexo" name="sexo" class="form-control" placeholder="Sexo" autofocus>
        </div>

                <div class="form-group">
        <label for="exampleInputEmail1">Teléfono</label>
        <input type="text" name="telefono" class="form-control" placeholder="Telefono" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Familiar</label>
        <input type="text" name="familiar" class="form-control" placeholder="Familiar" autofocus>
        </div>    

        <div class="form-group">
        <label for="exampleInputEmail1">Telefono Familiar</label>
        <input type="text" name="telefonof" class="form-control" placeholder="Telefono Familiar" autofocus>
        </div>   

            <input type="submit" class="btn btn-success btn-block" name="save" value="Registrarse"  >

           
        
    </form>
    </div>
</div>
</div>
 
<?php ;break;}}include ("frontend/footer.php")?>