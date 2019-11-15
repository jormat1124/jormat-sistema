
 <?php include ("conexion.php");?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Boostrap 4-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
    <!--Scrips para booostrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--Script para que funcionen los data time-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />


    <link rel="stylesheet" href="icon/style.css">
    <!--brackground-->
    <style type="text/css">
    body{
    background-image: url("image/FondoInicio.png");
    background-position: center;
    background-attachment: fixed;
    background-size: cover;
}
    </style>
<link rel="stylesheet" href="icon/style.css">

</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light ">
<div class="container">
<a href="principal-vista.php" class="navbar-brand "><h3><img src="image/system.png" width="52" height="50" class="d-inline-block align-center"  border-radius="25px"alt="">  Jormat System </h3><h6>Versión: 0000001</h6></a>
<?php  if(!isset($_SESSION['rol'])) {header('location: login.php');}?>
<h3 class="navbar-brand ml-auto">Bienvenido(a)  <?php echo $_SESSION['nombre']?></h3>  
<?php ini_set('date.timezone','America/Santo_Domingo'); $hora = date("H",time()); 
?>

<!--  Redicciones meju principal -->

<a href="#ventana0" class="navbar-brand" data-toggle="modal"><img src="image/usuario.png" width="50" height="50" class="d-inline-block align-top"  border-radius="25px" alt=""> </a>
<a href="#ventana1" class="navbar-brand" data-toggle="modal"><img src="image/reparar.png" width="50" height="50" class="d-inline-block align-top "border-radius=25px alt=""></a>

<?php if($hora < 12){ ?><a href="#ventana2" class="navbar-brand" data-toggle="modal"><img src="image/apagado.png" width="50" height="50" class="d-inline-block align-top "border-radius=25px alt=""></a>
<?php } if($hora >=12 & $hora <=15){ ?><a href="#ventana3" class="navbar-brand" data-toggle="modal"><img src="image/apagado.png" width="50" height="50" class="d-inline-block align-top "border-radius=25px alt=""></a>
<?php }if($hora >=16 & $hora <=23){?><a href="#ventana4" class="navbar-brand" data-toggle="modal"><img src="image/apagado.png" width="50" height="50" class="d-inline-block align-top "border-radius=25px alt=""></a>
<?php } ?>
  
<!-- Ventanas emergentes -->

<div class="modal fade" id="ventana0">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Notificación <label class="lnr lnr-warning"></label></h5>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea ver su avance de Efectivo?</p>
                
            </div>
            <div class="modal-footer">
                <a href="consultaavance-vista.php" type="button" class="btn btn-primary">Aceptar</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retroceder</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ventana1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Ajustes <label class="lnr lnr-warning"></label></h5>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea Cambiar su conceña?</p>
                <p>Nota: Ponga una contraceña facil de recordar, porque solo usted puede cambiarla.</p>  
            </div>
            <div class="modal-footer">
                <a href="cambiarc-vista.php" type="button" class="btn btn-primary">Aceptar</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retroceder</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ventana2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notificación</h5>
                </button>
            </div>

            <div class="modal-body">
                <p>Su break es a partir de las 12:00PM</p> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retroceder</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ventana3">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Cerrar seción <label class="lnr lnr-warning"></label></h5>
                </button>
            </div>
            <div class="modal-body">
                <p>Esperamos que disfrute su break.</p>
                <p>Lo esperamos a las 3:00pm.</p>  
            </div>
            <div class="modal-footer">
                <a href="break.php" type="button" class="btn btn-primary">Aceptar</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retroceder</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ventana4">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cerrar seción <label class="lnr lnr-warning"></label></h5>
                </button>
            </div>
            <div class="modal-body">
                <p></p>
                <p>¿Esta seguro que desea terminar su Jornada Laboral?</p>  
            </div>
            <div class="modal-footer">
                <a href="contabilidadd-vista.php" type="button" class="btn btn-primary">Aceptar</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retroceder</button>
            </div>
        </div>
    </div>
</div>
</div>
</nav>

<!-- Segundo menu-->

<nav class="navbar navbar-expand-md navbar-dark bg-dark " >
<div class="container">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"><span class="navbar-toggler-icon"></span></button>
     <div class="collapse navbar-collapse" id=navbarSupportedContent>
      <ul class="navbar-nav">
        <li class="nav-item- active"> <a class=" nav-link"href="principal-vista.php">Inicio</a></li>
          <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
          <li class="nav-item- active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Users</a>
                <div class="dropdown-menu" aria-labellendby="navbarDropdown">
                    <a class="dropdown-item" href="alogin-vista.php">Login</a>
                    <a class="dropdown-item" href="asocio-vista.php" >Socio</a>
     
          </li>
          <li class="nav-item- active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Hogares</a>
                <div class="dropdown-menu" aria-labellendby="navbarDropdown">
                    <a class="dropdown-item" href="pendiente-vista.php" >Activos</a>
                    <a class="dropdown-item" href="pendiente-vista.php" >Añadir</a>
                    <a class="dropdown-item" href="pendiente-vista.php" >Modificar</a>
                    <a class="dropdown-item" href="pendiente-vista.php" >Reclamos</a>
                    <a class="dropdown-item" href="pendiente-vista.php" >Instalaciones P</a>
                    <a class="dropdown-item" href="pendiente-vista.php" >Lista Negra</a>
          </li>

          <?php break;}}?>

         

          <li class="nav-item- active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Ventas</a>
                <div class="dropdown-menu" aria-labellendby="navbarDropdown">
                    <a class="dropdown-item" href="factura-vista.php" >Factural</a>
                    <a class="dropdown-item" href="articulo-vista.php" >Articulos</a>
                    <a class="dropdown-item" href="pendiente-vista.php" >Averiados</a>
                    <a class="dropdown-item" href="informe-venta.php" >Informe de Ventas</a>

                   
          </li>

          <li class="nav-item- active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Negocio</a>
                <div class="dropdown-menu" aria-labellendby="navbarDropdown">
                    <a class="dropdown-item" href="ingreso-vista.php" >Ingreso X</a>
                    <a class="dropdown-item" href="aefectivo-vista.php" >Avance Efectivo</a>
                    <a class="dropdown-item" href="gastonegocio-vista.php" >Gasto Negocio</a>
                    <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
                    <a class="dropdown-item" href="inversion-vista.php" >Realizar Inversión</a>
                    <?php break;}}?>
                    
                    <a class="dropdown-item" href="reclamo-vista.php" >Propuestas & Reclamos</a>

           <li class="nav-item- active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Consultar</a>
                <div class="dropdown-menu" aria-labellendby="navbarDropdown"> 
                    <a class="dropdown-item" href="ingresonegocio-vista.php" >Ingresos X</a>
                    <a class="dropdown-item" href="consultagastonegocio-vista.php" >Gastos negocio</a>
                    <a class="dropdown-item" href="consultareclamo-vista.php" >Propuestas & Reclamos</a>
                    <a class="dropdown-item" href="consultainversion-vista.php" >Presupuesto Inversion</a> 
                    <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
                    <a class="dropdown-item" href="consultapa-vista.php" >Consulta General</a>
                    <?php break;}}?>         
           
          </li> 
          <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
            <li class="nav-item- active"><a class=" nav-link"href="socio-vista.php">Socios</a></li>
         <?php break;}}?>
         
         <li class="nav-item- active"><a class=" nav-link"href="contactos-vista.php">Contactos</a></li>
         <li class="nav-item- active"><a class=" nav-link"href="informacion-vista.php">Informacion</a></li>
          </li>

  
      </ul>
  </div>
</div>
</nav>


 


   