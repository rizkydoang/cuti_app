<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Master Data <small>Semua data bisa anda kelola pada halaman ini</small></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Data User </h2>
						<badge>
						<a style="margin-left: 20px;" href="<?= base_url('masterdata/add_user') ?>" type="button"
								class="btn btn-primary">Tambah User</a>
						<a href="<?= base_url('masterdata/reset_sisa_cuti') ?>" onclick="return confirm('Yakin ingin mereset sisa cuti semua karyawan?')" type="button"
								class="btn btn-danger">Reset Sisa Cuti</a>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<?= $this->session->flashdata('pesan'); ?>
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
									<tr class="headings">
										<th class="column-title">No. </th>
										<th class="column-title">NIP </th>
										<th class="column-title">Nama Karyawan </th>
										<th class="column-title">Tgl Lahir </th>
										<th class="column-title">Password </th>
										<th class="column-title">Tgl Masuk </th>
										<th class="column-title">Jabatan </th>
										<th class="column-title">Bagian </th>
										<th class="column-title">Sisa Cuti </th>
										<th class="column-title no-link last"><span class="nobr">Action</span>
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
                            if ($users) :
                                foreach ($users as $u) :
                            ?>
									<tr class="even pointer">
										<td class=" "><?= $no++; ?></td>
										<td class=" "><?= $u['nip']; ?></td>
										<td class=" "><?= $u['nama_kary']; ?></td>
										<td class=" "><?= $u['tgl_lahir']; ?></td>
										<td class=" "><?= $u['password']; ?></td>
										<td class=" "><?= $u['tgl_masuk']; ?></td>
										<td class=" "><?= $u['nama_jabatan']; ?></td>
										<td class=" "><?= $u['nama_bagian']; ?></td>
										<td class=" "><?= $u['sisa_cuti']; ?> </td>
										<td>
											<center>
												<a href="<?=base_url('masterdata/edit_user/') . $u['user_id'] ?>"
													type="button" class="btn btn-success">Edit</a>
												<?php if( $u['is_active'] == 1 ) : ?>
												<a href="<?=base_url('masterdata/deactivate_user/') . $u['user_id'] ?>"
													type="button" class="btn btn-primary">Aktif</a>
												<?php else :?>
												<a href="<?=base_url('masterdata/activate_user/') . $u['user_id'] ?>"
													type="button" class="btn btn-warning">Nonaktif</a>
												<?php endif; ?>
												<a onclick="return confirm('Yakin ingin menghapus?')"
													href="<?=base_url('masterdata/delete_user/') . $u['user_id'] ?>"
													type="button" class="btn btn-danger">Hapus</a>
											</center>
											<!-- <a href="<?=base_url('masterdata/edit_user')?>">Edit</a>  -->
										</td>
									</tr>
									<?php endforeach; ?>
									<?php else : ?>
									<tr>
										<td colspan="8" class="text-center">Data Kosong</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Data Jenis Cuti </h2>
						<badge><a style="margin-left: 20px;" href="<?= base_url('masterdata/add_jeniscuti') ?>"
								type="button" class="btn btn-primary">Tambah Jenis Cuti</a>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
					</div>

					<div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
									<tr class="headings">
										<th class="column-title">No. </th>
										<th class="column-title">Nama Cuti </th>
										<th class="column-title no-link last"><span class="nobr">Action</span>
										</th>
										<th class="bulk-actions" colspan="7">
											<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
													class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
										</th>
									</tr>
								</thead>

								<tbody>
									<tr class="even pointer">
										<?php
                        $no = 1;
                        if ($jenis_cuti) :
                            foreach ($jenis_cuti as $jns) :
                        ?>
									<tr class="even pointer">
										<td class=" "><?= $no++ ?></td>
										<td class=" "><?= $jns['nama_cuti']; ?></td>
										<td>
											<a href="<?=base_url('masterdata/edit_jeniscuti/') . $jns['jeniscuti_id'] ?>"
												type="button" class="btn btn-success">Edit</a>
											<a onclick="return confirm('Yakin ingin menghapus?')"
												href="<?=base_url('masterdata/delete_jeniscuti/') . $jns['jeniscuti_id'] ?>"
												type="button" class="btn btn-danger">Hapus</a>
										</td>
										<?php endforeach; ?>
									</tr>
									<?php else : ?>
									<tr>
										<td colspan="8" class="text-center">Data Kosong</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Data Bagian </h2>
						<badge><a style="margin-left: 20px;" href="<?= base_url('masterdata/add_bagian') ?>"
								type="button" class="btn btn-primary">Tambah Bagian</a>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
					</div>

					<div class="x_content">
						<div class="table-responsive">
							<table class="table table-striped jambo_table bulk_action">
								<thead>
									<tr class="headings">
										<th class="column-title">No </th>
										<th class="column-title">Nama Bagian </th>
										<th class="column-title no-link last"><span class="nobr">Action</span>
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
                        if ($bagian) :
                            foreach ($bagian as $b) :
                        ?>
									<tr class="even pointer">
										<td class=" "><?= $no++ ?></td>
										<td class=" "><?= $b['nama_bagian']; ?></td>
										<td>
											<a href="<?=base_url('masterdata/edit_bagian/') . $b['bagian_id'] ?>"
												type="button" class="btn btn-success">Edit</a>
											<a onclick="return confirm('Yakin ingin menghapus?')"
												href="<?=base_url('masterdata/delete_bagian/') . $b['bagian_id'] ?>"
												type="button" class="btn btn-danger">Hapus</a>
										</td>
										<?php endforeach; ?>
									</tr>
									<?php else : ?>
									<tr>
										<td colspan="8" class="text-center">Data Kosong</td>
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
