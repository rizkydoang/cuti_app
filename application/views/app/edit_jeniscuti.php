<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Form Edit <small>Halaman Edit Jenis Cuti</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
						<?= $this->session->flashdata('pesan'); ?>
						<?= form_open('', [], ['jeniscuti_id' => $jenis_cuti['jeniscuti_id']]); ?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_cuti">Nama Cuti <span
									class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="<?= set_value('nama_cuti', $jenis_cuti['nama_cuti']); ?>" id="nama_cuti"
									name="nama_cuti" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<a href="<?= base_url('datauser') ?>" class="btn btn-danger" type="button">Cancel</a>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>