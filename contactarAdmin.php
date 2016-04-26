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
                    <li><a href="#miPerfil.html">Mi perfil</a></li>
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
                <div class="col-sm-12 col-lg-12">
                    <h1 class="h1">Contactar Administrador </h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-md-6 center-block">
                <div class="well well-sm">
                    <form id="FormEnvioCorreo">

                        <div class="form-group">

                            <div class="form-group">
                                <label for="subject">
                                    Asunto
                                </label>
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required="required" value="">
                            </div>
                            <div class="form-group">
                                <label for="name">
                                    Agregar archivo
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="file" id="fileselect" name="documents" class="form-control" style="  width: 310px;">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="name">
                                Message
                            </label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Message">Prueba</textarea>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="button1id"></label>
                            <div class="controls">

                                <button type="button" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
            
        </div>



    </div>
</section>

    </body>
</html>
