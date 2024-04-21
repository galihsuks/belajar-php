<?php
require_once "../db.php";
global $conn;

$gambarnya = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
$sql = "INSERT INTO gambar (file) VALUES ('" . $gambarnya . "')";
$query = mysqli_query($conn, $sql) or die("Error di Insert gambar " . mysqli_error($conn));
$data_akhir = [
    'status' => 'ok',
];

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo json_encode($data_akhir);
