<?php

header('Content-Type: application/json');

$user = 'root';
$pass = 'password';

$dbh = new PDO('mysql:host=localhost;dbname=economy_test', $user, $pass);

$sql = 'SELECT DISTINCT name_ec as category FROM list_economy ORDER BY category ASC';

$sth = $dbh->query($sql);

$result = $sth->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result, true);
