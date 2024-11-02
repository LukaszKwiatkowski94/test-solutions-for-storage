<?php

header('Content-Type: application/json');

$user = 'root';
$pass = '';

$dbh = new PDO('mysql:host=localhost;dbname=economy_test', $user, $pass);

$sql = 'SELECT category FROM categories ORDER BY category ASC';

$sth = $dbh->query($sql);

$result = $sth->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result,true);