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
									<th>Status Pembayaran</th>
									<th>Status Reservasi</th>
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
										<td><?= $item['jml_cust'] > 0 ? $item['jml_cust'] : '-' ?></td>
										<td><?= $item['ket'] != '' ? $item['ket'] : '-' ?></td>
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
										<td>
											<?php if ($item['is_reservasi']) : ?>
												<!-- <?= $item['status_reservasi'] == null ? 'pending' : $item['status_reservasi'] ?> -->
												<?php if ($item['status_reservasi'] == 'ditolak') { ?>
													ditolak
													<a href="#alasanModal" class="lihatAlasan" data-alasan="<?= $item['alasan_penolakan'] ?>">Lihat Alasan</a>
												<?php } elseif ($item['status_reservasi'] == 'diterima') {
													echo ('diterima') ?>
												<?php } else echo ('-') ?>
											<?php endif ?>
											<?php if (!$item['is_reservasi']) : ?>
												-
											<?php endif ?>
										</td>
										<td class="text-center">
											<?php if ($item['is_reservasi'] && isset($item['bukti_pembayaran'])) { ?>
												<img src="<?= base_url('/assets/bukti_pembayaran') . '/' . $item['bukti_pembayaran'] ?>" width="100" height="100">
												<a href="<?= base_url('/assets/bukti_pembayaran') . '/' . $item['bukti_pembayaran'] ?>" target="_blank">Lihat</a>
											<?php } elseif ($item['is_reservasi'] && $_SESSION['role'] == 'customer' && $item['status_reservasi'] == 'diterima') { ?>
												<a href="<?= base_url('pembayaran/uploadbukti/' . $item['id'] . '/' . $item['subtotal']) ?>">upload</a>
											<?php } else echo ('-'); ?>
										</td>
										<?php if ($_SESSION['role'] == 'admin') : ?>
											<td>
												<?php if (($item['is_reservasi'] && isset($item['bukti_pembayaran']) || !$item['is_reservasi'] && !$item['is_lunas'])) { ?>
													<?php if ($item['is_lunas'] == 0) { ?>
														<a href="<?= base_url('pembayaran/confirm') . '/' . $item['id'] ?>" onclick="return confirm('Anda yakin?')">Konfirmasi Selesai</a>
													<?php } else echo ('--'); ?>
												<?php } elseif ($item['is_reservasi'] && $item['status_reservasi'] == null) { ?>
													<a class="btn btn-sm btn-success m-1" href="<?= base_url('pembayaran/terimareservasi') . '/' . $item['id'] ?>" onclick="return confirm('Anda yakin?')">Terima</a>
													<a class="btn btn-sm btn-danger m-1" href="<?= base_url('pembayaran/tolakreservasi') . '/' . $item['id'] ?>" onclick="return confirm('Anda yakin?')">Tolak</a>
												<?php } else echo ('-'); ?>
											</td>
										<?php endif ?>
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
<!-- Modal -->
<div class="modal hide" id="alasanModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="alasanModalLabel">Alasan Penolakan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="alasan_penolakan"></p>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
<!-- End Pesanan -->