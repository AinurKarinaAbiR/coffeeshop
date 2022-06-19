<div id="menu" class="menu">
	<div class="container">
		<div class="table-responsive mt-4">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Username</th>
						<th>Kritik</th>
						<th>Saran</th>
						<th>Waktu</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($data as $item) : ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $item['username'] ?></td>
							<td><?= $item['kritik'] ?></td>
							<td><?= $item['saran'] ?></td>
							<td><?= $item['created_at'] ?></td>
							<td>
								<a href=" <?= base_url('KritikSaran/delete/') . $item['id']; ?>">
									<button class="btn btn-danger" onclick=" return confirm('Anda yakin akan menghapus menu ini?')">Hapus</button>
								</a>
							</td>
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