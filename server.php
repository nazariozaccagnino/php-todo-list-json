<?php

$datacontent = file_get_contents('data.json');
//$newdata = json_decode($datacontent, true);
//var_dump($newdata);

//var_dump($_POST);

if(isset($_POST['id'])){
    $newItem=[
        'id'=> $_POST['id'],
        'text'=>$_POST['text'],
        'done'=>$_POST['done']
    ];
}