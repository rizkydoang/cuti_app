<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Form Pengajuan Cuti</h2>

					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
						<?= $this->session->flashdata('pesan'); ?>
						<?= form_open('', [], ['user_id' => $this->session->userdata('login_session')['user']]); ?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Mulai Cuti</label>
							<div class="col-md-3 xdisplay_inputx form-group has-feedback">
								<input type="date" class="form-control has-feedback-left" id="mulai_cuti" name="mulai_cuti"
									placeholder="First Name" aria-describedby="inputSuccess2Status2">
								<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
								<span id="inputSuccess2Status2" class="sr-only">(success)</span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Selesai Cuti</label>
							<div class="col-md-3 xdisplay_inputx form-group has-feedback">
								<input type="date" class="form-control has-feedback-left" id="akhir_cuti" name="akhir_cuti"
									placeholder="First Name" aria-describedby="inputSuccess2Status2">
								<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
								<span id="inputSuccess2Status2" class="sr-only">(success)</span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Cuti</label>
							<div class="col-md-3 xdisplay_inputx form-group has-feedback">
								<select class="form-control" name="jeniscuti_id">
									<option value="" selected disabled>Choose option</option>
									<?php foreach ($cuti as $j) : ?>
									<option <?= $this->uri->segment(3) == $j['jeniscuti_id'] ? 'selected' : '';  ?>
										<?= set_select('jeniscuti_id', $j['jeniscuti_id']) ?> value="<?= $j['jeniscuti_id'] ?>">
										<?= $j['nama_cuti']?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="keterangan" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan </span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id='keterangan' required='required' rows='3' class='form-control'
									name='keterangan'></textarea>
							</div>
						</div>

						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="reset" class="btn btn-primary">Reset</button>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>