<?php
session_start();
include 'database.php';


if (!isset($_SESSION['admin_id'])) {
    header("Location: admingiris.php");
    exit;
}


$query = "SELECT r.id, r.giris_tarihi, r.cikis_tarihi, r.oda_turu, k.username
          FROM rezervasyonlar r
          JOIN kullanicilar k ON r.kullanici_id = k.id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="adminpanel">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo">
            <a href="adminpanel.php" class="navbar-logo">Admin Paneli</a>
            </div>
            <ul>
                <li><a href="cikisyap.php" class="navbar-logout">Çıkış Yap</a></li>
            </ul>
        </div>
    </nav>

   
    <div class="admin-panel-content">
        <h2>Hoş geldiniz, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        
        <h3>Rezervasyonlar</h3>
        <table>
            <thead>
                <tr>
                    <th>Rezervasyon ID</th>
                    <th>Kullanıcı</th>
                    <th>Giriş Tarihi</th>
                    <th>Çıkış Tarihi</th>
                    <th>Oda Tipi</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo $row['giris_tarihi']; ?></td>
                        <td><?php echo $row['cikis_tarihi']; ?></td>
                        <td><?php echo $row['oda_turu']; ?></td>
                        <td>
                            <a href="rezervasyonsil.php?id=<?php echo $row['id']; ?>">Sil</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
