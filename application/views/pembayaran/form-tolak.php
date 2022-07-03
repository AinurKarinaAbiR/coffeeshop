<div id="menu" class="menu">
    <div class="container">
        <form action="<?= base_url('Pembayaran/prosesTolak/' . $id) ?>" method="post" enctype="multipart/form-data">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="form-group">
                        <label for="alasan">Alasan Penolakan</label>
                        <textarea name="alasan" id="alasan" cols="30" rows="3" class="form-control" required></textarea>
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>