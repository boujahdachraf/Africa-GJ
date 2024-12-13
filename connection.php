<?php
$host = 'localhost';
$dbname = 'Africa GJ';
$username = 'root';
$password = '';

// Créer la connexion MySQLi
$connectdata = mysqli_connect($host, $username, $password, $dbname);
if ($connectdata->connect_error) {
    die("Échec de la connexion : " . $mysqli->connect_error);
} 
  ?>
