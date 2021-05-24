<?php

session_start();

$conn=mysqli_connect("localhost","root","","sitoweb") or die("Errore: ".mysqli_connect_error());
$titolo=mysqli_real_escape_string($conn,$_POST["titolo"]);
$query1="SELECT id from contenuti where titolo='".$titolo."' ";
$res1=mysqli_query($conn,$query1);
$id_titoli=mysqli_fetch_assoc($res1);
$id_titolo=$id_titoli['id'];
$username=mysqli_real_escape_string($conn,$_SESSION["username"]);
$query2="SELECT id from utenti where username='".$username."' ";
$res2=mysqli_query($conn,$query2);
$id_utenti=mysqli_fetch_assoc($res2);
$id_utente=$id_utenti['id'];
$query3="DELETE from preferiti_utenti where id_contenuto=$id_titolo and id_utente=$id_utente";
mysqli_query($conn,$query3);
mysqli_close($conn);



?>