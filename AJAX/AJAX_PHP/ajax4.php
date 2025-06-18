<?php
if (isset($_GET["name"])) echo "Your name is : " . $_GET["name"];
if (isset($_POST["fname"]) && isset($_POST["lname"])) echo "Your First Name is : " . $_POST["fname"] . "<br>Your Last Name is : ". $_POST["lname"];
?>