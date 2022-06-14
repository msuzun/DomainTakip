<?php

require 'baglan.php';
if (isset($_POST['ayar_kaydet'])) {
	$sorgu=$db->prepare("UPDATE ayarlar SET 

		site_baslik=:site_baslik,
		site_aciklama=:site_aciklama,
		site_link=:site_link,
		site_sahibi_mail=:site_sahibi_mail,
		site_mail_host_adresi=:site_mail_host_adresi,
		site_mail_adresi=:site_mail_adresi,
		mail_port_numarasi=:mail_port_numarasi,
		mail_sifresi=:mail_sifresi WHERE id=1
		");

	$sonuc=$sorgu->execute(array(

		'site_baslik' => $_POST['site_baslik'],
		'site_aciklama' => $_POST['site_aciklama'],
		'site_link' => $_POST['site_link'],
		'site_sahibi_mail' => $_POST['site_sahibi_mail'],
		'site_mail_host_adresi' => $_POST['site_mail_host_adresi'],
		'site_mail_adresi' => $_POST['site_mail_adresi'],
		'mail_port_numarasi' => $_POST['mail_port_numarasi'],
		'mail_sifresi' => $_POST['mail_sifresi'],
	));

	if ($_FILES['site_logo']['error']==0) {
		$gecici_isim = $_FILES['site_logo']['tmp_name'];
		$dosya_ismi = rand(10000,999999).$_FILES['site_logo']['name'];
		move_uploaded_file($gecici_isim, "../dosyalar/$dosya_ismi");

		$sorgu=$db->prepare("UPDATE ayarlar SET site_logo=:site_logo WHERE id=1");

		$sonuc=$sorgu->execute(array(

			'site_logo' => $dosya_ismi,
			
		));
	}

	if ($sonuc) {
		header("location:../ayarlar.php?durum=ok");
	}
	else{
		header("location:../ayarlar.php?durum=no");
	}
	exit;
}

/*****************************************************************************/

if (isset($_POST['oturumacma'])) {
	$sorgu=$db->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail=:kullanici_mail AND kullanici_sifre=:kullanici_sifre");
	$sorgu->execute(array(

		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_sifre' => md5($_POST['kullanici_sifre'])
	));
	$sonuc=$sorgu->rowcount();
	$kullanici=$sorgu->fetch(PDO::FETCH_ASSOC);
	if ($sonuc==0) {
		header("location:../index.php?durum=no");
	}
	else{
		$_SESSION['kullanici_isim']= $kullanici['kullanici_isim'];
		$_SESSION['kullanici_mail']= $kullanici['kullanici_mail'];
		$_SESSION['kullanici_id']= $kullanici['kullanici_id'];
		header("location:../index.php?durum=ok");
	}
	exit;
}
/*****************************************************************************/

if (isset($_POST['profilkaydet'])) {
	$sorgu=$db->prepare("UPDATE kullanicilar SET

		kullanici_isim=:kullanici_isim,
		kullanici_mail=:kullanici_mail,
		kullanici_telefon=:kullanici_telefon
		WHERE kullanici_id=:kullanici_id");

	$sonuc=$sorgu->execute(array(
		'kullanici_isim' => $_POST['kullanici_isim'],
		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_telefon' => $_POST['kullanici_telefon'],
		'kullanici_id' => $_SESSION['kullanici_id']
	));

	if (strlen($_POST['kullanici_sifre'])>0) {
		$sorgu=$db->prepare("UPDATE kullanicilar SET

		kullanici_sifre=:kullanici_sifre
		
		WHERE kullanici_id=:kullanici_id");

	$sonuc=$sorgu->execute(array(
		'kullanici_sifre' => md5($_POST['kullanici_sifre']),
		
		'kullanici_id' => $_SESSION['kullanici_id']
	));
	}

	if ($sonuc) {
		header("location:../profil.php?durum=ok");
	} else {
		header("location:../profil.php?durum=no");
	}
	exit;
}

/**************************************************************************/

if (isset($_POST['musteriekle'])) {
	$sorgu=$db->prepare("INSERT INTO musteri SET

		musteri_isim=:musteri_isim,
		musteri_mail=:musteri_mail,
		musteri_telefon=:musteri_telefon,
		musteri_detay=:musteri_detay

		");

	$sonuc=$sorgu->execute(array(

		'musteri_isim' => $_POST['musteri_isim'],
		'musteri_mail' => $_POST['musteri_mail'],
		'musteri_telefon' => $_POST['musteri_telefon'],
		'musteri_detay' => $_POST['musteri_detay'],

	));
	if ($sonuc) {
		header("location:../musteriler.php?durum=ok");
	}
	else{
		header("location:../musteriler.php?durum=no");
	}
	exit;
}
/**************************************************************************/

if (isset($_POST['musteriguncelle'])) {
	$sorgu=$db->prepare("UPDATE musteri SET 

		musteri_isim=:musteri_isim,
		musteri_telefon=:musteri_telefon,
		musteri_mail=:musteri_mail,
		musteri_detay=:musteri_detay 
		WHERE musteri_id=:musteri_id
		");
	$guncelleme=$sorgu->execute(array(

		'musteri_isim' => $_POST['musteri_isim'],
		'musteri_telefon' => $_POST['musteri_telefon'],
		'musteri_mail' => $_POST['musteri_mail'],
		'musteri_detay' => $_POST['musteri_detay'],
		'musteri_id' => $_POST['musteri_id']
	));

	if ($guncelleme) {
		header("location:../musteriler.php?durum=ok");
	}
	else{
		header("location:../musteriler.php?durum=no");
	}
	exit;
}


/**************************************************************************/

if (isset($_POST['musterisilme'])) {
	$sorgu=$db->prepare("DELETE FROM musteri WHERE musteri_id=:musteri_id");
	$sonuc=$sorgu->execute(array(
		'musteri_id' => $_POST['musteri_id']
	));

	if ($sonuc) {
		header("location:../musteriler.php?durum=ok");
	}
	else{
		header("location:../musteriler.php?durum=no");
	}
}

/**************************************************************************/

if (isset($_POST['domainekle'])) {
	$sorgu=$db->prepare("INSERT INTO domain SET 
		Domain_adi=:Domain_adi,
		Domain_musteri=:Domain_musteri,
		Domain_baslangic=:Domain_baslangic,
		Domain_kayit_firmasi=:Domain_kayit_firmasi,
		Domain_bitis=:Domain_bitis,
		Domain_fiyat=:Domain_fiyat
		");
	$sonuc=$sorgu->execute(array(
		'Domain_adi' => $_POST['Domain_adi'],
		'Domain_musteri' => $_POST['Domain_musteri'],
		'Domain_baslangic' => $_POST['Domain_baslangic'],
		'Domain_kayit_firmasi' => $_POST['Domain_kayit_firmasi'],
		'Domain_bitis' => $_POST['Domain_bitis'],
		'Domain_fiyat' => $_POST['Domain_fiyat'],
	));
	if ($sonuc) {
		header("location:../domainler.php?durum=ok");
	}
	else{
		header("location:../domainler.php?durum=no");
	}
	exit;
}

?>