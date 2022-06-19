<div class="container p-4">
  <div class="row">
    <div class="col-6">
      <div class="card">
        <h5 class="card-header">Pembelian</h5>
        <div class="card-body">
          <h2 class="card-title">Rp <?= number_format($total_pembelian, 0, ',', '.') ?></h2>
          <br>
          <span class="card-text" style="color: grey;">Total Pembelian</span>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card">
        <h5 class="card-header">Penjualan</h5>
        <div class="card-body">
          <h2 class="card-title">Rp <?= number_format($total_penjualan, 0, ',', '.') ?></h2>
          <br>
          <span class="card-text" style="color: grey;">Total Penjualan</span>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-12">
      <div class="card">
        <h5 class="card-header">Laba Rugi</h5>
        <div class="card-body">
          <h2 class="card-title">Rp <?= number_format(($total_pembelian - $total_penjualan), 0, ',', '.') ?></h2>
          <br>
          <span class="card-text" style="color: grey;">Jumlah laba/rugi</span>
        </div>
      </div>
    </div>
  </div>
</div>