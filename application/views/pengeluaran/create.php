<div id="menu" class="menu">
	<div class="container">
		<form action="<?= base_url('Pengeluaran/store') ?>" method="post" enctype="multipart/form-data">
			<div class="row mt-5">
				<div class="col-12">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="judul">Judul</label>
								<input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul disini" required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="nominal">Nominal</label>
								<input type="number" name="nominal" id="nominal" class="form-control" placeholder="Masukkan nominal disini" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="bukti">Bukti</label>
								<br>
								<input type="file" name="bukti" id="bukti" required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<input type="submit" value="Simpan" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>