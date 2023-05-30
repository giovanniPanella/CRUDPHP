<?php

$host = 'localhost';
$user = 'root';
$senha = '';
$bdname= 'bdclientes';

$con = mysqli_connect($host,$user,$senha,$bdname);

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

?>