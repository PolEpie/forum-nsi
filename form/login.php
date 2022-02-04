<?php
session_start();
require_once "../database.php";

$username = $_POST["username"];
$password = $_POST["password"];

$query_username = MySQLQuery("select * from users where username=?;", $username);
$result = $query_username->fetchAll();

if (count($result) > 0 and $result[0]['password'] == hash("md5", $password))  {
    $_SESSION['username'] = $username;
    $_SESSION['iduser'] = $result[0]['id'];
    header("Location: ../index.php");
}else{
    header("Location: ../login.php?err=1&u=$username");
}
exit;