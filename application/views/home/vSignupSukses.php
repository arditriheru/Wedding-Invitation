<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="h3"><?= $subtitle; ?></a>
            </div>
            <div class="card-body">
                <img src="<?= base_url(); ?>assets/dist/img/alert-success.png" class="img-fluid" alt="Sukses giff">
                <p class="text-center mt-3">Daftar akun baru berhasil, silahkan login dengan menggunakan email <a href="<?= base_url(); ?>login?event=none&id=<?= $this->input->get('id'); ?>" target="_blank"><?= $this->input->get('id'); ?></a><br>dan password yang sudah dibuat.</p>
                <a href="<?= base_url(); ?>login?id=<?= $this->input->get('id'); ?>">
                    <p class="btn btn-primary btn-sm text-left mt-3"><i class="fas fa-arrow-left"></i> Login Sekarang</p>
                </a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</div>