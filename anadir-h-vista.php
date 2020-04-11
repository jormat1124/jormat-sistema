<?php include("frontend/header.php"); 
if(isset($_SESSION['rol'])) {switch($_SESSION['rol']){case 1: 

//Conexion mikrotik y demas
require("mikrotik/variables.php");
require('mikrotik/apimikrotik.php');
$API = new routeros_api();
$API->debug = false;


?>

<div class="card card-body ">
<div class="card-header">

        <form action="mikrotik/anadir-h-pppoe.php" method="post">
        <h1><i class="fa fa-user-circle" aria-hidden="true"></i> Registro Cliente</h1>
        <p>Favor de percatarse bien de los datos del usuario antes de guardar</p>

        <br> 
        <div class="form-group">
        <label for="exampleInputEmail1">Cedula</label>
        <input type="number" name="cedula" class="form-control" placeholder="Cedula" autofocus>
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
        <label for="exampleInputEmail1">Celular</label>
        <input type="number" name="celular" class="form-control" placeholder="Celular" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Teléfono</label>
        <input type="number" name="telefono" class="form-control" placeholder="Telefono" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Ubicación</label>
        <input type="text" name="ubicacion" class="form-control" placeholder="Ubicacion" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Precio</label>
        <input type="number" name="precio" class="form-control" placeholder="Precio" autofocus>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Plan</label>

        <?php if ($API->connect(IP_MIKROTIK, USER, PASS)) {  ?>
        <select name="plan" id="plan" class="form-control">
                                    <?php 
                                    $API->write("/ppp/profile/getall",true);   
                                    $READ = $API->read(false);
                                    $ARRAY = $API->parse_response($READ);
                                    if(count($ARRAY)>0){   // si hay mas de 1 queue.
                                        for($x=0;$x<count($ARRAY);$x++){
                                            
                                            $plan = $ARRAY[$x]['name'];
                
                                            $datos_planes = '<option value="'.$plan.'">'.$plan.'</option>';
                                            echo $datos_planes;
                                        }
                                        }else{ // si no hay ningun binding
                                            echo "No hay Ningun Plan.";
                                        }
                                    ?>
                                </select>

                                    <?php }else{echo "No esta conectado con el servidor";}?>

         </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Corresponde</label>
        <select class="form-control" name = "corresponde">
        
        <option  value="tendido1" >Tendido-1</option>
        <option value="tendido2" >Tendido-2</option>
        <option value="tendido3" >Tendido-3</option>
        <option value="tendido4" >Tendido-4</option>
        <option value="tendido5" >Tendido-5</option>
        <option value="antena1" >Antena-1</option>
        <option value="antena2" >Antena-2</option>
        <option value="antena3" >Antena-3</option>
        
</select>
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Dia de Corte</label>
        <input type="text" name="dia" class="form-control" placeholder="Dia de Corte" autofocus>
        </div>

            <br><br><input type="submit" class="btn btn-primary btn-block" name="save" value="Guardar"0  >

         
        
    </form>
    </div>
</div>
</div>
<?php ;break;}} include ("frontend/footer.php")?>