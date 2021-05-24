<?php
session_start();
$id_utenti=array();
$esercizi=array();
$conn=mysqli_connect("localhost","root","","sitoweb") or die("Errore: ".mysqli_connect_error());
$username=mysqli_real_escape_string($conn,$_SESSION["username"]);
$query1="SELECT id FROM utenti where username='".$username."' ";
$res1=mysqli_query($conn,$query1);
$id_utenti=mysqli_fetch_assoc($res1);
$id_utente=$id_utenti['id'];
$query2="SELECT esercizio FROM scheda where id_utente=$id_utente ";
$res2=mysqli_query($conn,$query2);
while($row=mysqli_fetch_assoc($res2)){
$esercizi[]=$row;
}
echo json_encode($esercizi);
mysqli_close($conn);
 ?>