<?php
$strJsonFileContents = file_get_contents("./citys.json");
$json_data = json_decode($strJsonFileContents, true);

echo json_encode(array('data' => $json_data["citys"], 'code' => 200));