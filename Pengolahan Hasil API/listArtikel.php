<?php
$artikel = [
    [
        'judul' => '7 Tips Cara Membersihkan Mobil Tanpa Lecet',
        'penulis' => 'Galih',
        'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi beatae nulla minima autem aspernatur, expedita velit vel harum dolores praesentium, ipsa vero earum magni nisi.',
        'cover' => 'https://images.unsplash.com/photo-1711639812944-ff9aacbdcd5a?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'tanggal' => '02/03/2023'
    ],
    [
        'judul' => 'Ini Perilaku yang Bisa Membuatmu Malas Belajar',
        'penulis' => 'Sukma Mukti',
        'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi ex exercitationem quia.',
        'cover' => 'https://images.unsplash.com/photo-1682686578456-69ae00b0ecbd?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'tanggal' => '15/04/2023'
    ],
    [
        'judul' => '10 Keajaiban Dunia yang TIdak Masuk Akal',
        'penulis' => 'Sumarno',
        'isi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat dicta quos magni et doloribus!',
        'cover' => 'https://images.unsplash.com/photo-1711645372528-cddb2c6eb565?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
        'tanggal' => '20/03/2024'
    ],
];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 100px;
            aspect-ratio: 1 / 1;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <h1>Artikel Saya</h1>
    <?php foreach ($artikel as $i => $a) { ?>
        <img src="<?= $a['cover']; ?>" alt="">
        <h4><?= $a['judul'] ?></h4>
        <p>Ditulis oleh : <?= $a['penulis'] ?></p>
        <p><?= $a['tanggal'] ?></p>
        <a href="/dasar-program-php/artikel.php?urutan=<?= $i + 1 ?>">Baca Artikel ini</a>
        <hr>
    <?php } ?>
</body>

</html>