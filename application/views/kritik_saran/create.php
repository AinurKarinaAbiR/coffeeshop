<div id="menu" class="menu">
	<div class="container">
		<form action="<?= base_url('KritikSaran/store') ?>" method="post">
			<div class="row mt-5">
				<div class="col-12">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="kritik">Kritik</label>
								<textarea name="kritik" id="kritik" cols="30" rows="3" class="form-control"></textarea>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="saran">Saran</label>
								<textarea name="saran" id="saran" cols="30" rows="3" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<input type="submit" value="Simpan" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>