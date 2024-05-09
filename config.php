<?php
$servername = "localhost";
$username = "fecske";
$password = "NagyKomaromi2024";
$dbname = "fecske";

$menu = array(
    'Főoldal' => '../fooldal/index.php',
    'Űrlap' => '../urlap/urlap.php',
    'Üzeneteid' => '../urlap/messages.php'
);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>