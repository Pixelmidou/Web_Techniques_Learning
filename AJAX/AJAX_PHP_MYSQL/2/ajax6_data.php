<?php
$con = new mysqli("localhost","root","","dvmais");
if (isset($_POST["choice"])) {
    $choice = $_POST["choice"];
    $query = $con -> prepare("SELECT cinemp,nomprenom,grade,etatcivil,diplome,dateemb FROM employe WHERE codeser = ?");
    $query -> bind_param("s", $choice);
    $query -> execute();
    $res = $query -> get_result();
    $arr = $res -> fetch_all(MYSQLI_NUM);
    if (mysqli_num_rows($res)) {
        echo json_encode($arr);
    } else if ($choice == "0") {
        echo "0";
    } else {
        echo "nope";
    }
}
?>