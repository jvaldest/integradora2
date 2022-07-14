<?php include('template/header.php');
// La sentencia include() incluye y evalúa el archivo especificado.
?>
<?php

include_once('model/conexion.php');
$sentencia = $bd->query('select * from causas');
$choferes = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($choferes);
$sentenciados = $bd->query('select * from planes');
$planes = $sentenciados->fetchAll(PDO::FETCH_OBJ);
/*
include_once()
La sentencia include_once() incluye y evalúa el fichero especificado durante la ejecución
 del script. Es un comportamiento similar al de la sentencia include(), siendo la única 
 diferencia que si el código del fichero ya ha sido incluido, no se volverá a incluir. 
 Como su nombre lo indica, será incluido sólo una vez. include_once() puede ser usado en casos 
 donde el mismo fichero podría ser incluido y evaluado más de una vez durante una ejecución 
 particular de un script, así que en este caso, puede ayudar a evitar problemas como la redefinición 
 de funciones, reasignación de valores de variables, etc.
*/
?>

<?php
error_reporting(E_ALL); //// Notificar todos los errores de PHP (ver el registro de cambios)
ini_set('ignore_repeated_errors', TRUE); // always use TRUE
ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set("error_log", "php-error.log"); //Donde se van a guardar los errores
error_log("Inicio Proyecto CFT");


?>
<div class="container mt-4">

    <div class="row">

        <div class="col-md-7">
           


              <!-- Inicio Alerta Actualizar -->
              <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editar'){
            ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Éxito</strong> Cliente Actualizado.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   


            <!-- Fin Alerta Error Actualizar -->

                <!-- Inicio Alerta Eliminar -->
                <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Éxito</strong> Clienete Eliminado.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   


            <!-- Fin Alerta Error Eliminar -->
         

        </div>
        <div class="container">

            
            <!-- Inicio Alerta Error Ingresado-->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> El cliente ya existe.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   


            <!-- Fin Alerta Error Ingresado-->
            <!-- Inicio Alerta Ingresado-->
            <?php
            if (isset($_GET['mensaje']) and ($_GET['mensaje']) == 'registrado') {


            ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Exito!</strong> Cliente Agregado con éxito!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>

     <!-- Inicio Alerta Falta campo-->
     <?php
            if (isset($_GET['mensaje']) and ($_GET['mensaje']) == 'falta') {


            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> Debes llenar todos los campos
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php
            }
            ?>



            <!-- Fin Alerta -->


            <!-- Fin Alerta Ingresado-->

                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear Cliente</h3></div>
                                    <div class="card-body">
                                        <form action="registrarclienteinicio.php" method="POST">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombre" />
                                                        <label for="inputFirstName">Nombre :</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="rut"  id="rut" type="text" placeholder="R.U.T" />
                                                        <label for="inputLastName">R.U.T</label>
                                                    </div>
                                                </div>
                                            </div>
                                      
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="password"  id="password" type="password" placeholder="Contraseña" />
                                                        <label for="inputPassword">Contraseña</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="plan" id="plan" class="form-control">
                                                            <option>Seleccionar Plan:</option>
                                                            <?php
                                                            foreach ($planes as $plan):
                                                                echo '<option value="'.$plan->id_plan.'">'.$plan->nombre.'</option>';
                                                                endforeach;
                                                            
                                                            ?>
                                                        </select>
                                                 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"> <input type="submit"  class="btn btn-primary btn-block" value="Crear Cliente"></div>
                                            </div>
                                        </form>
                                        <div class="mt-4 mb-0">
                                                <div class="d-grid row"><div class="col"> <p>Si ya tienes una cuenta puedes iniciar sesión <a href="login.php" class="">click aqui</a></p></div></div>
                                            </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>

<?php include('template/footer.php'); ?>