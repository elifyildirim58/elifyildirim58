<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moda_veritabani";

// Bağlantı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}

$sql = "SELECT urun_adi, tiklanma_sayisi, fotograf_url FROM Fotograflar ORDER BY tiklanma_sayisi DESC LIMIT 3";
$result = $conn->query($sql);

$photos = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $photos[] = $row;
    }
}
$conn->close();

echo json_encode($photos);
?>
