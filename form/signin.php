<?php
session_start();
require_once "../database.php";

$username = $_POST["username"];

$query_username = MySQLQuery("select * from users where username=?;", $username);
if (count($query_username->fetchAll()) > 0) {
    header("Location: ../signin.php?err=1&u=$username");
    exit;
}

MySQLQuery("INSERT INTO users (username, password) VALUES (?,?);", $username, hash("md5", $_POST["password"]));
$query_username = MySQLQuery("select * from users where username=?;", $username);
$result = $query_username->fetchAll();

$_SESSION['username'] = $username;
$_SESSION['iduser'] = $result[0]['id'];

header("Location: ../index.php");
exit;