<?php

header('Content-Type: application/json');

$user = 'root';
$pass = '';

$dbh = new PDO('mysql:host=localhost;dbname=economy_test', $user, $pass);

$sql = "UPDATE list_economy SET name_ec = ? WHERE id = ?";

$id = $_GET['id'];
$name = $_GET['name'];

$stmt = $pdo->prepare($sql);
$stmt->execute([$name, $id]);