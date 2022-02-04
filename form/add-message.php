<?php
session_start();
require_once "../database.php";

$topic = $_POST["topic"];
$text = $_POST["text"];

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php?err=2");
    exit;
}

$query_topic = MySQLQuery("select * from topics where id=?;", $topic);
if (count($query_topic->fetchAll()) == 0) {
    header("Location: ../index.php");
    exit;
}

MySQLQuery("INSERT INTO messages (id_topic, id_user, text) VALUE (?,?,?);", $topic, $_SESSION['iduser'], $text);

header("Location: {$_SERVER['HTTP_REFERER']}");
exit;