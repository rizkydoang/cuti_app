<!-- page content -->
<div class="right_col" role="main">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Approve Cuti</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="table-responsive">
						<?= $this->session->flashdata('pesan'); ?>
						<table class="table table-striped jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">No. </th>
									<th class="column-title">NIP </th>
									<th class="column-title">Nama Karyawan</th>
									<th class="column-title">Jabatan</th>
									<th class="column-title">Tanggal Cuti</th>
									<th class="column-title">Selesai Cuti</th>
									<th class="column-title">Jumlah Cuti</th>
									<th class="column-title">Sisa Cuti</th>
									<th class="column-title">Keterangan</th>
									<th class="column-title">Status</th>
									<th class="column-title no-link last"><span class="nobr">Action</span></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								if ($cuti) :
									foreach ($cuti as $c) :
										if (!is_pimpinan()) :
											if ($c['jabatan_id'] != 1) :
								?>
										<tr class="even pointer">
											<td class=" "><?= $no++ ?></td>
											<td class=" "><?= $c['nip']; ?></td>
											<td class=" "><?= $c['nama_kary']; ?></td>
											<td class=" "><?= $c['nama_jabatan']; ?></td>
											<td class=" "><?= $c['mulai_cuti']; ?></td>
											<td class=" "><?= $c['akhir_cuti']; ?></td>
											<td class=" "><?= $c['jumlah_cuti']; ?> Hari</td>
											<td class=" "><?= $c['sisa_cuti']; ?> Hari</td>
											<td class=" "><?= $c['keterangan']; ?></td>
											<td>
												<?php if ($c['status_id'] == 1) : ?>
												<center>
													<a class="btn btn-warning btn-xs"><?= $c['status']; ?></a>
												</center>
												<?php elseif ($c['status_id'] == 2 ) : ?>
												<center>
													<a class="btn btn-primary btn-xs"><?= $c['status']; ?></a>
												</center>
												<?php elseif ($c['status_id'] == 3 ) : ?>
												<center>
													<a class="btn btn-success btn-xs"><?= $c['status']; ?></a>
												</center>
												<?php elseif ($c['status_id'] == 4 ) : ?>
												<center>
													<a class="btn btn-danger btn-xs"><?= $c['status']; ?></a>
												</center>
												<?php endif; ?>
											</td>
											<td>
												<?php if ($role == 1) : ?>
													<?php if ($c['status_id'] != 3 && $c['status_id'] != 4) : ?>
													<center>
														<a onclick="return confirm('Konfirmasi')"
															href="<?= base_url('approve/acceptpimpinan/') . $c['cuti_id'] ?>" type="button"
															class="btn btn-success">Terima</a>
														<a onclick="return confirm('Konfirmasi')"
															href="<?= base_url('approve/declinepimpinan/') . $c['cuti_id'] ?>" type="button"
															class="btn btn-danger">Tolak</a>
													</center>
													<?php endif; ?>
												<?php endif; ?>
												<?php if ($role == 2) : ?>
													<?php if ($c['status_id'] == 1) : ?>
													<center>
														<a onclick="return confirm('Konfirmasi')"
															href="<?= base_url('approve/acceptkabag/') . $c['cuti_id'] ?>" type="button"
															class="btn btn-success">Terima</a>
														<a onclick="return confirm('Konfirmasi')"
															href="<?= base_url('approve/declinekabag/') . $c['cuti_id'] ?>" type="button"
															class="btn btn-danger">Tolak</a>
													</center>
													<?php endif; ?>
												<?php endif; ?>
											</td>
										</tr>
										<?php endif; ?>
									<?php else : ?>
										<tr class="even pointer">
											<td class=" "><?= $no++ ?></td>
											<td class=" "><?= $c['nip']; ?></td>
											<td class=" "><?= $c['nama_kary']; ?></td>
											<td class=" "><?= $c['nama_jabatan']; ?></td>
											<td class=" "><?= $c['mulai_cuti']; ?></td>
											<td class=" "><?= $c['akhir_cuti']; ?></td>
											<td class=" "><?= $c['jumlah_cuti']; ?> Hari</td>
											<td class=" "><?= $c['sisa_cuti']; ?> Hari</td>
											<td class=" "><?= $c['keterangan']; ?></td>
											<td>
												<?php if ($c['status_id'] == 1) : ?>
												<center>
													<a class="btn btn-warning btn-xs"><?= $c['status']; ?></a>
												</center>
												<?php elseif ($c['status_id'] == 2 ) : ?>
												<center>
													<a class="btn btn-primary btn-xs"><?= $c['status']; ?></a>
												</center>
												<?php elseif ($c['status_id'] == 3 ) : ?>
												<center>
													<a class="btn btn-success btn-xs"><?= $c['status']; ?></a>
												</center>
												<?php elseif ($c['status_id'] == 4 ) : ?>
												<center>
													<a class="btn btn-danger btn-xs"><?= $c['status']; ?></a>
												</center>
												<?php endif; ?>
											</td>
											<td>
												<?php if ($role == 1) : ?>
													<?php if ($c['status_id'] != 3 && $c['status_id'] != 4) : ?>
													<center>
														<a onclick="return confirm('Konfirmasi')"
															href="<?= base_url('approve/acceptpimpinan/') . $c['cuti_id'] ?>" type="button"
															class="btn btn-success">Terima</a>
														<a onclick="return confirm('Konfirmasi')"
															href="<?= base_url('approve/declinepimpinan/') . $c['cuti_id'] ?>" type="button"
															class="btn btn-danger">Tolak</a>
													</center>
													<?php endif; ?>
												<?php endif; ?>
												<?php if ($role == 2) : ?>
													<?php if ($c['status_id'] == 1) : ?>
													<center>
														<a onclick="return confirm('Konfirmasi')"
															href="<?= base_url('approve/acceptkabag/') . $c['cuti_id'] ?>" type="button"
															class="btn btn-success">Terima</a>
														<a onclick="return confirm('Konfirmasi')"
															href="<?= base_url('approve/declinekabag/') . $c['cuti_id'] ?>" type="button"
															class="btn btn-danger">Tolak</a>
													</center>
													<?php endif; ?>
												<?php endif; ?>
											</td>
										</tr>
										<?php endif; ?>
								<?php endforeach; ?>
								<?php else : ?>
								<tr>
									<td colspan="11" class="text-center">
										Data Kosong
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
<!-- /page content -->