<?php
$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "coki";

$connect = mysqli_connect($serverName, $dBUserName,$dBPassword,$dBName);

if(!$connect){
    die("Failed to connect". mysqli_connect_error());
}