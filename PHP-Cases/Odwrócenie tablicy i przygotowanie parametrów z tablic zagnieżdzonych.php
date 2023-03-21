<?php

$data = $_POST['data'];

$data = array_reverse($data);

foreach ($data as $key => $value) {

    $name = $value[1];
	
    $la = $value[0];
    $lo = $value[1];
    
    $number = count($data) - $key;
    
    $data[$key] = array(
        'name' => $name,
        'la' => $la,
        'lo' => $lo,
        'number' => $number
    );
}

$data_json = json_encode($data);

?>

