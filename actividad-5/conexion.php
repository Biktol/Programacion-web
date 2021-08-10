<?php
$servername = "sql112.epizy.com";
$username = "epiz_29379066";
$password = "ogVpk7jM256D";
$dbname = "epiz_29379066_laboratorio";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
