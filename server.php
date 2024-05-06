<?php

$datacontent = file_get_contents('data.json');

if(isset($_POST['id'])){
    $newdata = json_decode($datacontent, true);
    $newItem=[
        'id'=> $_POST['id'],
        'text'=>$_POST['text'],
        'done'=>$_POST['done']
    ];
    $newdata[] = $newItem;
    $datacontent = json_encode($newdata, JSON_PRETTY_PRINT);
    file_put_contents('data.json', $datacontent);
}

//var_dump($_POST);
header('Content-type: application/json');
echo $datacontent;
