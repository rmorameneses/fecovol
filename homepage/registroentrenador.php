<html>
<head>
<title>Log-in</title>
</head>
<body>
<?php
$conexion=mysql_connect("localhost","root","root")  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
mysql_select_db("mydb",$conexion) or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");

$name= strip_tags($_POST['nombre']);
$apellido1= "".strip_tags($_POST['apellido1']). " " . strip_tags($_POST['apellido2']);
$ano= "".strip_tags($_POST['day'])."/".strip_tags($_POST['month'])."/". strip_tags($_POST['ano']);
$cedula= strip_tags($_POST['cedula']);
$countries= strip_tags($_POST['countries']);
$email= strip_tags($_POST['email']);
$celular= strip_tags($_POST['celular']);
$telefono= strip_tags($_POST['telefono']);
$provincia=strip_tags($_POST['provincia']);
$canton = strip_tags($_POST['canton']);
$distrito = strip_tags($_POST['distrito']);
$region = strip_tags($_POST['region']);
$asociacion= strip_tags($_POST['asociacion']);
$genero= strip_tags($_POST['genero']);
$talla= strip_tags($_POST['talla']);
$peso= strip_tags($_POST['peso']);
$Lateralidad= strip_tags($_POST['Lateralidad']);
$inscripcion= strip_tags($_POST['inscripcion']);
$tipocuenta= strip_tags($_POST['tipocuenta']);
$tipoasistente= strip_tags($_POST['tipoasistente']);

$query = mysql_query('CALL addnewperson("'.$name.'","'.$cedula.'","'.$apellido1.'","'.$email.'","'.$ano.'","'.$telefono.'","'.$genero.'","'.$talla.'","'.$peso.'","'.$asociacion.'","'.$celular.'");') or die ("problema al llamar el SP");
$entro=@mysql_fetch_row($query);

$query = mysql_query('CALL addnewdirectionperson("'.$cedula.'","'.$provincia.'","'.$canton.'","'.$distrito.'","'.$region.'");') or die ("problema al llamar el SP");
$entro=@mysql_fetch_row($query);

$query = mysql_query('CALL addtrainer("'.$cedula.'"');
$entro=@mysql_fetch_row($query);
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/homepage/solicitudRegistro.html">
/*
if($entro[0]==$usuario)
{
	setcookie('logueado',"yes");
	setcookie('usuario',$usuario);
	setcookie('vengode',"login");
	echo"<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/homepage/solicitudRegistro.html'> " ;
}
else
{
	setcookie('logueado',"no");
	setcookie('usuario',"");
	setcookie('vengode',"login");
	echo"<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/'> " ;
}
*/
mysql_close($conexion);
?>
</body>
</html>
