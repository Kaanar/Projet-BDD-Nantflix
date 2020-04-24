<?php

//C'est la page de connexion à notre BDD. On va "l'include" à chaque fois que l'on aura besoin d'intéragir avec la BDD//

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname='nantflix';
// Creation de la connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
mysqli_set_charset($conn, 'utf8');

// Confirmation de la connection
if (!$conn)
{
     die("Connection failed: " . mysqli_error($conn));
}
?>