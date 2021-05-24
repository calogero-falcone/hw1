<?php 
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}
?>

<html>
    <head>
    <title>The Wellness House</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./styles/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <script src="./scripts/home.js" defer></script>
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
        <h1 class="titolo">The Wellness House</h1>
        <h1 class="sottotitolo">Mantieniti in forma con noi!</h1>
        <span id="intro">VVV Dai un'occhiata ai nostri corsi! VVV</span>   
        </header>
        <article class='hidden a_preferiti'>
            <h1>I tuoi preferiti:</h1>
            <section></section>
        </article>
        <article class='a_ricerca'>
            <span id='scritta_ricerca'>Cerca: </span>
            <input type='text'>
        </article>
        <article class='a_main'></article>
        <footer>
                <p>
                    <img src="./images/logo_unict.png">
                    <span class="matricola">Calogero Falcone (O46002276)</span>
                    <span class="università">Università degli Studi di Catania</span>
                </p>
        </footer>
  </body>
</html>