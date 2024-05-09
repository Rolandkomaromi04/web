<?php
session_start();
require_once 'config.php'; // Az adatbázis kapcsolatot tartalmazó fájl elérési útja
if (isset($_SESSION['username'])) {
    echo '<div style="background-color: rgba(255, 0, 0, 0.5); padding: 20px; color: white; text-align: center; font-size: 24px;">Már be vagy regisztrálva!<br><br><a href="../fooldal/index.php" style="background-color: #007bff; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Vissza a főoldalra</a></div>';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Felhasználótól kapott adatok feldolgozása
    $felhasználónév = $_POST['felhasználónév'];
    $email = $_POST['email'];
    $jelszó = $_POST['jelszó'];

    // Ellenőrizzük, hogy a felhasználónév és az e-mail egyediek legyenek
    $stmt = $conn->prepare("SELECT ID FROM regisztrálni WHERE felhasználónév = ? OR email = ?");
    $stmt->bind_param("ss", $felhasználónév, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        // Ha a felhasználónév vagy az e-mail már foglalt, hibaüzenet
        echo "A felhasználónév vagy az e-mail már foglalt.";
        exit();
    }

    // Jelszó hashelése
    $hashed_password = password_hash($jelszó, PASSWORD_DEFAULT);

    // Felhasználó létrehozása
    $stmt = $conn->prepare("INSERT INTO regisztrálni (felhasználónév, email, jelszó) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $felhasználónév, $email, $hashed_password);
    
    if ($stmt->execute()) {
        // Sikeres regisztráció után irányítás a bejelentkezési oldalra
        header("Location: belepes.php");
        exit();
    } else {
        echo "Hiba történt a regisztráció során.";
    }

    $stmt->close();
}
?>




<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #e6f2ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .content {
            background-color: white;
            padding: 60px;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .content h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .content form {
            display: flex;
            flex-direction: column;
        }
        .content label {
            margin-bottom: 5px;
        }
        .content input[type="text"], .content input[type="email"], .content input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid gray;
        }
        .content button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
}
    </style>

    <script src="script.js" defer></script>
    <title>Regisztráció</title>
</head>
<body>
</div>
    <div class="content">
    <h1>Regisztráció</h1>
    <form action="regisztral.php" method="post">
            <label for="felhasználónév">Felhasználónév:</label>
            <input type="text" id="felhasználónév" name="felhasználónév" required>

            <label for="email">E-mail cím:</label>
            <input type="email" id="email" name="email" required>

            <label for="jelszó">Jelszó:</label>
            <input type="password" id="jelszó" name="jelszó" required>

            <button type="submit" name="register">Regisztráció</button>
        </form>
        <a href="index.php" class="back-button">Vissza a főoldalra</a>
</div>
</body>
</html>
