<?php
$url = 'https://newsapi.org/v2/everything?q=bitcoin&apiKey=46333f35617f4517acb09d60e6e5af02';
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0',
    CURLOPT_RETURNTRANSFER => true
]);
$berita = curl_exec($curl);
$beritaArrPhp = json_decode($berita, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 100vw;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <img src="<?= $beritaArrPhp['articles'][$_GET['urutan'] - 1]['urlToImage'] ?>" alt="">
    <h1><?= $beritaArrPhp['articles'][$_GET['urutan'] - 1]['title'] ?></h1>
    <p>Ditulis oleh <?= $beritaArrPhp['articles'][$_GET['urutan'] - 1]['author'] ?></p>
    <p><?= $beritaArrPhp['articles'][$_GET['urutan'] - 1]['publishedAt'] ?></p>
    <p><?= $beritaArrPhp['articles'][$_GET['urutan'] - 1]['content'] ?></p>
</body>

</html>