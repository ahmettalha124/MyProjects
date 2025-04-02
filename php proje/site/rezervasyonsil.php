<?php
session_start();
include 'database.php';



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM rezervasyonlar WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<p>Rezervasyon başarıyla silindi.</p>";
    } else {
        echo "<p>Bir hata oluştu.</p>";
    }

    $stmt->close();
    $conn->close();
    header("Location: adminpanel.php");  
    exit;
}
?>
