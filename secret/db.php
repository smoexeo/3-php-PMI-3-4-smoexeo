<?php
$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'web';

$opt = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO("mysql:host=$db_host;dbname=$db_database", $db_user, $db_pass, $opt);
?>