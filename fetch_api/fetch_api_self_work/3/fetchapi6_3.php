<?php
$con = new mysqli("localhost","root","","test");
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$dob = filter_input(INPUT_POST, "dob", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mark = filter_input(INPUT_POST, "mark", FILTER_SANITIZE_NUMBER_FLOAT);
$query = $con -> prepare("INSERT INTO eleve VALUES ('',?,?,?)");
$query -> bind_param("ssd", $name, $dob, $mark);
$query -> execute();
if ($query -> affected_rows) {
    $arr = ["1"];
    echo json_encode($arr);
} else {
    $arr = ["0"];
    echo json_encode($arr);
}
?>