<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="h1"><?= $title; ?></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><?= $subtitle; ?></p>

                <script>
                    function onChange() {
                        const password = document.querySelector('input[name=password]');
                        const password_retype = document.querySelector('input[name=password_retype]');
                        if (password_retype.value === password.value) {
                            password_retype.setCustomValidity('');
                        } else {
                            password_retype.setCustomValidity('Password tidak sesuai');
                        }
                    }
                </script>

                <form class="form-prevent" action="<?php echo base_url(); ?>login/signupAksi" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Nama lengkap" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div id="alert"></div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Contoh : user@undanganku.com" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="contact" placeholder="Nomor WhatsApp" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Alamat Lengkap" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-marker"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" onChange="onChange()" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_retype" onChange="onChange()" placeholder="Confirm password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-info btn-block button-prevent" type="submit">
                                <!-- spinner-border adalah component bawaan bootstrap untuk menampilakn roda berputar  -->
                                <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Register</div>
                                <div class="hide-text">Register</div>
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</div>