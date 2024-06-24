<?php
$baglanti = mysqli_connect("localhost", "root", "", "kayit");

// Bağlantı kontrolü
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br>";
    exit();
}
mysqli_set_charset($baglanti, "UTF8");
echo "Veritabanına başarıyla bağlandı<br>";
?>
