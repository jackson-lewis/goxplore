<?php

$conn = new mysqli("localhost", "root", "root", "goxplore");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>