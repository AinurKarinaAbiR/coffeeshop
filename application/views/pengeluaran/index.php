<div id="menu" class="menu">
	<div class="container">
		<a href="<?= base_url('Pengeluaran/create') ?>" class="btn btn-info my-4">Tambah</a>
		<div class="table-responsive mt-4">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Judul</th>
						<th>Keterangan</th>
						<th>Nominal</th>
						<th>Waktu</th>
						<!-- <th>Aksi</th> -->
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($data as $item) : ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $item['judul'] ?></td>
							<td><?= $item['keterangan'] ?></td>
							<td>Rp <?= number_format($item['nominal'], 0, ',', '.') ?></td>
							<td><?= $item['created_at'] ?></td>
							<!-- <td>
								<a href=" <?= base_url('Pengeluaran/delete/') . $item['id']; ?>">
									<button class="btn btn-danger" onclick=" return confirm('Anda yakin akan menghapus menu ini?')">Hapus</button>
								</a>
							</td> -->
						</tr>
					<?php $no++;
					endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="6">
							<div class="float-right">
								<?= $this->pagination->create_links(); ?>
							</div>
						</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>