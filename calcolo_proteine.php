<?php 
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}
?>

<html>
    <head>
    <title>Calcolo nutrienti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./styles/calcolo_proteine.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <script src="./scripts/calcolo_proteine.js" defer></script>
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
        <h1>Calcola i nutrienti dei cibi qui!</h1>
        </header>
        <article class="main2">
            <h1>L'alimentazione è parte fondamentale di uno stile di vita sano!</h1>
            <span id="sottotitolo"> In particolare, le proteine giocano un ruolo fondamentale
                nella dieta di una persona che vuole tenersi in forma. Ma occhio alle calorie!</span>
            
                <form id="cerca_contenuto">
                <label>Digita il nome del cibo di cui vuoi conoscere l'apporto proteico: <input name="query"type="text" id="cerca"></label>
                <label>&nbsp;<input type="submit" id="submit"></label>
            </form>
            <section id="view" class="hidden">
            </section>
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