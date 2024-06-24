<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "songkang_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['data-id'])) {
    $resim_id = $_POST['data-id'];
    
    // Check if the record exists
    $sql = "SELECT * FROM songkang_tiklanma WHERE resim_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $resim_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Update the click count
        $sql = "UPDATE songkang_tiklanma SET tiklanma_sayisi = tiklanma_sayisi + 1 WHERE resim_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $resim_id);
    } else {
        // Insert a new record
        $sql = "INSERT INTO songkang_tiklanma (resim_id, tiklanma_sayisi) VALUES (?, 1)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $resim_id);
    }
    
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>
