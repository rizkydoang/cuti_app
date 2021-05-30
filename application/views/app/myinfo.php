<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>My Info</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
							<div class="profile_img">
								<div id="crop-avatar">

								</div>
							</div>
							<h3><?= $userdata['nama_kary']; ?></h3>

							<ul class="list-unstyled user_data">
								<li><i class="fa fa-male user-profile-icon"> NIP : </i> <?= $userdata['nip']; ?>
								</li>

								<li>
									<i class="fa fa-calendar user-profile-icon"> Tgl Lahir : </i>
									<?= $userdata['tgl_lahir']; ?>
								</li>

								<li class="m-top-xs">
									<i class="fa fa-institution user-profile-icon"> Jabatan : </i>
									<?= $userdata['nama_jabatan']; ?>
								</li>
								<li class="m-top-xs">
									<i class="fa fa-group user-profile-icon"> Bagian : </i> <?= $userdata['nama_bagian']; ?>
								</li>
								<li class="m-top-xs">
									<i class="fa fa-check-circle-o user-profile-icon"> Tanggal Masuk Kerja : </i>
									<?= $userdata['tgl_masuk']; ?>
								</li>
								<li class="m-top-xs">
									<i class="fa fa-info user-profile-icon"> Status : </i> <?= $userdata['status']; ?>
								</li>
							</ul>
							<br />

							<!-- start skills -->
							<ul class="list-unstyled user_data">
								<li>
									<p>Sisa Cuti Tahunan</p>
									<div class="progress">
										<div class="progress-bar bg-green" role="progressbar" style="width: 100%;" aria-valuenow="7"
											aria-valuemin="0" aria-valuemax="12">
											<?= $userdata['sisa_cuti']; ?> Hari</div>
									</div>
								</li>
						</div>
						<!-- end of skills -->


						<div class="col-md-9 col-sm-9 col-xs-9">
							<div class="x_panel">
								<div class="x_title">
									<h2>History </h2>
									<div class="clearfix"></div>
								</div>
								<?= $this->session->flashdata('pesan'); ?>
								<?= form_open('', []); ?>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-1 col-xs-12">Mulai Cuti :</label>
									<div class="col-md-4 xdisplay_inputx form-group has-feedback">
										<input type="date" class="form-control has-feedback-left" id="from_date" name="from_date">
										<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
										<span id="inputSuccess2Status2" class="sr-only">(success)</span>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2 col-sm-1 col-xs-12">Selesai Cuti :</label>
									<div class="col-md-4 xdisplay_inputx form-group has-feedback">
										<input type="date" class="form-control has-feedback-left" id="to_date" name="to_date">
										<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
										<span id="inputSuccess2Status2" class="sr-only">(success)</span>
									</div>
								</div>
                <button type="submit" class="btn btn-primary">Cari</button>
								<?= form_close(); ?>
								<div class="x_content">

									<div class="table-responsive">
										<table class="table table-striped jambo_table bulk_action">
											<thead>
												<tr class="headings">
													<th class="column-title">No.</th>
													<th class="column-title">Tanggal Cuti </th>
													<th class="column-title">Selesai Cuti </th>
													<th class="column-title">Jumlah Cuti </th>
													<th class="column-title">Keterangan </th>
													<th class="column-title">Status </th>
													</th>
													<th class="bulk-actions" colspan="7">
														<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
																class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
													</th>
												</tr>
											</thead>

											<tbody>
												<?php
                          $no = 1;
                          if ($cuti) :
                            foreach ($cuti as $h) :
                        ?>
												<tr class="even pointer">
													<td class=" "><?= $no++; ?></td>
													<td class=" "><?= $h['mulai_cuti']; ?></td>
													<td class=" "><?= $h['akhir_cuti']; ?></td>
													<td class=" "><?= $h['jumlah_cuti']; ?> Hari</td>
													<td class=" "><?= $h['keterangan']; ?></td>
													<td>
														<?php if ($h['status_id'] == 1) : ?>
														<center>
															<a class="btn btn-warning btn-xs"><?= $h['status']; ?></a>
														</center>
														<?php elseif ($h['status_id'] == 2 ) : ?>
														<center>
															<a class="btn btn-primary btn-xs"><?= $h['status']; ?></a>
														</center>
														<?php elseif ($h['status_id'] == 3 ) : ?>
														<center>
															<a class="btn btn-success btn-xs"><?= $h['status']; ?></a>
														</center>
														<?php elseif ($h['status_id'] == 4 ) : ?>
														<center>
															<a class="btn btn-danger btn-xs"><?= $h['status']; ?></a>
														</center>
														<?php endif; ?>
														<?php endforeach; ?>
													</td>
												</tr>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>