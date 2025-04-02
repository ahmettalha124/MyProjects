<?php
session_start(); 

include 'database.php';


if (!isset($_SESSION['kullanici_id'])) {
    header("Location: girisyap.php");
    exit;
}

$kullanici_id = $_SESSION['kullanici_id']; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ad_soyad = $_POST['adSoyad'];
    $giris_tarihi = $_POST['girisTarihi'];
    $cikis_tarihi = $_POST['cikisTarihi'];
    $oda_turu = $_POST['odaTipi'];

   
    if ($giris_tarihi >= $cikis_tarihi) {
        echo "<script>alert('Giriş tarihi çıkış tarihinden önce olmalıdır.');</script>";
        exit;
    }

   
    $query = "INSERT INTO rezervasyonlar (kullanici_id, ad_soyad, giris_tarihi, cikis_tarihi, oda_turu) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
       
        $stmt->bind_param("issss", $kullanici_id, $ad_soyad, $giris_tarihi, $cikis_tarihi, $oda_turu);

       
        if ($stmt->execute()) {
            echo "<script>alert('Rezervasyon başarılı!');</script>";
        } else {
         
            echo "<script>alert('Rezervasyon sırasında bir hata oluştu: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
       
        echo "<script>alert('SQL sorgusu hazırlanırken bir hata oluştu: " . $conn->error . "');</script>";
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervasyon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="rezervasyon">
    <header class="navbar">
        <div class="logo">
            <a href="anasayfa.php">MenHotel</a>
        </div>
        <ul>
            <li><a href="anasayfa.php">Ana Sayfa</a></li>
            <li><a href="rezervasyon.php">Rezervasyon</a></li>
            <li><a href="girisyap.php">Çıkış Yap</a></li>
        </ul>
    </header>
    
    <div class="rezervasyon-sidebar">
        <h2>Rezervasyon Yap</h2>
        <p>MenHotel'in şık ve konforlu odalarından birinde kalmak için hemen rezervasyon yapın.</p>
        <form class="rezervasyon-form" id="rezervasyonForm" method="POST">
            <label for="adSoyad">Ad Soyad</label>
            <input type="text" id="adSoyad" name="adSoyad" placeholder="Adınızı ve soyadınızı girin" required>

            <label for="email">E-posta</label>
            <input type="email" id="email" name="email" placeholder="E-posta adresinizi girin" required>

            <label for="telefon">Telefon</label>
            <input type="tel" id="telefon" name="telefon" placeholder="Telefon numaranızı girin" required>

            <label for="girisTarihi">Giriş Tarihi</label>
            <input type="date" id="girisTarihi" name="girisTarihi" required>

            <label for="cikisTarihi">Çıkış Tarihi</label>
            <input type="date" id="cikisTarihi" name="cikisTarihi" required>

            <label for="odaTipi">Oda Tipi</label>
            <select id="odaTipi" name="odaTipi" required>
                <option value="tek_kisilik">Tek Kişilik</option>
                <option value="cift_kisilik">Çift Kişilik</option>
                <option value="suit">Suit</option>
                <option value="king_suit">King Suit</option>
            </select>

            <button type="submit" class="submit-btn">Rezervasyon Yap</button>
        </form>
    </div>
</body>
</html>
