<?php
require_once "../db.php";
global $conn;

// if (!isset($_GET['key']) || $_GET['key'] != '12345678') {
// }
$headers = apache_request_headers();

if (!isset($headers['sandi']) || $headers['sandi'] != '12345678') {
    $data_akhir = [
        'status' => 'gagal',
        'pesan' => 'key salah atau belum diberikan'
    ];
} else {

    if (isset($_GET['id'])) {
        $sql = "SELECT * FROM todolist WHERE id=" . $_GET['id'];
    } else {
        $sql = "SELECT * FROM todolist";
    }

    $query = mysqli_query($conn, $sql) or die("Error di SELECT All data " . mysqli_error($conn));
    $array = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $kategoriPerBaris = $row['kategori'];
        if ($kategoriPerBaris == '0') {
            $row['kategori'] = 'Tidak ada';
        } else {
            $sql = "SELECT * FROM kategori WHERE id=" . $kategoriPerBaris;
            $queryKategori = mysqli_query($conn, $sql) or die("Error di SELECT kategori " . mysqli_error($conn));
            while ($rowKategori = mysqli_fetch_assoc($queryKategori)) {
                $row['kategori'] = $rowKategori['nama'];
            }
        }

        $gambarPerBaris = $row['gambar'];
        if ($gambarPerBaris == '0') {
            $row['gambar'] = 'Tidak ada gambar';
        } else {
            $row['gambar'] = 'http://localhost/rest-api-php/api/get_gambar.php?id=' . $gambarPerBaris;
        }
        $array[] = $row;
    }

    $data_akhir = [];
    if (count($array) > 0) {
        $data_akhir = [
            'status' => 'ok',
            'data' => $array
        ];
    } else {
        $data_akhir = [
            'status' => 'gagal',
            'pesan' => 'Data tidak ditemukan'
        ];
    }
}
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo json_encode($data_akhir);
