<?php

$esercizi=array();
$conn=mysqli_connect("localhost","root","","sitoweb") or die("Errore: ".mysqli_connect_error());
$query="SELECT nome,descrizione from esercizi";
$res=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($res)){
    $esercizi[]=$row;
    }
    
    echo json_encode($esercizi);
    mysqli_close($conn);

?>