<?php
$servername = "localhost";
$username = "tardis";
$password = "tardis123";
$dbname = "results_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}
?>