<?php if ($_SESSION['role'] == 'admin') : ?>
  <div class="container p-4">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <h5 class="card-header">Pengeluaran</h5>
          <div class="card-body">
            <h2 class="card-title">Rp <?= number_format($total_pengeluaran, 0, ',', '.') ?></h2>
            <br>
            <span class="card-text" style="color: grey;">Total Pengeluaran</span>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <h5 class="card-header">Pemasukan</h5>
          <div class="card-body">
            <h2 class="card-title">Rp <?= number_format($total_pemasukan, 0, ',', '.') ?></h2>
            <br>
            <span class="card-text" style="color: grey;">Total Pemasukan</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-12">
        <div class="card">
          <h5 class="card-header">
            Laba Rugi
          </h5>
          <div class="card-body">
            <h2 class="card-title">Rp <?= number_format(($total_pemasukan - $total_pengeluaran), 0, ',', '.') ?></h2>
            <br>
            <span class="card-text" style="color: grey;">Jumlah laba/rugi</span>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-12">
        <div class="card">
          <h5 class="card-header">
            Export
          </h5>
          <div class="card-body">
            <form action="<?= base_url('Home/cetak') ?>" method="get">
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                          <option value="">-- Pilih Jenis --</option>
                          <option value="all">Laba-rugi</option>
                          <option value="pengeluaran">Pengeluaran</option>
                          <option value="pemasukan">Pemasukan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="dari">Dari</label>
                        <input type="date" name="dari" id="dari" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="sampai">Sampai</label>
                        <input type="date" name="sampai" id="sampai" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <input type="submit" value="Export" class="btn btn-success">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>
<?php if ($_SESSION['role'] == 'customer') : ?>
  <!-- Carousel -->
  <div id="carouselExampleFade" class="carousel slide carousel-fade bg-light" data-ride="carousel">
    <div class="container">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-5">
              <h4>Erenka Cafe and Space adalah <br>tempat yang tepat untuk bersantai <br>dan beristirahat</h4>
              <p>Erenka café & space adalah kedai kecil yang menjual berbagai jenis minuman serta makanan ringan yang cocok untuk dinikmati pada waktu senggang.</p>
              <a href="<?= base_url('menu'); ?>" class="btn btn-order">Order Now <i class="fas fa-arrow-right ml-3"></i></a>
            </div>
            <div class="col-lg-5 d-flex justify-content-end">
              <div class="img-bg">
                <img src="<?= base_url('assets/img/coffee-machine.png'); ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
      <div class="row m-5">
        <div class="col-lg-12 pr-5">
          <h5 class="pesanan-anda">Terjual</h5>
          <form class="mb-2" action="<?= base_url('home/index') ?>" method="get">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="dari">Dari</label>
                  <input type="date" name="dari" id="dari" class="form-control" value="<?= isset($_GET['dari']) ? $_GET['dari'] : '' ?>" required>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="sampai">Sampai</label>
                  <input type="date" name="sampai" id="sampai" class="form-control" value="<?= isset($_GET['sampai']) ? $_GET['sampai'] : '' ?>" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <input type="submit" value="Cari" class="btn btn-info">
              </div>
            </div>
          </form>
          <?php if (!$transactions) : ?>
            <h3 class="mt-5 mb-5">Belum ada menu yang terjual.</h3>
          <?php else : ?>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($transactions as $item) : ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $item['kopi'] ?></td>
                      <td><?= $item['total'] ?></td>
                    </tr>
                  <?php $no++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <!-- End Carousel -->
<?php endif ?>