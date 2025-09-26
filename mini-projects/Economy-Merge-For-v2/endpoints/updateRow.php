<?php

header('Content-Type: application/json');

$user = 'root';
$pass = 'password';

$dbh = new PDO('mysql:host=localhost;dbname=economy_test', $user, $pass);

$sql = "UPDATE list_economy SET name_ec = ?, name_bill = ?, place = ? WHERE id = ?";

$id = $_GET['id'];
$name = $_GET['name'];
$bill = $_GET['bill'];
$place = $_GET['place'];

$stmt = $dbh->prepare($sql);
$stmt->execute([$name, $bill, $place, $id]);
