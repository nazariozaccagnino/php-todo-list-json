<?php

$datacontent = file_get_contents('data.json');
$newdata = json_decode($datacontent, true);
var_dump($newdata);