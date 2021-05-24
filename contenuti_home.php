<?php
$contenuti=array();
$conn=mysqli_connect("localhost","root","","sitoweb") or die("Errore: ".mysqli_connect_error());
$query="SELECT titolo,immagine,descrizione from contenuti";
$res=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($res)){
    $contenuti[]=$row;
    }
    
    echo json_encode($contenuti);
    mysqli_close($conn);
?>