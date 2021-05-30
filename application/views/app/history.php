<div class="right_col" role="main">
	<div class="row">
		<div class="clearfix"></div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>History</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="table-responsive">
						<table class="table table-striped jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th class="column-title">No.</th>
									<th class="column-title">NIP Karyawan </th>
									<th class="column-title">Nama Karyawan </th>
									<th class="column-title">Jabatan </th>
									<th class="column-title">Tanggal Cuti </th>
									<th class="column-title">Selesei Cuti </th>
									<th class="column-title">Jumlah Cuti </th>
									<th class="column-title">Sisa Cuti </th>
									<th class="column-title">Keterangan </th>
									<th class="column-title">Status </th>
									</th>
									<th class="bulk-actions" colspan="7">
										<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">
											</span> ) <i class="fa fa-chevron-down"></i></a>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
                  $no = 1;
                  if ($history) :
                    foreach ($history as $h) :
                ?>
								<tr class="even pointer">
									<td class=" "><?= $no++; ?></td>
									<td class=" "><?= $h['nip']; ?></td>
									<td class=" "><?= $h['nama_kary']; ?></td>
									<td class=" "><?= $h['nama_jabatan']; ?></td>
									<td class=" "><?= $h['mulai_cuti']; ?></td>
									<td class=" "><?= $h['akhir_cuti']; ?></td>
									<td class=" "><?= $h['jumlah_cuti']; ?> Hari</td>
									<td class=" "><?= $h['sisa_cuti']; ?> Hari</td>
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