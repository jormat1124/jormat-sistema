
 <?php include ("conexion.php");?>
 <?php  if(!isset($_SESSION['rol'])) {header('location: login.php');}?>

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

<!--Script y stilos para el sidebar-->

<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="css/style.css">

    <!--brackground-->
    <style type="text/css">
    body{
    background-image: url("image/FondoInicio.png");
    background-position: center;
    background-attachment: fixed;
    background-size: cover;
}
    </style>


</head>
<body>
 <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
    
            <ul class="list-unstyled CTAs">
                <br><br><br>


                <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
                <li class="active">
                    <a href="#muser" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user-circle" aria-hidden="true"></i> User</a>
                    <ul class="collapse list-unstyled" id="muser">
                
                        <li><a href="alogin-vista.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Login</a></li>
                        <li><a  href="asocio-vista.php"><i class="fa fa-address-book" aria-hidden="true"></i> Socio</a></li>                      
                        
                    </ul>
                </li>            

                <?php break;}}?>

                <li class="active">
                    <a href="#mventas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-shopping-cart " aria-hidden="true"></i> Ventas</a>
                    <ul class="collapse list-unstyled" id="mventas">

                    <li>
                    <a href="factura-vista.php"><i class="fa fa-shopping-bag"></i> Vender</a>
                    <a  href="articulo-vista.php" > <i class="fa fa-plus-circle" aria-hidden="true"></i> Articulos</a>
                    </li>
                    
                    </ul>
                
</li>

                <li class="active">
                    <a href="#mnegocio" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-building" aria-hidden="true"></i> Negocio</a>
                    <ul class="collapse list-unstyled" id="mnegocio">
                    <li><a href="ingresoN-vista.php"><i class="fa fa-plus-circle"></i> Ingreso</a></li>
                        <li><a href="gastonegocio-vista.php" ><i class="fa fa-plus-circle" aria-hidden="true"></i> New Gasto Negocio</a></li>
                        <li><a href="descuento.php" ><i class="fa fa-minus-circle" aria-hidden="true"></i> Descuento Socio</a></li>
                       
                        <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
                        <li class="nav-item- active"> <a  href="inversion-vista.php" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Inversion General</a></li>
                        <li class="nav-item- active"><a class=" nav-link"href="socio-vista.php"><i class="fa fa-university" aria-hidden="true"></i> Recompensa </a></li>
                        <?php break;}}?>
                        
                    </ul>
                </li>
                <li class="active">
                    <a href="#mhogares" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-home" aria-hidden="true"></i> Hogares</a>
                    <ul class="collapse list-unstyled" id="mhogares">
                        <li>
                            <a href="#">En proceso</a>
                        </li>
                     
                    </ul>
                </li>
                <li class="active">
                    <a href="#minformes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-chart-bar"></i> Informes</a>
                    <ul class="collapse list-unstyled" id="minformes">

                        
                        <li>
                        <a  href="informe-venta.php" ><i class="fa fa-shopping-cart " aria-hidden="true"></i> Informe de Ventas</a>
                        </li>
                        <li>
                        <a href="consultaingresonegocio-vista.php"><i class="fa fa-rocket" aria-hidden="true"></i> Ingresos Diario</a>
                        </li>
                        <li>
                        <a  href="consultagastonegocio-vista.php" ><i class="fa fa-building" aria-hidden="true"></i> Gastos Negocio</a>
                        </li>
                        <li>
                        <a  href="consultadescuentos.php" ><i class="fa fa-spinner" aria-hidden="true"></i> Avances Socios</a>
                        </li>
                        <li>
                        <a  href="informe-contabilidadd.php" ><i class="fa fa-balance-scale" aria-hidden="true"></i> Como Voy?</a>
                        </li>

                       
                        <?php  if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1:?>
                        <li><a href="consultainversion-vista.php" ><i class="fa fa-chart-bar"></i> Fondo para Inversion</a></li>
                        <li><a  href="consultapa-vista.php" ><i class="fa fa-object-group" aria-hidden="true"></i> Contabilidad General</a></li>
                        <?php break;}}?>
                        </ul>
                </li>
                <li class="nav-item- active"><a class=" nav-link"href="contactos-vista.php"><i class="fa fa-address-book" aria-hidden="true"></i> Contactos</a></li>
         <li class="nav-item- active"><a class=" nav-link"href="informacion-vista.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Informacion</a></li>
            </ul>
            
           
        </nav>

        <!-- Page Content  -->
        <div id="content">
        
        <nav class="fixed-top navbar navbar-inverse   navbar-dark bg-dark">
        
            <div data-region="drawer-toggle" class="d-inline-block mr-3">
            <!--Boton del sidebar-->
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                    
                    <i class="icon fa fa-bars fa-fw "></i>
                    
            </button>
             <!--Opciones vasicas--> 
            <a class="navbar-brand d-none d-sm-inline "href="principal-vista.php"> Jormat System</a>
            <a class="navbar-brand d-none d-sm-inline"href="factura-vista.php"><i class="fa fa-shopping-bag fa-1x"></i> Vender</a>
            <a class="navbar-brand d-none d-sm-inline"href="ingresoN-vista.php"><i class="fa fa-plus-circle fa-1x"></i> Ingreso</a>

            </div>
            <!--Nombre del usuario-->
            <h3 class="navbar-brand ml-auto"><?php echo $_SESSION['nombre']?></h3>
            
            <!--Opciones Usuario-->
            <div class="menubar d-flex " id="action-menu-1-menubar" role="menubar">
            
            <div class="action-menu-trigger">
                    <div class="dropdown">
                        <a href="#" tabindex="0" data-toggle="dropdown" role="button" class="navbar-brand"><i class="fa fa-users-cog fa-2x"></i></a>
                            
                        <!--Menu de opciones para los usuarios--->
                        <div class="dropdown-menu dropdown-menu-right menu  align-tr-br" id="action-menu-1-menu" data-rel="menu-content" aria-labelledby="action-menu-toggle-1" role="menu" data-align="tr-br" id="dropdown-menu-1">
                            
                        
                        <a class="dropdown-item" href="aefectivo-vista.php" >
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Avance Efectivo
                        </a>

                        <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                         
                        <a class="dropdown-item" href="reclamo-vista.php" >
                        <i class="fa fa-plus-circle" aria-hidden="true"></i> New Propuesta
                        </a>
                                     
                         <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                            
                         <a class="dropdown-item" href="consultaavance-vista.php" >
                         <i class="fa fa-chart-bar"></i> Mostrar Avances
                        </a>
                        
                        <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                        
                        <a class="dropdown-item" href="#ventana1" data-toggle="modal" >
                         <i class="fa fa-lock-open"></i> Cambiar Contraceña
                        </a>

                        <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                        <!--Para actualizar la hora actual--> 
                        <?php ini_set('date.timezone','America/Santo_Domingo'); $hora = date("H",time()); ?>
                        <!--Opciones de break y salir con horario estatico--> 
                        
                    
                        <?php  if($hora >=12 & $hora <=15){ ?><a href="#ventana3" class="dropdown-item" data-toggle="modal"><i class="fas fa-coffee"></i> Receso</a>
                        <?php }if($hora >=16 & $hora <=23){?>
                        
                        <a class="dropdown-item" href="contabilidadd-vista.php">
                        <i class="fa  fa-university"></i> Cuadre Diario
                        </a>
                        <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                        
                        <a href="#ventana4" class="dropdown-item" data-toggle="modal"><i class="fas fa-times "></i> Close</a>
                        <?php } ?>

                        
                    </div>
            </div>
            
<!--Ventanas Emergentes-->     


     
        </nav>
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
                <p>En caso de que sea positivo pase feliz resto del día</p>
            </div>
            <div class="modal-footer">
                <a href="close.php" type="button" class="btn btn-primary">Aceptar</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Retroceder</button>
            </div>
        </div>
    </div>
</div>
<br><br>

  
 


   