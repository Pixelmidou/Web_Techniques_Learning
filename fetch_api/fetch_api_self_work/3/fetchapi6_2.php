<?php
$con = new mysqli("localhost","root","","test");
if (isset($_POST["i"]) && isset($_POST["j"])) {
    $i = $_POST["i"];
    $j = $_POST["j"];
    $query_count = $con -> prepare("SELECT count(*) FROM eleve");
    $query_count -> execute();
    $resc = $query_count -> get_result();
    $arrc = $resc -> fetch_all(MYSQLI_NUM);
    $query_def = $con -> prepare("SELECT * FROM eleve LIMIT ?,2");
    $query_asc = $con -> prepare("SELECT numero,nomprenom,datenais,moyenne FROM eleve ORDER BY ? ASC LIMIT ?,2");
    $query_desc = $con -> prepare("SELECT numero,nomprenom,datenais,moyenne FROM eleve ORDER BY ? DESC LIMIT ?,2");
    switch ($j) {
        case "0":
            $query_def -> bind_param("i", $i);
            $query_def -> execute();
            $resx = $query_def -> get_result();
            $arrx = $resx -> fetch_all(MYSQLI_NUM);
            array_push($arrx, $arrc[0]);
            echo json_encode($arrx);
            exit;
        case "1":
            $y = 1;
            $query_desc -> bind_param("ii", $y, $i);
            $query_desc -> execute();
            $resx = $query_desc -> get_result();
            $arrx = $resx -> fetch_all(MYSQLI_NUM);
            array_push($arrx, $arrc[0]);
            echo json_encode($arrx);
            exit;
        case "2":
            $y = 2;
            $query_asc -> bind_param("ii", $y, $i);
            $query_asc -> execute();
            $resx = $query_asc -> get_result();
            $arrx = $resx -> fetch_all(MYSQLI_NUM);
            array_push($arrx, $arrc[0]);
            echo json_encode($arrx);
            exit;
        case "3":
            $y = 2;
            $query_desc -> bind_param("ii", $y, $i);
            $query_desc -> execute();
            $resx = $query_desc -> get_result();
            $arrx = $resx -> fetch_all(MYSQLI_NUM);
            array_push($arrx, $arrc[0]);
            echo json_encode($arrx);
            exit;
        case "4":
            $y = 3;
            $query_asc -> bind_param("ii", $y, $i);
            $query_asc -> execute();
            $resx = $query_asc -> get_result();
            $arrx = $resx -> fetch_all(MYSQLI_NUM);
            array_push($arrx, $arrc[0]);
            echo json_encode($arrx);
            exit;
        case "5":
            $y = 3;
            $query_desc -> bind_param("ii", $y, $i);
            $query_desc -> execute();
            $resx = $query_desc -> get_result();
            $arrx = $resx -> fetch_all(MYSQLI_NUM);
            array_push($arrx, $arrc[0]);
            echo json_encode($arrx);
            exit;
        case "6":
            $y = 4;
            $query_asc -> bind_param("ii", $y, $i);
            $query_asc -> execute();
            $resx = $query_asc -> get_result();
            $arrx = $resx -> fetch_all(MYSQLI_NUM);
            array_push($arrx, $arrc[0]);
            echo json_encode($arrx);
            exit;
        case "7":
            $y = 4;
            $query_desc -> bind_param("ii", $y, $i);
            $query_desc -> execute();
            $resx = $query_desc -> get_result();
            $arrx = $resx -> fetch_all(MYSQLI_NUM);
            array_push($arrx, $arrc[0]);
            echo json_encode($arrx);
            exit;
    }
}
?>