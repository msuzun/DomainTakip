<?php include 'header.php'; 

if(isset($_POST['musteri_id'])) {
	$sorgu=$db->prepare("SELECT * FROM musteri WHERE musteri_id=:musteri_id");
	$sorgu->execute(array(

		'musteri_id'=>$_POST['musteri_id']

	));
	$musteribilgisi=$sorgu->fetch(PDO::FETCH_ASSOC);
}
else{
	header("location:musteriler.php");
	exit;
}

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="font-weight-bold text-primary">Müşteri Ekle</h5>
				</div>
				<div class="card-body">
					<form>
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Müşteri İsmi</label>
								<input  disabled  type="text" name="musteri_isim" class="form-control" value="<?php echo $musteribilgisi['musteri_isim'] ?>">
							</div>
							<div class="col-md-6 form-group">
								<label>Müşteri Mail</label>
								<input disabled  type="email" name="musteri_mail" class="form-control" value="<?php echo $musteribilgisi['musteri_mail'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Müşteri Telefon</label>
								<input  disabled type="text" name="musteri_telefon" class="form-control" value="<?php echo $musteribilgisi['musteri_telefon'] ?>">
							</div>
							<div class="col-md-6 form-group">
								<label>Müşteri Detay</label>
								<textarea disabled name="musteri_detay" class="form-control" style="height: auto; "><?php echo $musteribilgisi['musteri_detay'] ?></textarea>
							</div>
						</div>
						
						
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?>