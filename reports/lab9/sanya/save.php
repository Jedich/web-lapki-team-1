<?php
if(isset($_POST["task"])) {
    if($_POST["task"]["name"] == "") {
        echo json_encode(array('msg' => 'Name is not set!', 'code' => 400));
        return;
    }
    if($_POST["task"]["time"] == "") {
        echo json_encode(array('msg' => 'Time is not set!', 'code' => 400));
        return;
    }
    $myfile = file_put_contents('data.json', json_encode($_POST["task"]).PHP_EOL , FILE_APPEND | LOCK_EX);
    echo json_encode(array("data" => $_POST["task"]));
} else echo json_encode("aboba");