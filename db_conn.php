<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = "todo";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo "<h1> Not Connected to server </h1>";
}