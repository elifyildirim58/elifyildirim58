<?php
header('Content-Type: application/json');


// Veritabanı bağlantı bilgileri
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hailey_db";


// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);


// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// JSON formatında gelen veriyi al
$data = json_decode(file_get_contents('php://input'), true);


if (isset($data['imageId']) && isset($data['category'])) {
    $imageId = $data['imageId'];
    $category = $data['category'];


    // Tıklanma sayısını güncelle
    $sql = "INSERT INTO hailey_tiklanmalar (image_id, category, click_count) VALUES ('$imageId', '$category', 1)
            ON DUPLICATE KEY UPDATE click_count = click_count + 1";


    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Tıklanma sayısı güncellendi.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Veritabanı hatası: ' . $conn->error]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Geçersiz veri.']);
}


$conn->close();
?>



