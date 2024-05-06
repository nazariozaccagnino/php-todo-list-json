<?php

$datacontent = file_get_contents('data.json');
$method = $_SERVER['REQUEST_METHOD'];
if($method==='POST'){
    if(isset($_POST['id'])){
        $newdata = json_decode($datacontent, true);
        $newItem=[
            'id'=> (int)$_POST['id'],
            'text'=>$_POST['text'],
            'done'=>(bool)$_POST['done']
        ];
        $newdata[] = $newItem;
        $datacontent = json_encode($newdata, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $datacontent);
    }
} elseif ($method==='DELETE'){
    $newdata = json_decode($datacontent, true);
    $object = json_decode(file_get_contents('php://input'), true);
    $objId= $object['id'];
    array_slice($newdata, $objId, 1);
    $datacontent = json_encode($newdata, JSON_PRETTY_PRINT);
    file_put_contents('data.json', $datacontent);
}


//var_dump($_POST);
header('Content-type: application/json');
echo $datacontent;
