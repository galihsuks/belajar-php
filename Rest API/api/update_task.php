<?php
require_once "../db.php";
global $conn;

$json = file_get_contents('php://input');
$data_post = json_decode($json, true);

$id_task = $data_post['id'];

if (isset($data_post['deskripsi'])) {
    $deskripsi_task = $data_post['deskripsi'];
    $sql = "UPDATE todolist SET deskripsi='" . $deskripsi_task . "' WHERE id='" . $id_task . "'";
}
if (isset($data_post['status'])) {
    $status_task = $data_post['status'];
    $sql = "UPDATE todolist SET status='" . $status_task . "' WHERE id='" . $id_task . "'";
}
if (isset($data_post['status']) && isset($data_post['deskripsi'])) {
    $deskripsi_task = $data_post['deskripsi'];
    $status_task = $data_post['status'];
    $sql = "UPDATE todolist SET status='" . $status_task . "',deskripsi='" . $deskripsi_task . "' WHERE id='" . $id_task . "'";
}
$query = mysqli_query($conn, $sql) or die("Gagal di update task " . mysqli_error($conn));

$data_akhir = [
    'status' => 'ok'
];

header('Content-Type: application/json');
echo json_encode($data_akhir);
