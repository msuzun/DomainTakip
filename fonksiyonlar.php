<?php

function oturumkontrol(){
	
	if (!isset($_SESSION['kullanici_mail']) OR !isset($_SESSION['kullanici_isim']) OR !isset($_SESSION['kullanici_id'])) 
	{

		session_destroy();
		header("location:login.php");
		exit;
	}
}


 ?>