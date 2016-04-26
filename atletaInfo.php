<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="css/atleta.css"> 

        <script>

            $(document).ready(function(){
               $('#tabs').tabs();
            });

        </script>

    </head>
    <body>
	
	<section style="background:#efefe9;">
		<?php include("header.php");
        if(true)
        {
        if(!$_COOKIE['logueado']=="yes")
        {
            echo"<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost'> " ;
        }
        ?>
        <script src="js/javaScriptAtleta.js"></script>
        <div class="container">


            <div class="col-md-1 "></div>
            <div class="col-md-10 ">
                <h2 class="form-group">Perfil de Atleta</h2>
                <div class="thumbnail">
                    <h4>Nombre del Atleta</h4>


                    <ul class="nav nav-pills">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                Información General <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class=""><a href="#informacion" data-toggle="tab">Información General</a></li>
                                <li><a href="#contacto" data-toggle="tab">Contacto</a></li>
                                <li><a href="#personal" data-toggle="tab">Personal</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                Historial Médico <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#formMedico" data-toggle="tab">Formulario médico</a></li>
                                <li><a href="#datMedico" data-toggle="tab">Datos médicos</a></li>
                                <li><a href="#examFisico" data-toggle="tab">Examen físico</a></li>
                            </ul>
                        </li>


                        <li class=""><a href="#equipos" data-toggle="tab" aria-expanded="true">Equipos</a></li>
                        <li class=""><a href="#pruebaFisica" data-toggle="tab" aria-expanded="false">Pruebas físicas</a>
                        </li>
                        <li class=""><a href="#indiceFisico" data-toggle="tab" aria-expanded="false">Índice físico</a>
                        </li>

                    </ul>

                </div>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="informacion">
                        <form method="post" action="actualizaratletaInfo.php">
                            <h2 class="form-group-heading">Información básica</h2>


                            <?php

                            $conexion = mysql_connect("localhost", "root", "root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                            mysql_select_db("mydb", $conexion)  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                            $_COOKIE['vengode'] = "atletainfo";
                            $id = $_GET['id'];
                            $entro = @mysql_query('CALL getatleta('.$id.');');

                            if ($reg = mysql_fetch_row($entro)) {
                                $atletas = $reg;
                            }

                            mysql_close($conexion);

                            $conexion = mysql_connect("localhost", "root", "root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                            mysql_select_db("mydb", $conexion)  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");

                            $ent = @mysql_query('CALL getatletadireccion('.$id.');');

                            if ($rig = mysql_fetch_row($ent)) {
                                $direccion = $rig;
                            }

                            echo "<input type='hidden' name='id' value = ".$id."/>";
                            echo "---".$direccion[1];
                            mysql_close($conexion);

                            ?>


                            <label class="control-label">Nombre</label>
                            <input maxlength="100" type="text" name="nombre" id="infobasica1" required="required"
                                   class="form-control" placeholder="Nombre" disabled="disabled" <?php echo ' value = "'.$atletas[1].'"'?> />
                            <br>
                            <label class="control-label">Primer apellido</label>
                            <input maxlength="100" type="text" name="apellido1" id="infobasica2" required="required"
                                   class="form-control" placeholder="Primero apellido" <?php echo ' value = "'.$atletas[3].'"'?> disabled="disabled"/>
                            <br>
                            <label class="control-label">Fecha de nacimiento</label>
                            <div class="row">
                                <div class="col-xs-4 col-md-4">
                                    <label class="control-label">Año</label>
                                    <select class="form-control" id="years" disabled="disabled"></select>
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <label class="control-label">Mes</label>
                                    <select class="form-control" id="months"  disabled="disabled"></select>
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <label class="control-label">Día</label>
                                    <select class="form-control" id="days" disabled="disabled" ></select>
                                </div>
                            </div>
                            <br>
                            <label class="control-label">Cédula de identidad</label>
                            <input maxlength="100" type="number" name="cedula" id="infobasica3"  <?php echo ' value = "'.$atletas[2].'"'?> required="required"
                                   class="form-control" placeholder="Cédula" disabled="disabled"/>
                            <br>
                            <label class="control-label">Nacionalidad</label>

                            <br>
                            <?php
                                echo '
                                <script>
                                    $(function() {
                                    $("#countries").val("'.$atletas[13].'");
                                    $("#years").val("'.split("/",$atletas[5])[2].'");
                                    $("#months").val("'.split("/",$atletas[5])[1].'");
                                    $("#days").val("'.split("/",$atletas[5])[0].'");
                                    });
                                </script>';
                            ?>
                        <select class="form-control" name="countries" id="countries" disabled="disabled">
							
						</select>
                            <br>
                            <br>

                            <?php
                            echo '
                                <script>
                                    $(function() {
                                    $("#Provincia").val("'.$direccion[1].'");
                                    });
                                </script>';
                            ?>

                            <label class="control-label">Provincia</label>
                            <br>
                            <select class="form-control" name="provincia" id="Provincia" onchange="CantonChange(this);" disabled="disabled">
                                <option value="0">Provincia</option>
                                <option value="San José">San José</option>
                                <option value="Cartago">Cartago</option>
                                <option value="Alajuela">Alajuela</option>
                                <option value="Heredia">Heredia</option>
                                <option value="Limon">Limón</option>
                                <option value="Guanacaste">Guanacaste</option>
                                <option value="Puntarenas">Puntarenas</option>
                            </select>
                            <br>
                            <br>


                            <!--                            --><?php
                            //                            echo '
                            //
                            //                            <script>
                            //                                var temp = "'.$direccion[1].'";
                            //                                var mySelect = document.getElementById("Provincia");
                            //
                            //                                for(var i, j = 0; i = mySelect.options[j]; j++) {
                            //                                    if(i.value == temp) {
                            //                                        mySelect.selectedIndex = j;
                            //                                        break;
                            //                                    }
                            //                                }
                            //                            </script>
                            //                            ';
                            //                            ?>

                            <?php
                            echo '
                                <script>
                                    $(function() {
                                    $("#Canton").val("'.$direccion[2].'");
                                    });
                                </script>';
                            ?>
                            <label class="control-label">Cantón</label>
                            <br>
                            <select class="form-control" name="canton"  id="Canton" disabled="disabled">
                                <option value="0">Cantón</option>
                            </select>
                            <br>
                            <br>
							<?php
                            echo '
                                <script>
                                    $(function() {
                                    $("#Distrito").val("'.$direccion[3].'");
                                    });
                                </script>';
                            ?>
                            <label class="control-label">Distrito</label>
                            <br>
                            <select class="form-control" id="Distrito" name="distrito"  disabled="disabled">
                                <option value="0">Distrito</option>
                            </select>
                            <br>
							
							<label class="control-label">Región</label>
							 <br>
								<select class="form-control" name="region" disabled="disabled" id="Region">
								<option value="0">Central</option>
								<option value="1">Chorotega</option>
								<option value="2">Pacifico Central</option>
								<option value="3">Brunca</option>
								<option value="4">Huetar Atlántica</option>
								<option value="5">Huetar Norte</option>
							</select>
<br>
                            <label class="control-label">Primera inscipción en juegos</label>
                            <input  <?php echo ' value = "'.$atletas[10].'"'?> maxlength="100" type="text" name="inscripcion" id="infobasica4" required="required"
                                   class="form-control" placeholder="Primera inscripción en juegos" disabled="disabled"/>
                            <br>

                            <div id="infoBasica" style="display: none;">
                                <button type="reset" class="btn btn-default" id="cancelInfoBasica">Cancel</button>
                                <button type="submit" class="btn btn-primary" id="actualizaInfoBasica">Actualizar</button>
                            </div>
                            </br>
                            <button type="submit" class="btn btn-primary" id="infoBasicaCheck">Actualizar Formulario
                            </button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="contacto">
                        <?php

                        $conexion = mysql_connect("localhost", "root", "root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                        mysql_select_db("mydb", $conexion)  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                        $_COOKIE['vengode'] = "atletainfo";
                        $id = $_GET['id'];
                        $entro = @mysql_query('CALL getatleta('.$id.');');

                        if ($reg = mysql_fetch_row($entro)) {
                            $atletas = $reg;
                        }

                        mysql_close($conexion);

                        $conexion = mysql_connect("localhost", "root", "root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                        mysql_select_db("mydb", $conexion)  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");

                        $ent = @mysql_query('CALL getatletadireccion('.$id.');');

                        if ($rig = mysql_fetch_row($ent)) {
                            $direccion = $rig;
                        }

                        echo "<input type='hidden' name='id' value = ".$id."/>";
                        echo "---".$direccion[1];
                        mysql_close($conexion);

                        ?>
                        <h2 class="form-group-heading">Información de Contacto</h2>
                        <br>
                        <label class="control-label">Correo electrónico</label>
                        <input <?php echo ' value = "'.$atletas[4].'"'?> maxlength="100" type="email" name="email" id="infocontacto1" required="required"
                               class="form-control" placeholder="Correo electrónico" disabled="disabled"/>
                        <br>
                        <label class="control-label">Teléfono Celular</label>
                        <input <?php echo ' value = "'.$atletas[6].'"'?> maxlength="100" type="number" name="celular" id="infocontacto2" required="required"
                               class="form-control" placeholder="Teléfono celular" disabled="disabled"/>
                        <br>
                        <label class="control-label">Teléfono de habitación</label>
                        <input <?php echo ' value = "'.$atletas[6].'"'?> maxlength="100" type="number" name="telefono" id="infocontacto3" required="required"
                               class="form-control" placeholder="Teléfono de habitación" disabled="disabled"/>
                        <br>


                        <label class="control-label">Asociación</label>
                        <input <?php echo ' value = "'.$atletas[10].'"'?> maxlength="100" type="text" name="asociacion" id="infocontacto4" required="required"
                               class="form-control" placeholder="Asociación" disabled="disabled"/>
                        <br>

                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <label class="control-label">Centro educativo</label>
                                <input <?php echo ' value = "'.$atletas[6].'"'?> maxlength="100" type="text" required="required" class="form-control"
                                       placeholder="Centro educativo" id="infocontacto5" disabled="disabled"/>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <label class="control-label">Grado</label>
                                <input maxlength="100" type="text" required="required" id="infocontacto6"
                                       class="form-control" placeholder="Grado" disabled="disabled"/>
                            </div>
                        </div>
                        <br>

                        <label class="control-label">En caso de emergencia, avisar a:</label>

                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <label class="control-label">Nombre</label>
                                <input <?php echo ' value = "'.$atletas[13].'"'?> maxlength="100" type="text" required="required" id="infocontacto7"
                                       class="form-control" placeholder="Nombre" disabled="disabled"/>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <label class="control-label">Teléfono</label>
                                <input maxlength="100" type="number" required="required" id="infocontacto8"
                                       class="form-control" placeholder="Teléfono" disabled="disabled"/>
                            </div>
                        </div>
                        <br>
                        <div id="divcontacto" style="display: none;">
                            <button type="reset" class="btn btn-default" id="cancelcontacto">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="actualizacontacto">Actualizar</button>
                        </div>
                        </br>
                        <button type="button" class="btn btn-primary" id="contactoCheck">Actualizar Formulario</button>

                    </div>
                    <div class="tab-pane fade" id="personal">
                        <?php

                        $conexion = mysql_connect("localhost", "root", "root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                        mysql_select_db("mydb", $conexion)  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                        $_COOKIE['vengode'] = "atletainfo";
                        $id = $_GET['id'];
                        $entro = @mysql_query('CALL getatleta('.$id.');');

                        if ($reg = mysql_fetch_row($entro)) {
                            $atletas = $reg;
                        }

                        mysql_close($conexion);

                        $conexion = mysql_connect("localhost", "root", "root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                        mysql_select_db("mydb", $conexion)  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");

                        $ent = @mysql_query('CALL getatletadireccion('.$id.');');

                        if ($rig = mysql_fetch_row($ent)) {
                            $direccion = $rig;
                        }

                        echo "<input type='hidden' name='id' value = ".$id."/>";
                        echo "---".$direccion[2];
                        mysql_close($conexion);

                        ?>
                        <h2 class="form-group-heading">Información personal</h2>
                        <br>
							<?php
                            echo '
                                <script>
                                    $(function() {
                                    $("#Genero").val("'.$direccion[7].'");
                                    });
                                </script>';
                            ?>
                        <label class="control-label">Género</label>
                        <br>
                        <select class="form-control" id="Genero" disabled="disabled">
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Masculino">Otro</option>
                        </select>
                        <br>
                        <br>
						<?php
                            echo '
                                <script>
                                    $(function() {
                                    $("#Talla").val("'.$direccion[8].'");
                                    });
                                </script>';
                            ?>
                        <label class="control-label">Talla</label>
                        <br>
                        <select class="form-control" id="Talla" disabled="disabled">
                            <option value="xs">XS</option>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="xl">XL</option>
                        </select>
                        <br>
                        <br>
						
                        <label class="control-label">Lateralidad</label>
                        <br>
                        <select class="form-control" id="Lateralidad" disabled="disabled">
                            <option value="izquierda">Zurdo</option>
                            <option value="derecha">Derecho</option>
                            <option value="ambidiestro">Ambidiestro</option>
                        </select>
                        <br>

                        <br>
                        <label class="control-label">Médico de cabecera</label>
                        <input maxlength="100" type="text" required="required" id="infopersonal1" class="form-control"
                               placeholder="Médico" disabled="disabled"/>
                        <br>
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <label class="control-label">Estatura del abuelo</label>
                                <input maxlength="100" type="number" required="required" id="infopersonal2"
                                       class="form-control" placeholder="Abuelo" disabled="disabled"/>

                            </div>
                            <div class="col-xs-6 col-md-6">
                                <label class="control-label">Estatura de la abuela</label>
                                <input maxlength="100" type="number" required="required" id="infopersonal3"
                                       class="form-control" placeholder="Abuela" disabled="disabled"/>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <label class="control-label">Estatura del padre</label>
                                <input maxlength="100" type="number" required="required" class="form-control"
                                       id="infopersonal4" placeholder="Padre" disabled="disabled"/>

                            </div>
                            <div class="col-xs-6 col-md-6">
                                <label class="control-label">Estatura de la madre</label>
                                <input maxlength="100" type="number" required="required" id="infopersonal5"
                                       class="form-control" placeholder="Madre" disabled="disabled"/>

                            </div>
                        </div>


                        <div id="divpersonal" style="display: none;">
                            </br>
                            <button type="reset" class="btn btn-default" id="cancelpersonal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="actualizapersonal">Actualizar</button>
                        </div>
                        </br>
                        <button type="button" class="btn btn-primary" id="personalCheck">Actualizar Formulario</button>
                    </div>
                    <div class="tab-pane fade" id="formMedico">
                        <h5 class="form-group">Fecha: </h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class=" checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox1" name="checkbox1" disabled="disabled"> 1.
                                        Ha tenido usted enfermedades médicas o trauma de portivos desde su último
                                        chequeo?
                                    </label>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox2" name="checkbox2" disabled="disabled">
                                        Tiene alguna enfermedad crónica?
                                    </label>
                                </div>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox3" name="checkbox3" disabled="disabled">2. Ha
                                        estado usted hospitalizado?
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox4" name="checkbox4" disabled="disabled"> Ha
                                        tenido algún tipo de cirugía?
                                    </label>
                                </div>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox5" name="checkbox5" disabled="disabled">3.
                                        Usted toma medicamentos prescritos o no prescritos por un médico o usa algún
                                        tipo de inhalador?
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox6" name="checkbox6" disabled="disabled"> Ha
                                        tomado suplementos o vitaminas para perder o ganar peso o aumenten su desarrollo
                                        físico?
                                    </label>
                                </div>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox7" name="checkbox7" disabled="disabled"> 4.
                                        Usted es alérgico (polen, comidas, medicamentos?)

                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox8" name="checkbox8" disabled="disabled">Ha
                                        desarrollado algún tipo de brote (piel) después del ejercicio?
                                    </label>
                                </div>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox9" name="checkbox9" disabled="disabled"> 5.
                                        Se cansa más rápidamente que sus compañeros al hacer ejercicio?


                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox10" name="checkbox10" disabled="disabled"> Ha
                                        tenido algún familiar muerto por problemas de corazón antes de los 50 años de
                                        edad?

                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox11" name="checkbox11" disabled="disabled"> En
                                        algún momento le han denegado o restringido su participación deportiva por
                                        problemas médicos?

                                    </label>
                                </div>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox12" name="checkbox12" disabled="disabled"> 6.
                                        Ha tenido problemas de la piel (por ejemplo; pústulas, hongos, acné, ictericia)
                                    </label>
                                </div>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox13" name="checkbox13" disabled="disabled"> 7.
                                        Ha tenido traumas en la cabeza con pérdida de la conciencia?
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox14" name="checkbox14" disabled="disabled"> Ha
                                        tenido algún "knocked out" en los últimos 6 meses o ha tenido pérdida de la
                                        memoria?
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox15" name="checkbox15" disabled="disabled"> Ha
                                        tenido algún tipo de trauma en los brazos, manos, piernas, o pies?
                                    </label>
                                </div>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox16" name="checkbox16" disabled="disabled">8.
                                        Ha tenido problemas respiratorios por la práctica deportiva?
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox17" name="checkbox17" disabled="disabled">
                                        Padece de Asma Bronqual?
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox18" name="checkbox18" disabled="disabled"> Ha
                                        tenido alguna sensación de alergia por la que ha teniddo que recibir
                                        tratamiento?
                                    </label>
                                </div>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox19" name="checkbox19" disabled="disabled">9.
                                        Usted emplea algún tipo especial de protección o correctivo que utiliza para su
                                        práctica deportiva?
                                    </label>
                                </div>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox20" name="checkbox20" disabled="disabled">
                                        10. Tiene algún problema con sus ojos o su visión?
                                    </label>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox21" name="checkbox21" disabled="disabled">
                                        Usa anteojos, lentes de contacto o protectores de ojos para la práctica
                                        deportiva?
                                    </label>
                                </div>
                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox22" name="checkbox22" disabled="disabled">11.
                                        Se ha fracturado o roto huesos o luxado alguna articulación?
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        Tiene dolores o calambres en músculos, tendones, huesos o ligamentos?
                                    </label>
                                    <label>
                                        En caso de afirmativo elija la casilla y explique al final.
                                    </label>
                                    <div class="row">
                                        <div class="col-xs-4 col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox23" name="checkbox23"
                                                           disabled="disabled">Cabeza
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox23" name="checkbox23"
                                                           disabled="disabled">Cuello
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox24" name="checkbox24"
                                                           disabled="disabled">Espalda
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox25" name="checkbox25"
                                                           disabled="disabled">Tórax
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox26" name="checkbox26"
                                                           disabled="disabled">Hombro
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox27" name="checkbox27"
                                                           disabled="disabled">Brazo
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox28" name="checkbox28"
                                                           disabled="disabled">Codo
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox29" name="checkbox29"
                                                           disabled="disabled">Antebrazo
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox30" name="checkbox30"
                                                           disabled="disabled">Muñeca
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox31" name="checkbox31"
                                                           disabled="disabled">Mano
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox32" name="checkbox32"
                                                           disabled="disabled">Dedos
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox33" name="checkbox33"
                                                           disabled="disabled">Cadera
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox34" name="checkbox34"
                                                           disabled="disabled">Pierna
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox35" name="checkbox35"
                                                           disabled="disabled">Rodilla
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox36" name="checkbox36"
                                                           disabled="disabled">Tobillo
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="checkbox37" name="checkbox37"
                                                           disabled="disabled">Pie
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <br>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox38" name="checkbox38" disabled="disabled">12.
                                        Usted quiere pesar más o menos del que pesa ahora?
                                        Utiliza algún tipo de inhalador?
                                    </label>
                                </div>
                                <br> <h4 class="modal-title">SOLO PARA MUJERES</h4>
                                <div class="checkbox">
                                    <label>
                                        13. Cuándo fue el primer periodo Menstrual?
                                        <input type="text" id="checktext1" name="checktext1" disabled="disabled">
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        Cuando fue su último periodo Menstrual?
                                        <input type="text" id="checktext2" name="checktext2" disabled="disabled">
                                    </label>
                                </div>
                                <br><h6 class="form-group-heading">Explique las respuestas afirmativas con su respectivo
                                    número: </h6>
                                <textarea class="form-control" rows="6" id="checktextarea" disabled="disabled"
                                          placeholder="Escriba su mensaje acá" required></textarea>
                                <br>
                            </div>
                        </div>

                        <div id="newpost" style="display: none;">
                            <button type="reset" class="btn btn-default" id="cancelChek">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="actualizacheck">Actualizar</button>
                        </div>
                        </br>
                        <button type="button" class="btn btn-primary" id="enableCheck">Actualizar Formulario</button>


                    </div>
                    <div class="tab-pane fade" id="datMedico">

                        <label class="control-label">Médico de cabecera</label>
                        <input maxlength="100" type="text" required="required" class="form-control"
                               placeholder="Médico"/>
                        <h2 class="form-group">Historial Médico</h2>
                        <h3 class="form-group">Información básica</h3>
                        <div class="row">
                            <table class="table table-fixed">
                                <thead>
                                <tr>
                                    <th class="col-xs-3 col-md-3"></th>
                                    <th class="col-xs-3 col-md-3">NORMAL</th>
                                    <th class="col-xs-4 col-md-4">HALLAZGOS/ANORNALES</th>
                                    <th class="col-xs-2 col-md-2">INICIALES</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="col-xs-1"></td>
                                    <td class="col-xs-3">MEDICO</td>
                                    <td class="col-xs-7"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-1"></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Apariencia</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Ojos/Oidos/Nariz/Garganta</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Nódulos linfáticos</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Corazón</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Pulso</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Pulmones</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Abdomen</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Genitales (Sólo hombres)</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Piel</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-1"></td>
                                    <td class="col-xs-3">MUCULOESQUELETO</td>
                                    <td class="col-xs-7"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-1"></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Cuello</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Espalda</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Hombro/brazo</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Codo/Antebrazo</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Muñeca/Mano</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Cadera</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Rodilla</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Tobillo</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>
                                <tr>
                                    <td class="col-xs-3">Pie</td>
                                    <td class="col-xs-3"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-4"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                    <td class="col-xs-2"><input maxlength="100" type="text" required="required"
                                                                class="form-control" placeholder=""/></td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="examFisico">
                        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out
                            master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan
                            DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY
                            salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
                    </div>
                    <div class="tab-pane fade" id="equipos">
                        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out
                            master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan
                            DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY
                            salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
                    </div>
                    <div class="tab-pane fade" id="pruebaFisica">
                        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out
                            master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan
                            DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY
                            salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
                    </div>
                    <div class="tab-pane fade" id="indiceFisico">
                        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out
                            master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan
                            DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY
                            salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
                    </div>

                </div>
                </br></br></br>
            </div>
            <div class="col-md-1 "></div>
            <?php
            }
            ?>
	</section>
    </body>
</html>
