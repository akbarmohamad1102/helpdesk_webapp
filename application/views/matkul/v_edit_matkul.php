<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Edit Matkul</h3>
				</div>
                <?php echo form_open_multipart("matkul/update"); ?>
                <?php foreach ($matkul as $mk) { ?>
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Nama Matkul</label>
							<input type="hidden" class="form-control" name="id_mk" value="<?= $mk->id_matkul;?>">
							<input type="text" class="form-control" placeholder="Masukan Nama Mata Kuliah" name="nama_mk" required style="width: 60%;" value="<?= $mk->nama_matkul;?>">
                        </div>
                        <div class="form-group">
							<label for="nama">Semester</label>
							<input type="text" class="form-control" placeholder="Masukan Nama Mata Kuliah" name="semester" required style="width: 60%;" value="<?= $mk->semester;?>">
                        </div>
						<div class="form-group">
							<label for="nama">Jumlah SKS</label>
							<input type="text" class="form-control" placeholder="Masukan Nama Mata Kuliah" name="sks" required style="width: 60%;" value="<?= $mk->sks;?>">
                        </div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                <?php } ?>
                <?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
