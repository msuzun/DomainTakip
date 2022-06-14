<?php include 'header.php' ?>
<link rel="stylesheet" type="text/css" href="vendor/datatables/dataTables.bootstrap4.min.css">
<div class="container">
	<div class="card">
		<div class="card-header">
			<h6>Domainler</h6>
		</div>
		<div class="card-body">
			<div class="dropdown">
				<button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">Dışa Aktar</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">
						<button type="button" class="btn btn-dark icon-split btn-sm" onclick="tiklama('kopyala');">
							<span class="icon text-white-60">
								<i class="far fa-clipboard"></i>
							</span> 
							<span class="text">Kopyala</span>
						</button>
					</a>
					<a class="dropdown-item" href="#">
						<button type="button" class="btn btn-success icon-split btn-sm" onclick="tiklama('excel');">
							<span class="icon text-white-60">
								<i class="far fa-file-excel"></i>
							</span> 
							<span class="text">Excel</span>
						</button>
					</a>
					<a class="dropdown-item" href="#">
						<button type="button" class="btn btn-danger icon-split btn-sm" onclick="tiklama('pdf');">
							<span class="icon text-white-60">
								<i class="far fa-file-pdf"></i>
							</span> 
							<span class="text">PDF</span>
						</button>
					</a>
					<a class="dropdown-item" href="#">
						<button type="button" class="btn btn-info icon-split btn-sm" onclick="tiklama('csv');">
							<span class="icon text-white-60">
								<i class="fas fa-file-csv"></i>
							</span> 
							<span class="text">CSV</span>
						</button>
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered" id="domaintablosu">
					<thead>
						<tr>
							<th>No</th>
							<th>Domain Adi</th>
							<th>Domain Musteri</th>
							<th>Kalan Gun Sayisi</th>
							<th>Domain Bitis</th>
							<th>Domain Fiyat</th>
							<th>İşlemler</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sayi=0;
						$sorgu=$db->prepare("SELECT * FROM domain LEFT JOIN musteri ON domain.Domain_musteri=musteri.musteri_id");
						$sorgu->execute();
						while ($domainbilgisi=$sorgu->fetch(PDO::FETCH_ASSOC)) {
							$sayi++;
							?>
							<!-- print_r($domainbilgisi); -->
							<tr>
								<td><?php echo $sayi ?></td>
								<td><?php echo $domainbilgisi['Domain_adi'] ?></td>
								<td><?php echo $domainbilgisi['musteri_isim'] ?></td>
								<td><?php 

									$bugununTarihi=strtotime(date('d.m.y'));
									$domainbitis=strtotime($domainbilgisi['Domain_bitis']);
									$sonuc=$domainbitis-$bugununTarihi;
									$fark=$sonuc/(60*60*24);
									// echo $fark=ceil($sonuc/(60*60*24));
									if ($fark<0.1) {
										echo 0;
									}
									else{
										echo $fark=ceil($sonuc/(60*60*24));
									}
								?>
								</td>
								<td><?php echo $domainbilgisi['Domain_bitis'] ?></td>
								<td><?php echo $domainbilgisi['Domain_fiyat'] ?></td>
								
								<td>
									
									<div class="row justify-content-center">
										<form action="domainduzenle.php" method="POST" accept-charset="utf-8">
											<input type="hidden" name="Domain_id" value="<?php echo $domainbilgisi['Domain_id'] ?>">
											<button type="submit" name="duzenleme" class="btn btn-success btn-sm btn-icon-split">
												<span class="icon text-white-60">
													<i class="fas fa-edit">
														
													</i>
												</span>
											</button>
										</form>
										<form class="mx-1" action="islem/ajax.php" method="POST" accept-charset="utf-8">
											<input type="hidden" name="Domain_id" value="<?php echo $domainbilgisi['Domain_id'] ?>">
											<button name="domainsilme" type="submit" name="duzenleme" class="btn btn-danger btn-sm btn-icon-split">
												<span class="icon text-white-60">
													<i class="fas fa-trash">
														
													</i>
												</span>
											</button>
										</form>
										<form action="domain.php" method="POST" accept-charset="utf-8">
											<input type="hidden" name="Domain_id" value="<?php echo $domainbilgisi['Domain_id'] ?>">
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
					<tfoot>
						<tr>
							<th>No</th>
							<th>Domain Adi</th>
							<th>Domain Musteri</th>
							<th>Domain Kayit Firmasi</th>
							<th>Domain Bitis</th>
							<th>Domain Fiyat</th>

						</tr>
					</tfoot>
				</table>
			</div>

		</div>
	</div>
</div>


<?php include 'footer.php' ?>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="vendor/datatables/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/buttons.flash.min.js"></script>
<script src="vendor/datatables/buttons.html5.min.js"></script>
<script src="vendor/datatables/buttons.print.min.js"></script>
<script src="vendor/datatables/jszip.min.js"></script>
<script src="vendor/datatables/pdfmake.min.js"></script>
<script src="vendor/datatables/vfs_fonts.js"></script>

<script>
	$("#domaintablosu").DataTable({
		initComplete: function () {
			this.api().columns().every( function () {
				var column = this;
				var select = $('<select><option value=""></option></select>')
				.appendTo( $(column.footer()).empty() )
				.on( 'change', function () {
					var val = $.fn.dataTable.util.escapeRegex(
						$(this).val()
						);

					column
					.search( val ? '^'+val+'$' : '', true, false )
					.draw();
				} );

				column.data().unique().sort().each( function ( d, j ) {
					select.append( '<option value="'+d+'">'+d+'</option>' )
				} );
			} );
		},
		dom: "<'row '<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
		buttons: [
		{
			extend: 'copyHtml5', 
			className: 'kopyalama-buton'
		},
		{
			extend: 'excelHtml5', 
			className: 'excel-buton'
		},
		{
			extend: 'pdfHtml5',
			className: 'pdf-buton'
		},
		{
			extend: 'csvHtml5',
			className: 'csv-buton'
		}
		]
	});


	function tiklama(islem){
		switch (islem){
			case "excel":
			$(".excel-buton").trigger("click");
			break;
			case "kopyala":
			$(".kopyalama-buton").trigger("click");
			break;
			case "pdf":
			$(".pdf-buton").trigger("click");
			break;
			case "csv":
			$(".csv-buton").trigger("click");
			break;
		}
	}


</script>


<?php 
if (@$_GET['durum']=="ok") { ?>
	<script type="text/javascript">
		Swal.fire({
			type: 'success',
			title: 'İşlem Başarılı',
			text: 'İşleminiz Başarıyla Gerçekleştirildi',
			confirmButtonText: "Tamam"
		})
	</script>
<?php } ?>


<?php 
if (@$_GET['durum']=="no") { ?>
	<script type="text/javascript">
		Swal.fire({
			type: 'error',
			title: 'Hata',
			text: 'İşleminiz Başarısız Oldu Lütfen Tekrar Deneyin',
			confirmButtonText: "Tamam"
		})
	</script>
	<?php } ?>