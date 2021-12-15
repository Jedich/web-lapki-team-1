<?php
$strJsonFileContents = file_get_contents("./str.json");
$json_data = json_decode($strJsonFileContents, true);

$users = $json_data["users"];

if(isset($_POST["fed"])) {
    if($_POST["fed"]["username"] == "") {
        echo json_encode(array('msg' => 'Name is not set!', 'code' => 400));
        return;
    }
    if($_POST["fed"]["password"] == "") {
        echo json_encode(array('msg' => 'Password is not set!', 'code' => 400));
        return;
    }

    if (in_array($_POST["fed"]["username"], $users)){
         echo json_encode(array('msg' => 'Login already exists!', 'code' => 400));
         return;
    }




    array_push($users, $_POST["fed"]["username"]);
    $dd = array();
    $dd['users'] = $users;
    $fp = fopen('str.json', 'w');
    fwrite($fp, json_encode($dd));
    fclose($fp);
}