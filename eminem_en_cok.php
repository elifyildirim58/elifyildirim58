<?php
header('Content-Type: application/json');

// Veritabanı bağlantı bilgileri
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eminem_db";

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Veritabanından en çok tıklanan ilk 5 resimi getir
$sql = "SELECT resim_id FROM eminem_tiklanma ORDER BY tiklanma_sayisi DESC LIMIT 6";
$result = $conn->query($sql);

// Sonuçları dizi olarak al
$resim_ids = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $resim_ids[] = $row['resim_id'];
    }
}

// Veritabanı bağlantısını kapat
$conn->close();

// JSON formatında resim id'lerini döndür
echo json_encode($resim_ids);
?>
