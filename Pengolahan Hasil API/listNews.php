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
            width: 100px;
            aspect-ratio: 1 / 1;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <h1>Berita Saya</h1>
    <?php foreach ($beritaArrPhp['articles'] as $i => $b) { ?>
        <img src="<?= $b['urlToImage']; ?>" alt="">
        <h4><?= $b['title'] ?></h4>
        <p>Ditulis oleh : <?= $b['author'] ?></p>
        <p><?= $b['publishedAt'] ?></p>
        <a href="/dasar-program-php/news.php?urutan=<?= $i + 1 ?>">Baca Artikel ini</a>
        <hr>
    <?php } ?>
</body>

</html>