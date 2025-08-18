<!-- Database connection check -->
<?php
$host = "localhost";
$user = "root"; 
$pass = "";     
$db = "student";

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
