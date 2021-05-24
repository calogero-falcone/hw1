<?php

session_start();

$conn=mysqli_connect("localhost","root","","sitoweb") or die("Errore: ".mysqli_connect_error());
$nome=mysqli_real_escape_string($conn,$_POST['nome']);
$username=mysqli_real_escape_string($conn,$_SESSION["username"]);
$query2="SELECT id from utenti where username='".$username."' ";
$res2=mysqli_query($conn,$query2);
$id_utenti=mysqli_fetch_assoc($res2);
$id_utente=$id_utenti['id'];
$query3="DELETE from scheda where id_utente=$id_utente and esercizio='$nome'";
mysqli_query($conn,$query3);
mysqli_close($conn);



?>