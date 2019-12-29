
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
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                     
                    </ul>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                     
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
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
            <a class="navbar-brand d-none d-sm-inline "href="principal-vista.php">Jormat System</a>
            <a class="navbar-brand d-none d-sm-inline"href="factura-vista.php"><i class="fa fa-shopping-bag fa-1x"></i> Vender</a>
            <a class="navbar-brand d-none d-sm-inline"href="ingreso-vista.php"><i class="fa fa-plus-circle fa-1x"></i> Ingreso</a>

            </div>
            <!--Nombre del usuario-->
            <h3 class="navbar-brand ml-auto"><?php echo $_SESSION['nombre']?></h3>
            
            <!--Opciones Usuario-->
            <div class="menubar d-flex " id="action-menu-1-menubar" role="menubar">
            
            <div class="action-menu-trigger">
                    <div class="dropdown">
                        <a href="#" tabindex="0" data-toggle="dropdown" role="button" class="navbar-brand">
                        <i class="fa fa-cog fa-2x"></i>
                        
                        </a>
                            <div class="dropdown-menu dropdown-menu-right menu  align-tr-br" id="action-menu-1-menu" data-rel="menu-content" aria-labelledby="action-menu-toggle-1" role="menu" data-align="tr-br" id="dropdown-menu-1">
                                        <a href="https://itla.edu.do/virtual/cv/my/" class="dropdown-item menu-action" role="menuitem" data-title="mymoodle,admin" aria-labelledby="actionmenuaction-1">
                                                <i class="icon fa fa-tachometer fa-fw " aria-hidden="true"  ></i>
                                            <span class="menu-action-text" id="actionmenuaction-1">
                                                Dashboard
                                            </span>
                                        </a>
                                        <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                                        <a href="https://itla.edu.do/virtual/cv/user/profile.php?id=1699" class="dropdown-item menu-action" role="menuitem" data-title="profile,moodle" aria-labelledby="actionmenuaction-2">
                                                <i class="icon fa fa-user fa-fw " aria-hidden="true"  ></i>
                                            <span class="menu-action-text" id="actionmenuaction-2">
                                                Profile
                                            </span>
                                        </a>
                                        <a href="https://itla.edu.do/virtual/cv/grade/report/overview/index.php" class="dropdown-item menu-action" role="menuitem" data-title="grades,grades" aria-labelledby="actionmenuaction-3">
                                                <i class="icon fa fa-table fa-fw " aria-hidden="true"  ></i>
                                            <span class="menu-action-text" id="actionmenuaction-3">
                                                Grades
                                            </span>
                                        </a>
                                        <a href="https://itla.edu.do/virtual/cv/message/index.php" class="dropdown-item menu-action" role="menuitem" data-title="messages,message" aria-labelledby="actionmenuaction-4">
                                                <i class="icon fa fa-comment fa-fw " aria-hidden="true"  ></i>
                                            <span class="menu-action-text" id="actionmenuaction-4">
                                                Messages
                                            </span>
                                        </a>
                                        <a href="https://itla.edu.do/virtual/cv/user/preferences.php" class="dropdown-item menu-action" role="menuitem" data-title="preferences,moodle" aria-labelledby="actionmenuaction-5">
                                                <i class="icon fa fa-wrench fa-fw " aria-hidden="true"  ></i>
                                            <span class="menu-action-text" id="actionmenuaction-5">
                                                Preferences
                                            </span>
                                        </a>
                                        <div class="dropdown-divider" role="presentation"><span class="filler">&nbsp;</span></div>
                                        <a href="https://itla.edu.do/virtual/cv/login/logout.php?sesskey=5x2zoRPNbS" class="dropdown-item menu-action" role="menuitem" data-title="logout,moodle" aria-labelledby="actionmenuaction-6">
                                                <i class="icon fa fa-sign-out fa-fw " aria-hidden="true"  ></i>
                                            <span class="menu-action-text" id="actionmenuaction-6">
                                                Log out
                                            </span>
                                        </a>
                            </div>
                    </div>
                </div>
                </div>

           


       
     
        </nav>

       
       

  
 


   