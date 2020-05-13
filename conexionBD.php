<?php
$conn = new mysqli("localhost", "root", "", "database_rav_web");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error)."<br>";
}
?>