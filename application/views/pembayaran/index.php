<!-- Pesanan -->
<div id="pesanan" class="pesanan">
	<div class="container">
		<div class="row my-5">
			<div class="col-lg-12 pr-5">
				<h5 class="pesanan-anda">Riwayat Pembayaran</h5>
				<?php if (!$data) : ?>
					<div class="row justify-content-center">
						<div class="card">
							<h3 class="mt-5 mb-5">Belum ada pembayaran.</h3>
						</div>
					</div>
				<?php else : ?>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>No. Pesanan</th>
									<?php if ($_SESSION['role'] == 'admin') { ?>
										<th>Pemesan</th>
									<?php } ?>
									<th>Subtotal</th>
									<th>Total Bayar</th>
									<th>Jenis</th>
									<th>Tanggal Pengajuan</th>
									<th>Jumlah Customer</th>
									<th>Ket</th>
									<th>Dibuat pada</th>
									<th>Status</th>
									<th>Bukti pembayaran</th>
									<?php if ($_SESSION['role'] == 'admin') { ?>
										<th>Aksi</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($data as $item) : ?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $item['no_pesanan'] ?></td>
										<?php if ($_SESSION['role'] == 'admin') { ?>
											<td><?= $item['nama'] ?></td>
										<?php } ?>
										<td>Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
										<td>Rp. <?= number_format($item['total_bayar'], 0, ',', '.') ?></td>
										<td><?= $item['is_reservasi'] == 1 ? 'Reservasi' : 'Dine In' ?></td>
										<td><?= isset($item['tgl_pengajuan']) ? $item['tgl_pengajuan'] : '-' ?></td>
										<td><?= isset($item['jml_cust']) ? $item['jml_cust'] : '-' ?></td>
										<td><?= isset($item['ket']) || $item['ket'] != '' ? $item['ket'] : '-' ?></td>
										<td><?= $item['date_created'] ?></td>
										<td>
											<?php if ($item['is_lunas']) { ?>
												Lunas
												<br>
												<a target="_blank" href="<?= base_url('pembayaran/print') . '/' . $item['id'] ?>">print</a>
											<?php } else { ?>
												Belum Lunas
											<?php } ?>

										</td>
										<td class="text-center">
											<?php if ($item['is_reservasi'] && isset($item['bukti_pembayaran'])) { ?>
												<img src="<?= base_url('/assets/bukti_pembayaran') . '/' . $item['bukti_pembayaran'] ?>" width="100" height="100">
												<a href="<?= base_url('/assets/bukti_pembayaran') . '/' . $item['bukti_pembayaran'] ?>" target="_blank">Lihat</a>
											<?php }
											if ($item['is_reservasi']) { ?>
												<a href="<?= base_url('pembayaran/uploadbukti') . '/' . $item['id'] ?>">upload</a>
											<?php } ?>
										</td>
										<?php if ($_SESSION['role'] == 'admin' && ($item['is_reservasi'] && isset($item['bukti_pembayaran']) || !$item['is_reservasi'] && !$item['is_lunas'])) { ?>
											<td>
												<?php if ($item['is_lunas'] == 0) { ?>
													<a href="<?= base_url('pembayaran/confirm') . '/' . $item['id'] ?>" onclick="return confirm('Anda yakin?')">Konfirmasi</a>
												<?php } else { ?>
													-
												<?php } ?>
											</td>
										<?php } ?>
									</tr>
								<?php $no++;
								endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<!-- End Pesanan -->