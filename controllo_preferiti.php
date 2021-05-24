<?php
session_start();
$id_utenti=array();
$titoli_preferiti=array();
$conn=mysqli_connect("localhost","root","","sitoweb") or die("Errore: ".mysqli_connect_error());
$username=mysqli_real_escape_string($conn,$_SESSION["username"]);
$query1="SELECT id FROM utenti where username='".$username."' ";
$res1=mysqli_query($conn,$query1);
$id_utenti=mysqli_fetch_assoc($res1);
$id_utente=$id_utenti['id'];
$query2="SELECT id_contenuto FROM preferiti_utenti where id_utente=$id_utente ";
$res2=mysqli_query($conn,$query2);
while($row=mysqli_fetch_assoc($res2)){
$id_query=$row["id_contenuto"];
$query3="SELECT titolo,immagine FROM contenuti where id=$id_query ";
$res3=mysqli_query($conn,$query3);
while($row2=mysqli_fetch_assoc($res3)){
    $titoli_preferiti[]=$row2;
}
}
echo json_encode($titoli_preferiti);
mysqli_close($conn);
 ?>