<?php require 'header.php'?>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="font-weight-bold text-primary">Müşteri Ekle</h5>
				</div>
				<div class="card-body">
					<form action="islem/ajax.php" method="POST" accept-charset="utf-8">
						<div class="form-row">
							<div class="col-md-4 form-group">
								<label>Domain Adi</label>
								<input type="text" name="Domain_adi" class="form-control"  placeholder="Domain Adi">
							</div>
							<div class="col-md-4 form-group">
								<label>Domain Müşteri</label>
								<select name="Domain_musteri" class="form-control">

									<?php 

										$sorgu=$db->prepare("SELECT * FROM musteri");
										$sorgu->execute();
										while ($musteri=$sorgu->fetch(PDO::FETCH_ASSOC)) { ?>
											<option value="<?php echo $musteri['musteri_id'] ?>"> <?php echo $musteri['musteri_isim'] ?></option>
										<?php 
										}
									 ?>
									
								</select>
							</div>
							<div class="col-md-4 form-group">
								<label>Domain Başlangıç Tarihi</label>
								<input type="date" name="Domain_baslangic" class="form-control" placeholder="Domain Başlangıç Tarihi">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-4 form-group">
								<label>Domain Kayıt Firması</label>
								<input type="text" name="Domain_kayit_firmasi" class="form-control" placeholder="Domain Kayıt Firması">
							</div>
							<div class="col-md-4 form-group">
								<label>Domain bitis</label>
								<input type="date" name="Domain_bitis" class="form-control" placeholder="Domain bitis">
							</div>
							<div class="col-md-4 form-group">
								<label>Domain fiyat</label>
								<input type="text" name="Domain_fiyat" class="form-control" placeholder="Domain fiyat">
							</div>
						</div>
						<button class="btn btn-primary" type="submit" name="domainekle">Kaydet</button>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php require 'footer.php'?>