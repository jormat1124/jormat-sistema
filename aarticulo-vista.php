<?php include("frontend/header.php"); 
if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 
?>

<div class="container p-5">
<div class= col-md-8> 
<div class="card card-body -8">

        <form action="aarticulo.php" method="post">
        <h1>Nuevo Articulo</h1>
        <p>Por favor ingrese los articulos con cuidado debido a que no se pueden eliminar</p>
            
        
       <br>
        <div class="form-group">
        <label for="exampleInputEmail1">Articulo</label>
        <input type="text" name="articulo" class="form-control" placeholder="Articulo" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Detalle</label>
        <input type="text" name="detalle" class="form-control" placeholder="Detalle" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">P.Venta</label>
        <input type="number" name="venta" class="form-control" placeholder="Venta" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">P.Medio</label>
        <input type="number" name="medio" class="form-control" placeholder="Minimo" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">P.Minimo</label>
        <input type="number" name="minimo" class="form-control" placeholder="Minimo" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">P.Compra</label>
        <input type="number" name="compra" class="form-control" placeholder="Compra" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Existencia</label>
        <input type="number" name="existencia" class="form-control" placeholder="Existencia" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Proveedor</label>
        <input type="text" name="proveedor" class="form-control" placeholder="Proveedor" autofocus>
        </div>

         <br><br><input type="submit" class="btn btn-primary btn-block" name="save" value="Guardar"  >

         
        
    </form>
    </div>
</div>
</div>
<?php ;break;}} include ("frontend/footer.php")?>