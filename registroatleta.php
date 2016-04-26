<html>
<head>
<title>Log-in</title>
</head>
<body>
<?php
$conexion=mysql_connect("localhost","root","root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
mysql_select_db("mydb",$conexion) or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");

$name= strip_tags($_POST['nombre']);
$apellido1= "".strip_tags($_POST['apellido1']). " " . strip_tags($_POST['apellido2']);
$ano= "".strip_tags($_POST['day'])."/".strip_tags($_POST['month'])."/". strip_tags($_POST['ano']);
$cedula= strip_tags($_POST['cedula']);
$countries= strip_tags($_POST['countries']);
$email= strip_tags($_POST['email']);
$celular= "".strip_tags($_POST['telefono']).strip_tags($_POST['celular']);
$provincia=strip_tags($_POST['provincia']);
$canton = strip_tags($_POST['canton']);
$distrito = strip_tags($_POST['distrito']);
$region = strip_tags($_POST['region']);
$asociacion= strip_tags($_POST['asociacion']);
$genero= strip_tags($_POST['genero']);
$talla= strip_tags($_POST['talla']);
$peso= strip_tags($_POST['peso']);
$Lateralidad= strip_tags($_POST['lateralidad']);
$inscripcion= strip_tags($_POST['inscripcion']);
$ce= strip_tags($_POST['ce']);
$grado= strip_tags($_POST['grado']);
//$pulso= strip_tags($_POST['pulso']);
//$vision= strip_tags($_POST['vision']);
//$pupilas= strip_tags($_POST['pupilas']);
//$medico= strip_tags($_POST['medico']);
//
$estatura= strip_tags($_POST['estatura']);
$abuelo= strip_tags($_POST['abuelo']);
$abuela= strip_tags($_POST['abuela']);
$padre= strip_tags($_POST['padre']);
$madre= strip_tags($_POST['madre']);

$query = mysql_query('CALL addnewperson("'.$name.'","'.$cedula.'","'.$apellido1.'","'.$email.'","'.$ano.'","'.$telefono.'","'.$genero.'","'.$talla.'","'.$peso.'","'.$asociacion.'","'.$celular.'","'.$countries.'");') or die ("problema al llamar addperson");
$entro=@mysql_fetch_row($query);
$query = mysql_query('CALL addeducacionatleta("'.$cedula.'","'.$ce.'","'.$grado.'"');
$entro=@mysql_fetch_row($query);
$query = mysql_query('CALL addestaturaatleta("'.$cedula.'","'.$estatura.'","'.$abuelo.'","'.$abuela.'","'.$padre.'","'.$madre.'"');
$entro=@mysql_fetch_row($query);
echo"<script> window.alert('Atleta registrada correctamente'); </script> " ;
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/.html">

mysql_close($conexion);
?>
</body>
</html>
