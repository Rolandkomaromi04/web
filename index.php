<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Beadando.css">
  <title>Fecske Idősek Otthona</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }
    .header {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      background-color: #007bff;
      color: black;
    }
    .header__title {
      font-size: 2rem;
      margin-bottom: 20px;
    }
    .header__nav {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }
    .header__list {
      display: flex;
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .header__item {
      margin: 0 10px;
    }
    .header__link {
      color: black;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .header__link:hover {
      color: #0056b3;
    }
    .main {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      margin-top: 5vh;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .intro__title {
      font-size: 1.5rem;
      margin-bottom: 20px;
      text-align: center;
    }
    .intro__text {
      font-size: 1.2rem;
      margin-bottom: 10px;
      text-align: center;
    }
    .intro__list {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .intro__item {
      font-size: 1.2rem;
      margin-bottom: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="header__login">
      
    </div>
    <h1 class="header__title">Üdvözöljük a Fecske Idősek Otthonánál</h1>
    <nav class="header__nav">
      <ul class="header__list">
        <li class="header__item"><a href="gondozottak.php" class="header__link">Gondozottak</a></li>
        <li class="header__item"><a href="elerhetoseg.php" class="header__link">Elérhetőség</a></li>
        <li class="header__item"><a href="belepes.php" class="header__link">Belépés</a></li>
        <li class="header__item"><a href="regisztralas.php" class="header__link">Regisztráció</a></li>
      </ul>
    </nav>
  </header>
  <main class="main">
    <section class="intro">
      <h3 class="intro__title">Az Idősek Otthona egy meleg és gondoskodó közösség, ahol az idősebb generáció tagjai otthonra találhatnak. Célunk, hogy biztonságos és kényelmes környezetet teremtsünk minden lakónk számára.</h3>
      <p class="intro__text">Miért minket válasszon?</p>
      <ul class="intro__list">
        <li class="intro__item">Tapasztalt és empatikus személyzet: Képzett gondozóink mindig itt vannak, hogy segítsenek.</li>
        <li class="intro__item">Komfortos környezet: Modern és tágas szobáinkban mindenki megtalálja a maga helyét.</li>
        <li class="intro__item">Szabadidős tevékenységek: Kulturális programok, tornaórák, kertészkedés – mindent megtalál, ami boldoggá teszi.</li>
        <li class="intro__item">Egészséges étkezés: Finom és tápláló ételek, amelyek az egészség és jó közérzet alapját képezik.</li>
      </ul>
    </section>
  </main>
</body>
</html>