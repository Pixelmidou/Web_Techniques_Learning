<?php
$con = new mysqli("localhost","root","","bac2013");
$i = $_POST["i"];
$query = $con -> prepare("SELECT * FROM eleve LIMIT ?,1");
$query -> bind_param("i", $i);
$query -> execute();
$res = $query -> get_result();
$arr = $res -> fetch_all(MYSQLI_NUM);
$query2 = $con -> prepare("SELECT count(*) FROM eleve");
$query2 -> execute();
$res2 = $query2 -> get_result();
$arr2 = $res2 -> fetch_array(MYSQLI_NUM);
array_push($arr, $arr2[0]);
echo json_encode($arr);
?>