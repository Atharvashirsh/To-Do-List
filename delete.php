<?php
include 'db_conn.php';
$id = $_GET['id'];
$sql = "DELETE FROM `listitems` WHERE `sno` = '$id'";
$result = mysqli_query($conn, $sql);
header("Location: index.php");