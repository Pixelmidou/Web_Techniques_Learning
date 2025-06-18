<?php
$con = new mysqli("localhost","root","","mn3rfch");
$query = $con -> prepare("SELECT * FROM abonne");
$query -> execute();
$query = $query -> get_result();
$query = $query -> fetch_all(MYSQLI_ASSOC);
echo json_encode($query);
?>