<?php include ("frontend/header.php");
if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 
 ?>

<div class="container p-5">
<div class= col-md-8> 

<div class="card card-body -8">

        <form action="registraru.php" method="post">
            
        <h1>Añadir Usuario</h1>
        <div class="form-group">
        <label for="exampleInputEmail1">Ingrese el usuario</label>
        <input type="text" name="usuario" class="form-control" placeholder="usuario" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Contraceña</label>
        <input type="password" name="clave" class="form-control" placeholder="Contraceña" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Repita la Contraceña</label>
        <input type="password" name="clave2" class="form-control" placeholder="Confirmar contraseña" autofocus>
        </div>


            <input type="submit" class="btn btn-success btn-block" name="save" value="Registrar"  >

           
        
    </form>
    </div>
</div>
</div>
 
<?php ;break;}}include ("frontend/footer.php")?>