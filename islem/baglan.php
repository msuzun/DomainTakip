<?php
date_default_timezone_set("Europe/Istanbul");
if (!session_start()) {
	session_start();
}


$host="localhost";
$veritabani_isim="kursdomaintakip";
$kullanici_adi="root";
$kullanici_sifre="1515";

try {
	
	$db = new PDO("mysql:host=$host;dbname=$veritabani_isim;charset=utf8",$kullanici_adi,$kullanici_sifre);
} catch (Exception $e) {
	echo $e->getmessage();
}

$sorgu=$db->prepare("SELECT * FROM ayarlar");
$sorgu->execute();
$ayarcek=$sorgu->fetch(PDO::FETCH_ASSOC);


?>
