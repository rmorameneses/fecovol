<html>
<head>
  <title>Log-in</title>
</head>
<body>
<?php
$conexion=mysql_connect("localhost","root","root") or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");
mysql_select_db("mydb",$conexion)  or die("<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/error.php'> ");

$name= strip_tags($_POST['nombre']);
$apellido1= "".strip_tags($_POST['apellido1']). " " . strip_tags($_POST['apellido2']);
$ano= "".strip_tags($_POST['day'])."/".strip_tags($_POST['month'])."/". strip_tags($_POST['ano']);
$cedula= strip_tags($_POST['cedula']);
$countries= strip_tags($_POST['countries']);
$provincia=strip_tags($_POST['provincia']);
$canton = strip_tags($_POST['canton']);
$distrito = strip_tags($_POST['distrito']);
$region = strip_tags($_POST['region']);
$email= strip_tags($_POST['email']);
$celular= strip_tags($_POST['celular']);
$telefono= strip_tags($_POST['telefono']);
$asociacion= strip_tags($_POST['asociacion']);
// IN ide INT, IN nom varchar(50),IN ced varchar(50), IN ape varchar(50), IN cor varchar(50), IN fn varchar(50), IN telef varchar(50), IN gener varchar(50), IN tall varchar(50),  IN pes varchar(50), IN asoc varchar(50) ,IN contemerg varchar(50), IN nac varchar(70), IN prov varchar(50), IN cant varchar(50), IN dist varchar(50), IN reg varchar(50))
$query = mysql_query('CALL actualizarpersona("'.$name.'","'.$cedula.'","'.$apellido1.'","'.$email.'","'.$ano.'","'.$telefono.'","'.$genero.'","'.$talla.'","'.$peso.'","'.$asociacion.'","'.$direccion.'","'.$celular.'","' .countries.'");') or die ("problema al llamar el SP");
$entro=@mysql_fetch_row($query);
echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=http://localhost/homepage/miPerfil.html">
  mysql_close($conexion);
?>
</body>
</html>