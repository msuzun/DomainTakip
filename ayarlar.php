<?php include 'header.php'; 



?> <!-- require ile de yapabilirdik -->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="font-weight-bold text-primary">Ayarlar</h5>
				</div>
				<div class="card-body">
					<form action="islem/ajax.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Site Logo</label>
								<input class="form-control" type="file" name="site_logo">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Site Başlık</label>
								<input class="form-control" type="text" name="site_baslik" value="<?php echo $ayarcek['site_baslik'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Site Açıklama</label>
								<input class="form-control" type="text" name="site_aciklama" value="<?php echo $ayarcek['site_aciklama'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Site Link</label>
								<input class="form-control" type="text" name="site_link" value="<?php echo $ayarcek['site_link'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Site Sahibinin Mail Adresi</label>
								<input class="form-control" type="text" name="site_sahibi_mail" value="<?php echo $ayarcek['site_sahibi_mail'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Mail Host Adresi</label>
								<input class="form-control" type="text" name="site_mail_host_adresi" value="<?php echo $ayarcek['site_mail_host_adresi'] ?>">
							</div>
							<div class="col-md-6 form-group">
								<label>Mail Adresi</label>
								<input class="form-control" type="text" name="site_mail_adresi" value="<?php echo $ayarcek['site_mail_adresi'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 form-group">
								<label>Mail Port Numarası</label>
								<input class="form-control" type="text" name="mail_port_numarasi" value="<?php echo $ayarcek['mail_port_numarasi'] ?>">
							</div>
							<div class="col-md-6 form-group">
								<label>Mail Şifresi</label>
								<input class="form-control" type="text" name="mail_sifresi" value="<?php echo $ayarcek['mail_sifresi'] ?>">
							</div>
						</div>
						<div class="form-row">
							<button class="btn btn-primary" type="submit" name="ayar_kaydet">Kaydet</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php' ?> <!-- require ile de yapabilirdik -->

