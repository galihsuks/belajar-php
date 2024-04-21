<?php
require_once "../db.php";
global $conn;

if (isset($_GET['id'])) {
    $sql = "DELETE FROM todolist WHERE id=" . $_GET['id'];
    $query = mysqli_query($conn, $sql) or die("Gagal delete task " . mysqli_error($conn));
    $data_akhir = [
        'status' => 'ok'
    ];
} else {
    $data_akhir = [
        'status' => 'gagal',
        'pesan' => 'Masukan nilai id di parameter URL'
    ];
}

header('Content-Type: application/json');
echo json_encode($data_akhir);
