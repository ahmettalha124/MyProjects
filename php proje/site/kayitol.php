<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="kayitol">
    <section class="register">
        <div class="containerkayit">
            <h2>Kayıt Ol</h2>
            <form action="kayitol.php" method="post">
            
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">E-posta:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirm-password">Şifreyi Onayla:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>

                <button type="submit">Kayıt Ol</button>
                <p>Zaten hesabınız var mı? <a href="girisyap.php">Giriş Yap!</a></p>
            </form>
        </div>
    </section>
    <?php
    
    include 'database.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

      
        $query = "SELECT * FROM kullanicilar WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Bu kullanıcı adı veya e-posta zaten kayıtlı.";
        } else {
           
            $insertQuery = "INSERT INTO kullanicilar (username, password, email) VALUES (?, ?, ?)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bind_param("sss", $username, $password, $email);
            
            if ($insertStmt->execute()) {
                echo "Kayıt başarıyla oluşturuldu!";
            } else {
                echo "Hata: " . $conn->error;
            }
        }
    }
    ?>
</body>
</html>
