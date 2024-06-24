<?php
include("baglanti.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ad = $_POST["ad"];
    $soyad = $_POST["soyad"];
    $mail = $_POST["mail"];
    $sifre = $_POST["sifre"];

    // Debugging için POST verilerini ekrana yazdırın
    echo "Received POST data: <br>";
    echo "Ad: $ad<br>";
    echo "Soyad: $soyad<br>";
    echo "Mail: $mail<br>";
    echo "Sifre: $sifre<br>";

    // Prepared statement ile veritabanına güvenli şekilde veri ekleme
    $sql = "INSERT INTO kullanicilar (ad, soyad, mail, sifre) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($baglanti, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $ad, $soyad, $mail, $sifre);

        if (mysqli_stmt_execute($stmt)) {
            echo "Kayıt eklendi<br>";
            header("Location:zendaya_en_cok_tiklanan.html");
            exit();
        } else {
            echo "Kayıt eklenemedi: " . mysqli_stmt_error($stmt) . "<br>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Sorgu hazırlanamıyor: " . mysqli_error($baglanti) . "<br>";
    }

    mysqli_close($baglanti);
} else {
    echo "POST verisi gelmedi<br>";
}
?>
