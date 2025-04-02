<?php
session_start();
include 'database.php';

if (isset($_SESSION['admin_id'])) {
    header("Location: adminpanel.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();

    
        if ($password === $admin['password']) { 
           
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];

         
            header("Location: adminpanel.php");
            exit;
        } else {
            $error_message = "Yanlış şifre.";
        }
    } else {
        $error_message = "Böyle bir kullanıcı bulunamadı.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Girişi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="girisyap">
    <section class="login">
        <div class="containergiris">
            <h2>Admin Girişi</h2>
           
            <?php if (isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>

          
            <form action="admingiris.php" method="post">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Giriş Yap</button>
                <p><a href="girisyap.php">Müşteri Girişi</a></p>
            </form>
        </div>
    </section>
</body>
</html>
