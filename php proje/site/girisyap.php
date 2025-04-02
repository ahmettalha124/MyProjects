<?php
session_start(); 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $query = "SELECT id, username, password FROM kullanicilar WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

       
        if (password_verify($password, $user['password'])) {
           
            $_SESSION['kullanici_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

           
            session_regenerate_id(true);

           
            header("Location: anasayfa.php");
            exit;
        } else {
            
            echo "<p style='color: white;'>Şifre hatalı!</p>";
        }
    } else {
       
        echo "<p style='color: white;'>Kullanıcı adı bulunamadı!</p>";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="girisyap">
    <section class="login">
        <div class="containergiris">
            <h2>Giriş Yap</h2>
            
            <form action="" method="post">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Giriş Yap</button>

                <p>Hesabın yok mu? <a href="kayitol.php">Kayıt Ol!</a><br>
                <a href="admingiris.php">Admin Girişi</a>
                </p>
            </form>
        </div>
    </section>
</body>
</html>
