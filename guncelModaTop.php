<?php
header('Content-Type: application/json');
include 'tiklanma.php'; // Veritabanı bağlantı dosyasını dahil edin


$sql = "SELECT urun_adi, tiklanma_sayisi, fotograf_url FROM guncel_moda ORDER BY tiklanma_sayisi DESC LIMIT 3";
$result = mysqli_query($baglanti, $sql);

$topTiklanmalar = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $topTiklanmalar[] = $row;
    }
}

echo json_encode($topTiklanmalar);

mysqli_close($baglanti);
?>