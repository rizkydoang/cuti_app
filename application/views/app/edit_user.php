<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Form Edit <small>Halaman Edit User</small></h2>
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
						<?= form_open('', [], ['user_id' => $user['user_id']]); ?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_kary">Nama Karyawan <span
									class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="<?= set_value('nama_kary', $user['nama_kary']); ?>" id="nama_kary"
									name="nama_kary" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nip">NIP <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="<?= set_value('nip', $user['nip']); ?>" id="nip" name="nip"
									required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span
									class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" value="<?= set_value('password', $user['password']); ?>" id="password"
									name="password" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label for="tgl_lahir" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="tgl_lahir" value="<?= set_value('tgl_lahir', $user['tgl_lahir']); ?>"
									class="form-control col-md-7 col-xs-12" type="text" readonly="readonly" name="tgl_lahir">
							</div>
						</div>
						<div class="form-group">
							<label for="tgl_masuk" class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Masuk</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="tgl_masuk" value="<?= set_value('tgl_masuk'), $user['tgl_masuk']; ?>"
									class="form-control col-md-7 col-xs-12" type="text" readonly="readonly" name="tgl_masuk">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<p>
									<?php if ($user['jabatan_id'] != 1) :
					foreach ($jabatan as $j) :
						if ($j['jabatan_id'] != 1) :
						if ($j['jabatan_id'] == $user['jabatan_id']) : ?>
									<?= $j['nama_jabatan']; ?>
									<input type="radio" class="flat" name="jabatan_id" id="jabatan_id" value="<?= $j['jabatan_id']; ?>"
										checked="" required />
									<?php else : ?>
									<?= $j['nama_jabatan']; ?>
									<input type="radio" class="flat" name="jabatan_id" id="jabatan_id" value="<?= $j['jabatan_id']; ?>"
										required />
									<?php endif; ?>
									<?php endif; ?>
									<?php endforeach; ?>
									<?php endif; ?>
								</p>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Bagian</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<p>
									<?php  if ($user['jabatan_id'] != 1) :
					foreach ($bagian as $b) :
						if ($b['bagian_id'] == $user['bagian_id']) : ?>
									<?= $b['nama_bagian']; ?>
									<input type="radio" class="flat" name="bagian_id" id="bagian_id" value="<?= $b['bagian_id']; ?>"
										checked="" required />
									<?php else : ?>
									<?= $b['nama_bagian']; ?>
									<input type="radio" class="flat" name="bagian_id" id="bagian_id" value="<?= $b['bagian_id']; ?>"
										required />
									<?php endif; ?>
									<?php endforeach; ?>
									<?php endif; ?>
								</p>
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