<link rel="stylesheet" type="text/css" href="styles.css">
<?php
session_start();
spl_autoload_register();
$template = new Core\Template();
$dbInfo = parse_ini_file('Config/db.ini');
$pdo = new PDO($dbInfo['dsn'],$dbInfo['user'],$dbInfo['pass']);
$db = new \Database\PDODatabase($pdo);