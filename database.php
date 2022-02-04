<?php
$db = new PDO('mysql:host=localhost;dbname=forum', "forum", "A)4kFU3P*QZzFmc6");

function MySQLQuery($sql, ...$args)
{
    global $db;
    $query = $db->prepare($sql);
    if (!$query) {
        throw new Exception('Erreur SQL : ' . $db->errorInfo());
    }
    $query->execute($args);
    return $query;
}