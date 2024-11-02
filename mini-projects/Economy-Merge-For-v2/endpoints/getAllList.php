<?php

header('Content-Type: application/json');

$user = 'root';
$pass = '';

$dbh = new PDO('mysql:host=localhost;dbname=economy_test', $user, $pass);

// $sql = 'SELECT * FROM list_economy ORDER BY date ASC, name_ec ASC';
$sql = 'SELECT * FROM list_economy WHERE LENGTH(name_ec) < 5 ORDER BY date ASC';

$sth = $dbh->query($sql);

$result = $sth->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result,true);