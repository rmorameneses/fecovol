<html>
<head>
  <title>Log-in</title>
</head>
<body>
<?php
$conexion=mysql_connect("localhost","root","root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
mysql_select_db("mydb",$conexion)  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");

$user = $_COOKIE['user'];
$pass= sha1(strip_tags($_POST['pass']));
$passnueva= strip_tags($_POST['passnueva']);
$repetpassnueva= strip_tags($_POST['repetpassnueva']);

$query = mysql_query('CALL CheckPassword("'.$user.'","'.$pass.'");') or die ("problema al llamar el SP check pass");
$entro=@mysql_fetch_row($query);

if($entro[0]=='1')
{
  if( strcmp($passnueva, $repetpassnueva) == 0 ) {
    mysql_close($conexion);
    $conexion=mysql_connect("localhost","root","root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
    mysql_select_db("mydb",$conexion)  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
    $query = mysql_query('CALL CambiarPassword("'.sha1($passnueva).'","'.$user.'");') or die ("problema al llamar el SP check pass");
    $entro=@mysql_fetch_row($query);
    echo"<script> window.alert('Actualizado'); </script> " ;
    echo"<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=http://localhost/miPerfil.php'> " ;
  }
  else {
    echo"<script> window.alert('Los campos deben coincidir'); </script> " ;
    echo"<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=http://localhost/miPerfil.php'> " ;
  }
}
else
{
  echo"<script> window.alert('La autenticación falló, inténtelo de nuevo'); </script> " ;
  echo"<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=http://localhost/miPerfil.php'> " ;
}
  mysql_close($conexion);
?>
</body>
</html>