<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="css/atleta.css">    
        <link type="text/css" rel="stylesheet" href="css/sticky-footer.css">    
          <link type="text/css" rel="stylesheet" href="css/bootstrap.css">    
          <script src="js/JavaScript1.js" type="text/javascript"></script>
          <script src="js/boostrap.js" type="text/javascript"></script>
    </head>
    <body>
        <section style="background:#efefe9;">
    <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <img src="http://www.fecovol.co.cr/templates/fecovol33/images/object1220940431.png" alt="logo">
                </div>
            </div>
        </div>

        <div class="barra">
            <ul class="nav nav-tabs">
                <ul class="list-inline">
                    <li><a href="miPerfil.html">Mi perfil</a></li>
                    <li><a href="atleta.php">Atletas</a></li>
                    <li><a href="equipo.html">Equipos</a></li>
                    <li><a href="#">Estadísticas</a></li>
                    <li><a href="contactarAdmin.html">Contactar Administrador</a></li>
                    <li><a href="#">Notificaciones</a></li>
                    <li><a href="index.html">Salir</a></li>
                </ul>

            </ul>
        </div>

        <div class="container">
            <div class="row">
                <h2>Equipos</h2>
                <a href="miPerfil.html" class="btn btn-info btn-sm " role="button">Solicitar Inscripción de Equipo</a>
                <br>

                <h4>Buscar Equipo</h4>

                <div class="col-lg-12">
                    <input type="search" class="form-control" id="input-search" placeholder="Buscar Atleta">
                </div>
                <br>
                <div class="searchable-container">
                    <br>

                    <?php
                      
                      if($_SESSION['logueado']=="yes")
                      {
                       
                        //imprimir equipos
                      
                        $conexion=mysql_connect("localhost","root","root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                        mysql_select_db("mydb",$conexion) or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
                        $_SESSION['vengode']="equipos";
                        $entro=@mysql_query('CALL getteams();');
                        $index=0;
                        
                        while ($reg=mysql_fetch_array($entro))
                        {
                          $equipos[$index]=$reg;
                          $index++;
                        }										/* while que guarda todos los post*/
                        
                        mysql_close($conexion);
                        
                        $cantidadRegistros=$index;
                        $index=0;

                        while($index<$cantidadRegistros) 	//imprimira cada post con sus respuestas
                        {
                          echo
                          '	
                            <div class="items col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="info-block block-info clearfix">
                                   <h4>Nombre: '.$equipos[$index][1].' </h4>
                                </div>
                            </div>
                            
                          ';
                          
                          $index++;
                        }
                        
                      }
                      else
                      {
                        echo"<META HTTP-EQUIV='REFRESH' CONTENT='4;URL=http://localhost'> " ;
                      }
                    ?>

                    <!--
                    <div class="items col-xs-12 col-sm-6 col-md-6 col-lg-6 clearfix">
                        <div class="info-block block-info clearfix">
                            <h5>Equipo1</h5>
                        </div>
                    </div>
                    <div class="items col-xs-12 col-sm-12 col-md-6 col-lg-6 clearfix">
                        <div class="info-block block-info clearfix">
                            <h5>Equipo2</h5>
                        </div>
                    </div>
                    <div class="items col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="info-block block-info clearfix">

                            <a href="atletaInfo.html" >Equipo3</a>
                        </div>
                    </div>
                    <div class="items col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="info-block block-info clearfix">
                           
                            <h5>Equipo4</h5>
                        </div>
                    </div> -->
                </div>

            </div>

        </div>
    </div>
</section>
    </body>
</html>
