<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
 <head>
        <title>miPerfil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
         <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
         <link type="text/css" rel="stylesheet" href="css/solicitud.css">
 </head>
    <body> 
        <section style="background:#efefe9;">
		<?php include("header.php");
        if (! isset($_COOKIE['logueado']))
            $_COOKIE['logueado']="yes";
        ?>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <br><br><br><br>
                            <h2 class="form-group">Mi Perfil</h2>
                            <div class="thumbnail">                               
                                <h4>Nombre del Usuario</h4>
                            </div>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                 <form method="post" action="actualizarcontrasenaEntrenador.php">   
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="myModalLabel">Modificar Contraseña</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="password">Contraseña Actual</label>
                                                    <div class="input-group">
                                                        <input type="password" name="pass" class="form-control pwd" value="">
                                                    </div>
                                                    <label for="password-confirmation">Nueva Contraseña</label>
                                                    <div class="input-group">
                                                        <input name="passnueva" type="password" class="form-control pwd" value="">
                                                    </div>
                                                    <label for="password-confirmation">Confirmar Contraseña</label>
                                                    <div class="input-group">
                                                        <input name="repetpassnueva" type="password" class="form-control pwd" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                 </form>
                            </div>
    
    
    
                            <?php
    
                            $conexion = mysql_connect("localhost", "root", "root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                            mysql_select_db("mydb", $conexion)  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                            $_COOKIE['vengode'] = "miperfil";
                            $u = $_COOKIE['user'];
                            echo $u;
                            $entro = @mysql_query('CALL getentrenador("'.$u.'");');
    
                            if ($reg = mysql_fetch_row($entro)) {
                                $entrenador = $reg;
                            }

                            mysql_close($conexion);
    
                            $conexion = mysql_connect("localhost", "root", "root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                            mysql_select_db("mydb", $conexion)  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
    
                            $ent = @mysql_query('CALL getatletadireccion('.$entrenador[0].');');
    
                            if ($rig = mysql_fetch_row($ent)) {
                                $direccion = $rig;
                            }
    
                            echo "<input type='hidden' name='id' value = ".$entrenador[0]."/>";

                            mysql_close($conexion);
    
                            ?>
                            
                            
                            
                            
                            
                            <br><br><br>
                            <div class="tabs">
                                <ul class="tab-links">
                                    <li class="active"><a href="#tab1">Información</a></li>
                                    <li><a href="#tab2">Contacto</a></li>
                                    <li><a href="#tab3">Personal</a></li>
                                </ul>
 
                                <div class="tab-content">
                                    <div id="tab1" class="tab active">
                                        <h2 class="form-group-heading">Información Básica</h2>
                                        <label class="control-label">Nombre</label>
                                        <input maxlength="100" <?php echo ' value = "'.$entrenador[1].'"'?> type="text" required="required" class="form-control" placeholder="Nombre" />
                                        <br>

                                        <label class="control-label">Primer apellido</label>
                                        <input maxlength="100" type="text" <?php echo ' value = "'.$entrenador[3].'"'?>  required="required" class="form-control" placeholder="Primero apellido" />
                                        <br>

                                        <label class="control-label">Segundo Apellido</label>
                                        <input maxlength="100" type="text" <?php echo ' value = "'.$entrenador[15].'"'?>  required="required" class="form-control" placeholder="Segundo apellido" />
                                        <br>

                                        <?php

                                                echo '
                                        <script>
                                            $(function() {
                                            $("#years").val("'.split("/",$entrenador[5])[2].'");
                                            $("#months").val("'.split("/",$entrenador[5])[1].'");
                                            $("#days").val("'.split("/",$entrenador[5])[0].'");
                                            });
                                        </script>';
                                        ?>

                                        <label class="control-label">Fecha de nacimiento</label>
                                        <div class="row">
                                            <div class="col-xs-4 col-md-4">
                                                <select class="form-control" id ='months'>
                                                    <option value="Month">Mes</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <select class="form-control" id ='days'>
                                                    <option value="Day">Día</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-4 col-md-4">
                                                <select class="form-control" id ='years'>
                                                    <option value="Year">Año</option>
                                                </select>
                                            </div>
                                        </div>
                                         <br>   
                                        <label class="control-label">Cédula de identidad</label>
                                        <input maxlength="100" <?php echo ' value = "'.$entrenador[2].'"'?>  type="text" required="required" class="form-control" placeholder="Cédula" />
                                        <br>
                                        <label class="control-label">Nacionalidad</label>
                                        <input maxlength="100" <?php echo ' value = "'.$entrenador[13].'"'?>  type="text" required="required" class="form-control" placeholder="País" />
                                        <br>
                                                                                 <br>  
                                        <label class="control-label">Provincia</label>
                                        <input maxlength="100" <?php echo ' value = "'.$direccion[1].'"'?> type="text" required="required" class="form-control" placeholder="Provincia" />
                                         <br>  
                                         <label class="control-label">Cantón</label>
                                        <input maxlength="100" <?php echo ' value = "'.$direccion[2].'"'?> type="text" required="required" class="form-control" placeholder="Cantón" />
                                        <br>
                                        <label class="control-label">Distrito</label>
                                        <input maxlength="100" <?php echo ' value = "'.$direccion[3].'"'?> type="text" required="required" class="form-control" placeholder="Distrito" />
                                         <br>  
                                       
                                        <label class="control-label">Región</label>
                                        <input maxlength="100" type="text" <?php echo ' value = "'.$direccion[4].'"'?> required="required" class="form-control" placeholder="Región" />
                                        <br>
                                        
                                        <a href="#">Editar</a>
                                        <div id="hiddenDiv1" style="height:100px;width:300px;border:1px;visibility:hidden;">
                                            <button class="btn btn-large btn-primary" type="button">Cancelar</button>
                                            <button class="btn btn-large btn-primary" type="button">Guardar</button>
                                        </div>		
                                    </div>
 
                                    <div id="tab2" class="tab">
                                        <h2 class="form-group-heading">Información de Contacto</h2>
                                        <label class="control-label">Correo electrónico</label>
                                        <input maxlength="100" type="text" required="required" <?php echo ' value = "'.$entrenador[4].'"'?>  class="form-control" placeholder="Correo electrónico" />
                                         <br>  

                                        <label class="control-label">Teléfono Celular</label>
                                        <input <?php echo ' value = "'.$entrenador[12].'"'?>  maxlength="100" type="text" required="required" class="form-control" placeholder="Teléfono celular" />
                                         <br>  

                                        <label class="control-label">Teléfono de habitación</label>
                                        <input maxlength="100" type="text" <?php echo ' value = "'.$entrenador[6].'"'?>  required="required" class="form-control" placeholder="Teléfono de habitación" />
                                        <br>
                                        <label class="control-label">Asociación</label>
                                        <input <?php echo ' value = "'.$entrenador[10].'"'?>  maxlength="100" type="text" required="required" class="form-control" placeholder="Asociación" />
                                       
                                        <a href="#">Editar</a>
                                        <div id="hiddenDiv1" style="height:100px;width:300px;border:1px;visibility:hidden;">
                                            <button class="btn btn-large btn-primary" type="button">Cancelar</button>
                                            <button class="btn btn-large btn-primary" type="button">Guardar</button>
                                        </div>        
                                    </div>
 
                                    <div id="tab3" class="tab">
                                        <h2 class="form-group-heading">Información personal</h2>

                                        <label class="control-label">Género</label>
                                        <input maxlength="100" <?php echo ' value = "'.$entrenador[7].'"'?>  type="text" required="required" class="form-control" placeholder="Género" />

                                        <label class="control-label">Talla</label>
                                        <input maxlength="100" <?php echo ' value = "'.$entrenador[8].'"'?>  type="text" required="required" class="form-control" placeholder="Talla" />

                                        <label class="control-label">Peso</label>
                                        <input maxlength="100" <?php echo ' value = "'.$entrenador[9].'"'?>  type="text" required="required" class="form-control" placeholder="Peso" />

                                        <label class="control-label">Lateralidad</label>
                                        <input maxlength="100" <?php echo ' value = "'.$entrenador[14].'"'?>  type="text" required="required" class="form-control" placeholder="Lateralidad" />

                                        <a href="#">Editar</a>
                                        <div id="hiddenDiv1" style="height:100px;width:300px;border:1px;visibility:hidden;">
                                            <button class="btn btn-large btn-primary" type="button">Cancelar</button>
                                            <button class="btn btn-large btn-primary" type="button">Guardar</button>
                                        </div>

                                    </div>
 
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>

                </div>
        </section>
    </body>
</html>
