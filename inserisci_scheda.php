<?php 

session_start();

if(isset($_POST['esercizio'])){
$id_utente=array();    
$conn=mysqli_connect("localhost","root","","sitoweb") or die("Errore: ".mysqli_connect_error());
$esercizio=mysqli_real_escape_string($conn,$_POST['esercizio']);
$username=mysqli_real_escape_string($conn,$_SESSION["username"]);
$query2="SELECT id FROM utenti where username='".$username."' ";
$res2=mysqli_query($conn,$query2);
$id_utente=mysqli_fetch_assoc($res2);
$id=$id_utente['id'];
$query3="INSERT into scheda(id_utente,esercizio) values('$id','$esercizio')";
$res3=mysqli_query($conn,$query3);
if($res3){
    echo "Caricamento nel database preferiti avvenuto con successo";
} else echo "Caricamento nel database preferiti fallito";
mysqli_close($conn);
}
?>