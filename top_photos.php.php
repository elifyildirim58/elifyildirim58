<?php
header('Content-Type: application/json');

// Veritabanı bağlantısını yapın
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiklanma";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// En çok tıklanan fotoğrafları seçin
$sql = "SELECT urun_adi, tiklanma_sayisi FROM tiklanmalar ORDER BY tiklanma_sayisi DESC LIMIT 5";
$result = $conn->query($sql);

$topPhotos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $topPhotos[] = $row;
    }
} else {
    // Sonuç yoksa boş bir JSON dizisi döndür
    echo json_encode([]);
    exit;
}

// Sonucu JSON formatına dönüştürerek geri döndür
echo json_encode($topPhotos);

$conn->close();
?>
