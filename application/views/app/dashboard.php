<script src="<?= base_url(); ?>assets/build/js/custom.min.js"></script>
<script src="<?= base_url(); ?>assets/build/js/custom.js"></script>

<div class="right_col" role="main">
	<!-- top tiles -->
	<div class="row tile_count">
		<center>
			<div class="col-md-3 col-sm-12 col-xs-12 tile_stats_count">
				<span class="count_top"><i class="fa fa-user"></i> Total karyawan</span>
				<div class="count "><?= $total_user-1 ?></div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 tile_stats_count">
				<span class="count_top"><i class="fa fa-user"></i> Aktif</span>
				<div class="count "><?= $user_aktif_count-1 ?></div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 tile_stats_count">
				<span class="count_top"><i class="fa fa-calendar"></i> Sedang Cuti</span>
				<div class="count "><?= $user_cuti_count ?></div>
			</div>
			<div class="col-md-3 col-sm-12 col-xs-12 tile_stats_count">
				<span class="count_top"><i class="fa fa-clock-o"></i> Menunggu Approval</span>
				<div class="count "><?= $user_wait_count ?></div>
			</div>
		</center>
	</div>

	<div class="row">
		<?= $this->session->flashdata('pesan'); ?>
		<?php if (is_pimpinan_and_kabag()) : ?>
		<div class="col-md-4">
			<div class="x_panel">
				<div class="x_title">
					<h2>Sedang Aktif</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?php
						$no = 1;
						if ($user_aktif) :
							foreach ($user_aktif as $c) :
								if($c['jabatan_id'] != 1) :
					?>
					<article class="media event">
						<div class="media-body">
							<a class="pull-left date">
								<p class="day"><i class="fa fa-user"></i></p>
							</a>
							<a class="title" href="#"><?= $c['nama_kary'] ?></a>
							<p><?= $c['nama_jabatan'] ?></p>
						</div>
						<?php if($c['jabatan_id'] != 1) : ?>
						<div class="media-body">
							<a class="pull-left date">
								<p class="day"><i class="fa fa-briefcase"></i></p>
							</a>
							<a class="title" href="#">Bagian</a>
							<p><?= $c['nama_bagian'] ?></p>
						</div>
						<?php endif; ?>
					</article>
					<?php endif; ?>
					<?php endforeach; ?>
					<?php else : ?>
					<center>
						<article class="media event">
							<div class="media-body">
								<a class="title" href="#">Data Kosong</a>
							</div>
						</article>
					</center>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="x_panel">
				<div class="x_title">
					<h2>Sedang Cuti</h2>
					<?php if($userdata['status'] == 'cuti') : ?>
					<a onclick="return confirm('Konfirmasi')" href="<?= base_url('dashboard/akhiricuti/')?>"
						type="button" class="btn btn-success" style="float: right;">Akhiri Cuti</a>
					<?php endif; ?>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				<?php
					$no = 1;
					if ($user_cuti) :
						foreach ($user_cuti as $c) :
							if(is_kabag()) :
								if($c['jabatan_id'] != 1) :

				?>
								<article class="media event">
									<div class="media-body">
										<a class="pull-left date">
											<p class="day"><i class="fa fa-user"></i></p>
										</a>
										<a class="title" href="#"><?= $c['nama_kary'] ?></a>
										<p><?= $c['nama_cuti'] ?></p>
									</div>
									<div class="media-body">
										<a class="pull-left date">
											<p class="day"><i class="fa fa-calendar"></i></p>
										</a>
										<a class="title" href="#">Sampai tanggal</a>
										<p><?= $c['akhir_cuti'] ?></p>
									</div>
								</article>
								<?php endif; ?>
							<?php else : ?>
							<article class="media event">
									<div class="media-body">
										<a class="pull-left date">
											<p class="day"><i class="fa fa-user"></i></p>
										</a>
										<a class="title" href="#"><?= $c['nama_kary'] ?></a>
										<p><?= $c['nama_cuti'] ?></p>
									</div>
									<div class="media-body">
										<a class="pull-left date">
											<p class="day"><i class="fa fa-calendar"></i></p>
										</a>
										<a class="title" href="#">Sampai tanggal</a>
										<p><?= $c['akhir_cuti'] ?></p>
									</div>
								</article>
							<?php endif; ?>
					<?php endforeach; ?>
				<?php else : ?>
					<center>
						<article class="media event">
							<div class="media-body">
								<a class="title" href="#">Data Kosong</a>
							</div>
						</article>
					</center>
				<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="col-md-4">
			<div class="x_panel">
				<div class="x_title">
					<h2>Waiting Approval</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				<?php
					$no = 1;
					if ($user_wait) :
						foreach ($user_wait as $c) :
							if (!is_pimpinan_and_kabag()) :
								if ($c['user_id'] == $this->session->userdata('login_session')['user']) :
				?>
								<article class="media event">
									<div class="media-body">
										<a class="pull-left date">
											<p class="day"><i class="fa fa-user"></i></p>
										</a>
										<a class="title" href="#"><?= $c['nama_kary'] ?></a>
										<p><?= $c['nama_cuti'] ?></p>
									</div>
									<div class="media-body">
										<a class="pull-left date">
											<p class="day"><i class="fa fa-calendar"></i></p>
										</a>
										<a class="title" href="#">Sampai tanggal</a>
										<p><?= $c['akhir_cuti'] ?></p>
									</div>
								</article>
								<?php endif; ?>
							<?php else : 
								if(is_kabag()) :
									if($c['jabatan_id'] != 1) :
							?>
									<article class="media event">
										<div class="media-body">
											<a class="pull-left date">
												<p class="day"><i class="fa fa-user"></i></p>
											</a>
											<a class="title" href="#"><?= $c['nama_kary'] ?></a>
											<p><?= $c['nama_cuti'] ?></p>
										</div>
										<div class="media-body">
											<a class="pull-left date">
												<p class="day"><i class="fa fa-calendar"></i></p>
											</a>
											<a class="title" href="#">Sampai tanggal</a>
											<p><?= $c['akhir_cuti'] ?></p>
										</div>
									</article>
									<?php endif; ?>
								<?php else : ?>
								<article class="media event">
									<div class="media-body">
										<a class="pull-left date">
											<p class="day"><i class="fa fa-user"></i></p>
										</a>
										<a class="title" href="#"><?= $c['nama_kary'] ?></a>
										<p><?= $c['nama_cuti'] ?></p>
									</div>
									<div class="media-body">
										<a class="pull-left date">
											<p class="day"><i class="fa fa-calendar"></i></p>
										</a>
										<a class="title" href="#">Sampai tanggal</a>
										<p><?= $c['akhir_cuti'] ?></p>
									</div>
								</article>
								<?php endif; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php else : ?>
					<center>
						<article class="media event">
							<div class="media-body">
								<a class="title" href="#">Data Kosong</a>
							</div>
						</article>
					</center>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
