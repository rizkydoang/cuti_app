<link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">
<div class="page">
  <div class="container">
    <div class="left" style="border-radius: 10px">
    <center>
    <?= $this->session->flashdata('pesan'); ?>
    </center>
      <div class="login">Login</div>
      <div class="eula">BCA KCP Gunung Sahari</div>
    </div>
    <div class="right" style="border-radius: 10px;">
      <svg viewBox="0 0 320 300">
        <defs>
            <linearGradient
                inkscape:collect="always"
                id="linearGradient"
                x1="13"
                y1="193.49992"
                x2="307"
                y2="193.49992"
                gradientUnits="userSpaceOnUse">
            <stop
                style="stop-color:#7FFFD4;"
                offset="0"
                id="stop876" />
            <stop
                style="stop-color:#7FFFD4;"
                offset="1"
                id="stop878" />
            </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
        <?= form_open('', ['class' => 'user']); ?>
        <div class="form">
            <label for="nip">NIP</label>
            <input type="text" autocomplete="off" value="<?= set_value('nip'); ?>" id="nip" name="nip">
            <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            <input type="submit" id="submit" value="Submit">
        </div>
        <?= form_close(); ?>
    </div>
  </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js'></script>
<script  src="<?= base_url(); ?>assets/build/js/script.js"></script>