<?php 

session_start();

if(isset($_POST['titolo'])){

$id_contenuto=array();
$id_utente=array();    
$conn=mysqli_connect("localhost","root","","sitoweb") or die("Errore: ".mysqli_connect_error());
$titolo=mysqli_real_escape_string($conn,$_POST['titolo']);
$query1="SELECT id FROM contenuti where titolo='".$titolo."' ";
$res1=mysqli_query($conn,$query1);
$id_contenuto=mysqli_fetch_assoc($res1);
$id2=$id_contenuto['id'];
$username=mysqli_real_escape_string($conn,$_SESSION["username"]);
$query2="SELECT id FROM utenti where username='".$username."' ";
$res2=mysqli_query($conn,$query2);
$id_utente=mysqli_fetch_assoc($res2);
$id1=$id_utente['id'];
$query3="INSERT into preferiti_utenti(id_utente,id_contenuto) values('$id1','$id2')";
$res3=mysqli_query($conn,$query3);
if($res3){
    echo "Caricamento nel database preferiti avvenuto con successo";
} else echo "Caricamento nel database preferiti fallito";
mysqli_close($conn);
}
?>
