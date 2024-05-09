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