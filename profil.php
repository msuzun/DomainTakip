<?php include 'header.php';
$sorgu=$db->prepare("SELECT * FROM kullanicilar WHERE kullanici_id=:kullanici_id");
$sorgu->execute(array(


	'kullanici_id' => $_SESSION['kullanici_id']

));

$kullanici = $sorgu->fetch(PDO::FETCH_ASSOC);

?>

<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="font-weight-bold text-primary"> Profil</h5>
				</div>
				<div class="card-body">
					<form action="islem/ajax.php" method="POST" accept-charset="utf-8">
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>İsim</label>
								<input type="text" name="kullanici_isim" class="form-control" placeholder="isim girin" value="<?php echo $kullanici['kullanici_isim']?>">
							</div>
							<div class="col-md-6 form-group">
								<label>Mail</label>
								<input type="text" name="kullanici_mail" class="form-control" placeholder="mail adresinizi girin" value="<?php echo $kullanici['kullanici_mail']?>">
							</div>
							<div class="col-md-6 form-group">
								<label>Şifre <small>Boş bırakırsanız şifre değişmez</small></label>
								<input type="password" name="kullanici_sifre" class="form-control" placeholder="Şifre girin">
							</div>
							<div class="col-md-6 form-group">
								<label>Telefon</label>
								<input type="text" name="kullanici_telefon" class="form-control" placeholder="Telefon girin" value="<?php echo $kullanici['kullanici_telefon']?>">
							</div>
						</div>
						<button type="submit" name="profilkaydet" class="btn btn-primary">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>