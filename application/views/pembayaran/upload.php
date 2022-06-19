<!-- Pesanan -->
<div id="pesanan" class="pesanan">
	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-12 pr-5">
				<h5 class="pesanan-anda">Upload Bukti Pembayaran</h5>
				<form action="<?= base_url('pembayaran/uploadProcess') ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $id ?>">
					<input type="file" name="bukti" id="bukti" required>
					<button type="submit" class="btn btn-primary">Kirim</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Pesanan -->