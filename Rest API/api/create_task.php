<?php
require_once "../db.php";
global $conn;

$json = file_get_contents('php://input');
$data_post = json_decode($json, true);

$tanggal = date("Y-m-d H:i:s");
$sql = "INSERT INTO todolist (deskripsi, created_at, status) VALUES ('" . $data_post['deskripsi'] . "','" . $tanggal . "','0')";
$query = mysqli_query($conn, $sql) or die("Error di Insert data " . mysqli_error($conn));
$data_akhir = [
    'status' => 'ok',
    'data' => [
        'deskripsi' => $data_post['deskripsi'],
        'created_at' => $tanggal
    ]
];

header('Content-Type: application/json');
echo json_encode($data_akhir);
