<html>
<head>
    <title>Accedi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/login.css">
</head>
<body>    
<div id="container">
    <h1>The Wellness House - Accedi</h1>
    <form method="post">
    <label>Username <input name="username" type="text"></label>
    <label>Password <input name="password" type="password"></label>
    <input type="submit" value="Accedi" id="submit">
</form>
<div class='invalid'>
<?php 

session_start();
if(isset($_SESSION["username"])){
    header("Location: home.php");
    exit;
}

if(isset($_POST["username"]) && isset($_POST["password"])){
    $conn=mysqli_connect("localhost","root","","sitoweb") or die("Errore: ".mysqli_connect_error());
    $username=mysqli_real_escape_string($conn,$_POST["username"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);
    $hashpw=hash('sha256', $password);
    $crypted_pw=base64_encode($hashpw);
    $query = "SELECT * FROM utenti WHERE username= '".$username."' AND password='".$crypted_pw."'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)>0){
        $_SESSION["username"]=$_POST["username"];
        header("Location: home.php");
        exit;
    }
    else echo "Credenziali non valide.";
    mysqli_close($conn);
}
?>
</div>
<div>
<span>Non sei registrato? Fallo adesso!</span>
<a href="signup.php">Registrati</a>
</div>
</body>
</html>