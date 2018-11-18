<?php
function convertDataForDB($data){
    $partes = explode("/", $data);
    $dataFormat = "{$partes[2]}-{$partes[1]}-{$partes[0]}";
    
    return $dataFormat;
}