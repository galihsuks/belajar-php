<?php
require_once "../db.php";
global $conn;

$sql = "SELECT * FROM gambar WHERE id=" . $_GET['id'];
$query = mysqli_query($conn, $sql) or die("Error di get gambar " . mysqli_error($conn));
$array = [];
while ($row = mysqli_fetch_assoc($query)) {
    $array[] = $row;
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: image/jpeg');
echo $array[0]['file'];
