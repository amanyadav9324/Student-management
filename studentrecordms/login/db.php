<!-- Database connection check -->
<?php
$host = "localhost";
$user = "root"; 
$pass = "";     
$db = "college";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
