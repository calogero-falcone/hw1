<?php
$nomi=array();
 $conn=mysqli_connect("localhost","root","","sitoweb") or die("Errore: ".mysqli_connect_error());
 $query = "SELECT username FROM utenti";
 $res=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($res)){
$nomi[]=$row;
}

echo json_encode($nomi);
mysqli_close($conn);
?>