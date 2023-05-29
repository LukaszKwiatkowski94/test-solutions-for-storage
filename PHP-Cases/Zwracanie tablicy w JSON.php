<?php
	$data = array("a" => "500", "b" => "300"); // Twój obiekt danych

	$response = array(
		"message" => "Success",
		"code" => 200,
		"data" => array_values($data) // Zamiana obiektu na tablicę
	);

	echo json_encode($response); // Zwracanie odpowiedzi w formacie JSON

	// W rezultacie, dane zwracane w polu "data" będą miały format tablicy:

	{
	  "message": "Success",
	  "code": 200,
	  "data": ["500", "300"]
	}