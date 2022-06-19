<div id="menu" class="menu">
	<div class="container">
		<a href="<?= base_url('MasterMenu/tambah') ?>" class="btn btn-success mt-3">Tambah</a>
		<div class="row mt-5">
			<?php foreach ($menu as $m) : ?>
				<div class="col-lg-3">
					<div class="shadow p-3 mb-5 bg-white">
						<img src="<?= base_url('assets/img/menu/') . $m['image']; ?>" class="img-fluid">
						<div class="text-center mt-3">
							<h5><?= $m['kopi']; ?></h5>
							<p>IDR <?= number_format($m['harga'], 2, ',', '.'); ?></p>
							<a href="<?= base_url('MasterMenu/edit/') . $m['id']; ?>" class="btn btn-info"">Edit</a>
							<a href=" <?= base_url('MasterMenu/delete/') . $m['id']; ?>">
								<button class="btn btn-danger" onclick=" return confirm('Anda yakin akan menghapus menu ini?')">Hapus</button>
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class=" row justify-content-center mt-2">
			<?= $this->pagination->create_links(); ?>
		</div>
	</div>
</div>