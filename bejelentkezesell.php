<?php
session_start();
require_once 'config.php';

// Ellenőrizzük, hogy az űrlapot elküldték-e
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ellenőrizzük a felhasználónév és jelszó helyességét
    $felhasználónév = $_POST['felhasználónév'];
    $jelszó= $_POST['jelszó'];

    // Ellenőrizzük az adatbázisban
    $sql = "SELECT ID, felhasználónév, jelszó FROM regisztrálni WHERE felhasználónév = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $felhasználónév);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($jelszó, $row['jelszó'])) {
            // Sikeres bejelentkezés, beállítjuk a session változókat
            $_SESSION['felhasználónév_ID'] = $row['ID']; // Felhasználó azonosítója
            $_SESSION['felhasználónév'] = $username; // Felhasználó neve
            header('Location: index.php');
            exit();
        } else {
            // Hibás jelszó
            echo '<div style="background-color: #ffcccc; padding: 10px;">Hibás felhasználónév vagy jelszó!</div>';
        }
    } else {
        // Hibás felhasználónév
        echo '<div style="background-color: #ffcccc; padding: 10px;">Hibás felhasználónév vagy jelszó!</div>';
    }

    $stmt->close();
} else {
    // Ha nem POST kérés érkezett, valami nincs rendben
    echo '<div style="background-color: #ffcccc; padding: 10px;">Hiba történt a bejelentkezés során.</div>';
}

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    
</head>
<body>
    <div style="text-align: center;">
        <!-- Egy egyszerű vissza gomb a login.php-ra -->
        <a href="belepes.php" class="back-button">Vissza a bejelentkezéshez</a>
    </div>
</body>

</html>