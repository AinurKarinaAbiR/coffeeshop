<div id="menu" class="menu">
	<div class="container">
		<a href="<?= base_url('MasterMenu/index') ?>" class="btn btn-warning mt-3">Kembali</a>
		<form action="<?= base_url('MasterMenu/store') ?>" method="post" enctype="multipart/form-data">
			<div class="row mt-5">
				<div class="col-12">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama kopi" required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="harga">Harga</label>
								<input type="number" name="harga" id="harga" class="form-control" placeholder="Harga kopi" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="deskripsi">Deskripsi</label>
								<textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control"></textarea>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="gambar">Gambar</label>
								<input type="file" name="gambar" id="gambar" class="form-control" required>
							</div>
						</div>
					</div>
					<input type="submit" value="Simpan" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>