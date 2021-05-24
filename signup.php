<html>
<head>
    <title>Registrati</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/signup.css">
    <script src='./scripts/signup.js' defer></script>
</head>
<body>
<div id="container">
<h1>The Wellness House - Registrati</h1>
    <form method="post">
    <label>Username <input name="username" type="text"></label>
    <label>Password <input name="password" type="password"></label>
    <label>Conferma password <input name="conferma_password" type="password"></label>
    <input type="submit" value="Registrati" id="submit">
    </form>
    <div class='invalid hidden' id='car_min'>La password deve contenere minimo 8 caratteri.</div>
    <div class='invalid hidden' id='car_spec'>La password deve contenere almeno uno tra i seguenti caratteri speciali: _ * – + ! ? , : ;</div>
    <div class='invalid hidden' id='conf_pw'>Le password immesse non coincidono.</div>
    <div class='invalid hidden' id='compila'>Compila tutti i campi.</div>
    <div class='invalid hidden' id='presente'>Username giá in uso.</div>
    <div class='invalid' id='invalid'>
    <?php 
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["conferma_password"])){
    $error=array();

    $conn=mysqli_connect("localhost","root","","sitoweb") or die("Errore: ".mysqli_connect_error());
    $username=mysqli_real_escape_string($conn,$_POST["username"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);
    $hashpw=hash('sha256', $password);
    $crypted_pw=base64_encode($hashpw);
    $query = "INSERT into utenti(username,password) values('$username','$crypted_pw')";
    
    if(strlen($_POST["password"])<8){
        $error[]="La password deve contenere minimo 8 caratteri.";
    }

    if(strcmp($_POST["password"],$_POST["conferma_password"])!==0){
        $error[]="Le password immesse non coincidono.";
    }

    if(count($error)==0){
    $res=mysqli_query($conn,$query);
    if($res){
        echo "Utente registrato!";
    }
    else echo "Errore registrazione.";
    }else for($i=0;$i<count($error);$i++){
        echo $error[$i]."\n";
    }
    mysqli_close($conn);
}
?>
</div>
<div>
<span>Hai giá un account?</span>
<a href="login.php">Accedi</a>
</div>
</body>
</html>