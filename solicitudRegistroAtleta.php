<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="/css/bootstrap.css"> 
        <link rel="stylesheet" href="/css/bootstrap.min.css">    
       <link rel="stylesheet" href="/css/solicitud.css">   
       <link href="/css/bootstrap-formhelpers.css" rel="stylesheet">
    
    </head>
    <body>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="/js/bootstrap.js"></script>
        <script src="/js/JavaScript1.js"></script>

    <section style="background:#efefe9;">
	<?php include("header.php"); ?>
    <div class="container">
        <div class="col-md-1 "></div>
        <div class="col-md-10 ">
		<form class="group" method="post"  action="http://localhost/registroatleta.php">

            <h2 class="form-group">Incripción de Atleta</h2>

            <h2 class="form-group-heading">Información básica</h2>

            <label class="control-label">Nombre</label>
            <input maxlength="100" type="text" name="nombre" required="required" class="form-control" placeholder="Nombre" />
            <br>
            <label class="control-label">Primer apellido</label>
            <input maxlength="100" type="text" name="apellido1" required="required" class="form-control" placeholder="Primero apellido" />
            <br>
            <label class="control-label">Segundo Apellido</label>
            <input maxlength="100" type="text" name="apellido2" required="required" class="form-control" placeholder="Segundo apellido" />
            <br>
            <label class="control-label">Fecha de nacimiento</label>

            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <label class="control-label">Año</label>
                    <select id="years" name="ano"></select>
                </div>
                <div class="col-xs-3 col-md-3">
                    <label class="control-label">Mes</label>
                    <select id="months" name="month"></select>
                </div>
                <div class="col-xs-3 col-md-3">
                    <label class="control-label">Día</label>
                    <select id="days" name="day"></select>
                </div>
            </div>
            <br>
            <label class="control-label">Cédula de identidad</label>
            <input maxlength="100" type="number" name="cedula" required="required" class="form-control" placeholder="Cédula" />
            <br>
			<div class="row">
				<div class="col-xs-3 col-md-3">
				<label class="control-label">Nacionalidad</label>


                    <select name="countries" id="countries">
						<option value="0">Costa Rica</option>
					</select>

				</div>
				<div class="col-xs-2 col-md-2">
				<label class="control-label">Provincia</label>
				 <br>
				<select name="provincia" id="Provincia" onchange="CantonChange(this);">
					<option value="San Jose">San José</option>
					<option value="Cartago">Cartago</option>
					<option value="Alajuela">Alajuela</option>
					<option value="Heredia">Heredia</option>
					<option value="Limon">Limón</option>
					<option value="Guanacaste">Guanacaste</option>
					<option value="Puntarenas">Puntarenas</option>
				</select>
				</div>
				<div class="col-xs-2 col-md-2">
				<label class="control-label">Cantón</label>
				<br>
				<select name="canton" id="Canton">
					<option value="0">Cantón</option>
				</select>

				</div>
				<div class="col-xs-2 col-md-2">
				<label class="control-label">Distrito</label>
				</br>
				<select name="distrito" id="Distrito">
					<option value="0">Distrito</option>
				</select>
				</div>
				<div class="col-xs-2 col-md-2">
				<label class="control-label">Región</label>
				<select name="region" id="Region">
					<option value="0">Central</option>
					<option value="1">Chorotega</option>
					<option value="2">Pacifico Central</option>
					<option value="3">Brunca</option>
					<option value="4">Huetar Atlántica</option>
					<option value="5">Huetar Norte</option>
				</select>
				</div>
				
			</div>
			<br>
            <label class="control-label">Primera inscipción en juegos</label>
            <input maxlength="100" type="text" name="inscripcion" required="required" class="form-control" placeholder="Primera inscripción en juegos" />

            <br>

            <br>

            <h2 class="form-group-heading">Información de Contacto</h2>
            <br>
            <label class="control-label">Correo electrónico</label>
            <input maxlength="100" type="email" name="email" required="required" class="form-control" placeholder="Correo electrónico" />
            <br>
            <label class="control-label">Teléfono Celular</label>
            <input maxlength="100" type="number" size="8" name="celular" required="required" class="form-control" placeholder="Teléfono celular" />
            <br>
            <label class="control-label">Teléfono de habitación</label>
            <input maxlength="100" type="number" size="8" name="telefono" required="required" class="form-control" placeholder="Teléfono de habitación" />
            <br>


            <label class="control-label">Asociación</label>
            <input maxlength="100" type="text" name="asociacion" required="required" class="form-control" placeholder="Asociación" />
            <br>
										
            <div class="row">
               <div class="col-xs-6 col-md-6">
                    <label class="control-label">Centro educativo</label>
                    <input maxlength="100" name="ce" type="text" required="required" class="form-control" placeholder="Centro educativo" />
                </div>
                <div class="col-xs-6 col-md-6">
                    <label class="control-label">Grado</label>
                    <input maxlength="100" type="text" name="grado" required="required" class="form-control" placeholder="Grado" />
                </div>
            </div>
            <br>
										
            <label class="control-label">En caso de emergencia, avisar a:</label>

            <div class="row">
               <div class="col-xs-6 col-md-6">
                    <label class="control-label">Nombre</label>
                    <input maxlength="100" type="text" required="required" name="encargado" class="form-control" placeholder="Nombre" />
                </div>
                <div class="col-xs-6 col-md-6">
                    <label class="control-label">Teléfono</label>
                    <input maxlength="100" type="number" size="8" required="required" name="encargadotelefono" class="form-control" placeholder="Teléfono" />
                </div>
            </div>
            <br>

            <br>

            <h2 class="form-group-heading">Información personal</h2>
            <br>
            <div class="row">
            <div class="col-xs-3 col-md-3">
				<label class="control-label">Género</label>
            <br>
            <select id="Genero" name="genero">
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
                <option value="Masculino">Otro</option>
            </select>
			</div>
			<div class="col-xs-3 col-md-3">
            <label class="control-label">Talla</label>
            <br>
            <select id="Talla" name="talla">
                <option value="xs">XS</option>
                <option value="s">S</option>
                <option value="m">M</option>
                <option value="l">L</option>
                <option value="xl">XL</option>
            </select>
			</div>
            <div class="col-xs-3 col-md-3">
            <label class="control-label">Lateralidad</label>
            <br>
            <select id="Lateralidad" name="lateralidad">
                <option value="izquierda">Zurdo</option>
                <option value="derecha">Derecho</option>
                <option value="ambidiestro">Ambidiestro</option>
            </select>
			</div>
			</div>
			 <br>
                <label class="control-label">Peso en Kg</label>
                <input maxlength="100" type="number" size="3" required="required" name="peso" class="form-control" placeholder="peso" />
            <br>
            <label class="control-label">Médico de cabecera</label>
            <input maxlength="100" type="text" name="medico" required="required" class="form-control" placeholder="Médico" />
            <br>
			<label class="control-label">Estatura</label>
			<input maxlength="100" type="number" name="estatura" required="required" class="form-control" placeholder="Estatura" />
			<br>
            <div class="row">

                <div class="col-xs-6 col-md-6">
                    <label class="control-label">Estatura del abuelo</label>
                    <input maxlength="100" type="number" name="abuelo" required="required" class="form-control" placeholder="Abuelo" />

                </div>
                <div class="col-xs-6 col-md-6">
                    <label class="control-label">Estatura de la abuela</label>
                    <input maxlength="100" type="number" required="required" name="abuela" class="form-control" placeholder="Abuela" />

                </div>
            </div>
                    <br>
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <label class="control-label">Estatura del padre</label>
                    <input maxlength="100" type="number" required="required" name="padre" class="form-control" placeholder="Padre" />

                </div>
                <div class="col-xs-6 col-md-6">
                    <label class="control-label">Estatura de la madre</label>
                        <input maxlength="100" type="number" required="required" name="madre" class="form-control" placeholder="Madre" />

                </div>
            </div>

            <br>
            <br>
            <button class="btn btn-lg btn-primary pull-right" type="submit">Inscribir Atleta</button>

        </form> 
 
		</div>

        <div class="col-md-1 "></div>
    </div><!-- container -->
					            <br>
            <br>  
	</section>
    </body>
</html>
