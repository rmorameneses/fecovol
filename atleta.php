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
      </head>
    <body>
    <section style="background:#efefe9;">
	<?php include("header.php"); ?>
		<div class="container">

			<div class="container">
            <br><br><br> <br>
            <div class="row">
                <h2>Atletas</h2>
                <a href="solicitudRegistroAtleta.php" class="btn btn-sm btn-primary" role="button"><i class="glyphicon glyphicon-plus"></i>&nbsp;Solicitar Inscripción de Atleta</a>
                <br>

                <h4>Buscar Atleta</h4>

                <div class="col-lg-12">
                    <input type="search" class="form-control" id="input-search" placeholder="Buscar Atleta">
                </div>
                <br>
                <div class="searchable-container">
                    <br>
				<div class="col-md-12" >
					<table class="table table-striped table-bordered">
							<thead>
							<th>Nombre del Atleta&nbsp;</th>
							<th>Cédula&nbsp;</th>
							<th>Correo Electrónico&nbsp;</th>
							<th>Equipo&nbsp;</th>
							<th>Más información&nbsp;</th>
							</thead>

                    <?php

                      if($_COOKIE['logueado']=="yes")
                      {

                        //imprimir posts

                        $conexion=mysql_connect("localhost","root","root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                        mysql_select_db("mydb",$conexion) or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                          $_COOKIE['vengode']="atleta";
                        $entro=@mysql_query('CALL getatletas();');
                        $index=0;

                        while ($reg=mysql_fetch_array($entro))
                        {
                          $atletas[$index]=$reg;
                          $index++;
                        }										/* while que guarda todos los post*/

                        mysql_close($conexion);

                        $cantidadRegistros=$index;
                        $index=0;

                        while($index<$cantidadRegistros) 	//imprimira cada post con sus respuestas
                        {
                          $conexion=mysql_connect("localhost","root","root") or die("Problemas en la conexion");
                          mysql_select_db("mydb",$conexion) or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");

                          $query=mysql_query('CALL getteamatleta("'.$atletas[$index][2].'");') or die ("problema al llamar el SP");

                          $team=mysql_fetch_array($query);
                            
                            $_GET['ced']= $atletas[$index][2];
                          echo
                          '
							<tbody>
								<tr ng-repeat="data in customers">
									<td>'.$atletas[$index][1].' '.$atletas[$index][3].'</td>
									<td>'.$atletas[$index][2].'</td>
									<td>'.$atletas[$index][4].'</td>
									<td>'.$team[0].'</td>
									<td><a href="atletaInfo.php?id='.$atletas[$index][0].'" class="btn">&nbsp;<i class="glyphicon glyphicon-edit"></i>&nbsp; Ver atleta</a></td>
								</tr>
							</tbody>


                                </div>
                            </div>
                          ';

                          mysql_close($conexion);

                          $index++;
                        }
                      }
                      else
                      {
                        echo"<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost'> " ;
                      }
                    ?>
					</table>
                </div>
				</div>
            </div>

        </div>
		</div>
	</section>

    </body>
</html>
