<?php
$con = new mysqli("localhost","root","","bac2013");
$i = $_POST["i"];
$query = $con -> prepare("SELECT * FROM eleve LIMIT 0,?");
$query -> bind_param("i", $i);
$query -> execute();
$res = $query -> get_result();
$arr = $res -> fetch_all(MYSQLI_NUM);
echo json_encode($arr);
?>