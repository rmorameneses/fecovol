<!--  archivo php que revisa el logueado -->

<html>
<head>
<title>Log-in</title>
</head>
<body>
<?php
  $conexion=mysql_connect("localhost","root","root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
  mysql_select_db("mydb",$conexion) or die("Problemas en la seleccion de la base de datos");

  $usuario= strip_tags($_POST['user']);
  $password= sha1(strip_tags($_POST['pass']));
  $query = mysql_query('CALL CheckPassword("'.$usuario.'","'.$password.'");') or die ("problema al llamar el SP check pass");
  $entro=@mysql_fetch_row($query);
  setcookie("logueado", "", time() + (86400 * 30), '/');
  setcookie("user", $usuario, time() + (86400 * 30), '/');

  if($entro[0]=='1')
  {
    setcookie("logueado", "yes", time() + (86400 * 30), '/');
  //  $_COOKIE['logueado']="yes";
  //  setcookie('usuario',$usuario);
  //  setcookie('vengode',"login");
    echo"<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=http://localhost/miPerfil.php'> " ;
  }
  else
  {
    setcookie('logueado',"no");
  //  setcookie('usuario','');
  //  setcookie('vengode',"login");
    echo"<script> window.alert('Autenticación fallida, inténtelo de nuevo'); </script> " ;
    echo"<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=http://localhost/'> " ;
  }

//Falta hacer el if de redireccionamiento
  mysql_close($conexion);
?>
</body>
</html>
