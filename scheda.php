<?php 
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}
?>

<html>
    <head>
    <title>Creazione scheda di allenamento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./styles/scheda.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <script src="./scripts/scheda.js" defer></script>
    </head>
    <body>
    <header>
            <div id="overlay"></div>
        <nav>
        <div id="flex-cont">
            <a href="home.php">Home</a>
            <a href="scheda.php">Creazione scheda di allenamento</a>
            <a href="calcolo_proteine.php">Calcolo nutrienti</a>
            <span>Bentornato/a, <?php echo $_SESSION["username"];?></span> <a href="logout.php" id="logout">Logout</a>
            <div id="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
            </div>
        </nav>
        <h1>Crea la tua scheda di allenamento online</h1>
        </header>
        <div class="intro">Seleziona uno o più esercizi da aggiungere alla tua scheda</div>
        <article class="main"></article>
        <article class="hidden scheda">
            <h1>La tua scheda:</h1>
            <section></section>
        </article>
        <footer>
                <p>
                    <img src="./images/logo_unict.png">
                    <span class="matricola">Calogero Falcone (O46002276)</span>
                    <span class="università">Università degli Studi di Catania</span>
                </p>
        </footer>
  </body>
</html>