<?php include 'header.php' ?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h6>Müşteriler</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered ">
					<thead>
						<tr>
							<th>No</th>
							<th>Müşteri isim</th>
							<th>Müşteri mail</th>
							<th>Müşteri telefon</th>
							<th>İşlemler</th>
						</tr>
					</thead>
					<tbody>


						<?php 

						$sayi=0;
						$sorgu=$db->prepare("SELECT * FROM musteri");
						$sorgu->execute();
						while ($musteribilgisi=$sorgu->fetch(PDO::FETCH_ASSOC)) {
							$sayi++;
							?>
							<!-- print_r($musteribilgisi); -->
							<tr>
								<td><?php echo $sayi ?></td>
								<td><?php echo $musteribilgisi['musteri_isim'] ?></td>
								<td><?php echo $musteribilgisi['musteri_mail'] ?></td>
								<td><?php echo $musteribilgisi['musteri_telefon'] ?></td>
								<td>
									
									<div class="row justify-content-center">
										<form action="musteriduzenle.php" method="POST" accept-charset="utf-8">
										<input type="hidden" name="musteri_id" value="<?php echo $musteribilgisi['musteri_id'] ?>">
										<button type="submit" name="duzenleme" class="btn btn-success btn-sm btn-icon-split">
											<span class="icon text-white-60">
												<i class="fas fa-edit">
													
												</i>
											</span>
										</button>
									</form>
									<form class="mx-1" action="islem/ajax.php" method="POST" accept-charset="utf-8">
										<input type="hidden" name="musteri_id" value="<?php echo $musteribilgisi['musteri_id'] ?>">
										<button type="submit" name="duzenleme" class="btn btn-danger btn-sm btn-icon-split">
											<span class="icon text-white-60">
												<i class="fas fa-trash">
													
												</i>
											</span>
										</button>
									</form>
									<form action="musteri.php" method="POST" accept-charset="utf-8">
										<input type="hidden" name="musteri_id" value="<?php echo $musteribilgisi['musteri_id'] ?>">
										<button type="submit" name="duzenleme" class="btn btn-info btn-sm btn-icon-split">
											<span class="icon text-white-60">
												<i class="fas fa-eye">
													
												</i>
											</span>
										</button>
									</form>
									</div>
								</td>
							</tr>
							<?php 
						}
						
						?>



						
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>


<?php include 'footer.php' ?>