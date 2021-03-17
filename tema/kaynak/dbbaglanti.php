<?php

date_default_timezone_set('Europe/Istanbul');

$host = "localhost";
$db_k_adi = "username";
$db_sifre = "password";
$db_adi = "db_name";

$dbbaglanti = mysqli_connect($host,$db_k_adi,$db_sifre,$db_adi);

if($dbbaglanti->connect_errno) { echo 'Bağlantı hatası: ' . $dbbaglanti->connect_errno; exit; }

$dbbaglanti->set_charset('utf8');

?>