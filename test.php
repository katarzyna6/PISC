<?php

$dsn = "mysql:host=localhost;dbname=mydb";
$user = "katarzyna";
$passwd = "testy";
try {
$pdo = new PDO($dsn, $user, $passwd);

$stm = $pdo->query("SELECT VERSION()");

$version = $stm->fetch();

echo $version[0] . PHP_EOL;
} catch(Exception $e) {
            echo $e->getMessage();
        }