<!-- page content -->
<div class="right_col" role="main">
<div class="heading">
    <h3>Master Data <small>Data Lainnya  </small> </h3>
</div>
	<div class="row">
        <?= $this->session->flashdata('pesan'); ?>
		<div class="col-md-6 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Status </h2>
					<badge>
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
									<th class="column-title">Status </th>
									<th class="column-title no-link last"><span class="nobr">Action</span>
									</th>
									<th class="bulk-actions" colspan="7">
										<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions (
											<span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
									</th>
								</tr>
							</thead>

							<tbody>
								<?php
                                    $no = 1;
                                    if ($status) :
                                        foreach ($status as $s) :
                                    ?>
								<tr class="even pointer">
									<td class=" "><?= $no++ ?></td>
									<td class=" "><?= $s['status']; ?></td>
									<td>
										<a href="<?=base_url('masterdata/edit_status/') . $s['status_id'] ?>"
											type="button" class="btn btn-success">Edit</a>
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
					<h2>Data Jabatan </h2>
					<badge>
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
									<th class="column-title">No</th>
									<th class="column-title">Nama jabatan</th>
                                    <th class="column-title">Description</th>
									<th class="column-title no-link last"><span class="nobr">Action</span>
									</th>
									<th class="bulk-actions" colspan="7">
										<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions (
											<span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
									</th>
								</tr>
							</thead>

							<tbody>
								<?php
                                    $no = 1;
                                    if ($jabatan) :
                                        foreach ($jabatan as $j) :
                                    ?>
								<tr class="even pointer">
									<td class=" "><?= $no++ ?></td>
									<td class=" "><?= $j['nama_jabatan']; ?></td>
                                    <td class=" "><?= $j['descript']; ?></td>
									<td>
										<a href="<?=base_url('masterdata/edit_jabatan/') . $j['jabatan_id'] ?>"
											type="button" class="btn btn-success">Edit</a>
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
</div><!-- /page content -->
