<?php
$con=mysqli_connect("localhost","id20694819_root","Premedic@123",'id20694819_preclinic');


session_start();
session_regenerate_id();


define('SITE_PATH','https://premedical.000webhostapp.com/');
define('AVATAR_IMAGE_SERVER_PATH',SITE_PATH.'uploads/');
$tz = 'Asia/Kolkata';
$timestamp = time();
$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
$date=$dt->format('Y-m-d');
$day=$dt->format('d');
$month=$dt->format('m');
$month_name=$dt->format('F');
$year=$dt->format('Y');
$time=$dt->format('h:i:s');
?>