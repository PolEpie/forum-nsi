<?php

require_once "database.php";

$username = $_POST["username"];

$sql_check_entries = "select * from users where username=?;";
$query_username = $db->prepare($sql_check_entries)->execute([$username]);

if ($query_username > 0) {
    header("Location: signin.php?err=1&u=$username");
    exit;
}

$sql = "INSERT INTO users (username, password) VALUES (?,?);";
$db->prepare($sql)->execute([$username, hash("md5", $_POST["password"])]);

header("Location: index.php");
exit;