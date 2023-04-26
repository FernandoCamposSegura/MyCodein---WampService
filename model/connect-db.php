<?php
$dbname = "mycodein";
$user = "root";
$pssw = "6dbxxhvzywkgc9z";
$server = 'localhost';
$dbh ="";

try {
    $dsn = "mysql:host=$server;dbname=$dbname;charset=UTF8";
    $dbh = new PDO($dsn, $user, $pssw);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}