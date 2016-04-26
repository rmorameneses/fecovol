<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT nombreusuario FROM usuario where idUsuario =";
$result = $conn->query($sql . $_get['id']); //agregar id del usuario al path desde que hace login

if ($result->num_rows > 0) {
    // output data of each row  
        echo "Name: " . $row["nombreusuario"]. "<br>";
  
} else {
    echo "0 results";
}
$conn->close();
?>