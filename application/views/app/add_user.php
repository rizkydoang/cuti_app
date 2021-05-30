<div class="right_col" role="main">
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Form Add <small>Halaman Add User</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
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
            <?= form_open('masterdata/add_user', ['class' => 'users']); ?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_kary">Nama Karyawan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nama_kary" name="nama_kary" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nip">NIP <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nip" name="nip" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label for="tgl_lahir" class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Lahir</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="tgl_lahir" class="date-picker form-control col-md-7 col-xs-12" type="date" name="tgl_lahir">
                </div>
              </div>
              <div class="form-group">
                <label for="tgl_masuk" class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Masuk</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="tgl_masuk" class="date-picker form-control col-md-7 col-xs-12" type="date" name="tgl_masuk">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p>
                    <?php foreach ($jabatan as $j) :
                      if ($j['jabatan_id'] != 1) : ?>
                        <?= $j['nama_jabatan']; ?>
                      <input type="radio" class="flat" name="jabatan_id" id="jabatan_id" value="<?= $j['jabatan_id']; ?>" checked="" required /> 
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Bagian</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p>
                    <?php foreach ($bagian as $b) :?>
                        <?= $b['nama_bagian']; ?>
                      <input type="radio" class="flat" name="bagian_id" id="bagian_id" value="<?= $b['bagian_id']; ?>" checked="" required /> 
                    <?php endforeach; ?>
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
</div>