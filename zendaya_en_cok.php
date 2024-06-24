<?php
header('Content-Type: application/json');

// Veritabanı bağlantı bilgileri
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zendaya_db";

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Veritabanından en çok tıklanan ilk 5 kategoriyi getir
$sql = "SELECT category FROM zendaya_tiklanmalar ORDER BY click_count DESC LIMIT 6";
$result = $conn->query($sql);

// Sonuçları dizi olarak al
$categories = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $categories[] = $row['category'];
    }
}

// Veritabanı bağlantısını kapat
$conn->close();

// JSON formatında kategorileri döndür
echo json_encode($categories);
?>