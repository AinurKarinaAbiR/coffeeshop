<!-- Pesanan -->
<div id="pesanan" class="pesanan">
	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-12 pr-5">
				<h5 class="pesanan-anda">Upload Bukti Pembayaran (Minimal DP 50%)</h5>
				<form action="<?= base_url('pembayaran/uploadProcess') ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $id ?>">
					<input type="hidden" name="total" value="<?= $total ?>">
					<input type="hidden" name="min_dp" value="<?= $total * 50 / 100 ?>">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="total">Total</label>
								<input type="text" name="total" id="total" class="form-control" value="Rp <?= number_format($total, 0, ',', '.') ?>" readonly>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="min_dp_ket">Minimal DP (50%)</label>
								<input type="text" name="min_dp_ket" id="min_dp_ket" class="form-control" value="Rp <?= number_format(($total * 50 / 100), 0, ',', '.') ?>" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="dp">Nominal DP</label>
								<input type="number" name="dp" id="dp" class="form-control" placeholder="Masukkan nominal" required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="bukti">Bukti Pembayaran</label>
								<br>
								<input type="file" name="bukti" id="bukti" required>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Kirim</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Pesanan -->