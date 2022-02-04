<?php
session_start();
require_once "../database.php";

$topic = $_POST["topic"];

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php?err=2");
    exit;
}

$query_topic = MySQLQuery("select * from topics where name=?;", $topic);
if (count($query_topic->fetchAll()) > 0) {
    header("Location: ../index.php?err=1");
    exit;
}

MySQLQuery("INSERT INTO topics (name) VALUE (?);", $topic);

header("Location: ../index.php");
exit;