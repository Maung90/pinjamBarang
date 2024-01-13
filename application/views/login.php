
<form name="formlogin" method="post" action="<?php echo base_url('Login/proseslogin'); ?>">
    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 shadow box-area">
            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box bg-light" style="background-image: url(<?=base_url("/assets/img/illustrations/bg-shape-image-light.png");?>);" > 
                <div class="featured-image mb-3">
                    <img src="<?=base_url();?>/assets/img/illustrations/auth-reset-password-illustration-light.png" class="img-fluid" style="width: 250px;"> 
                </div>
            </div> 
            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 m-3">
                        <h4 class="fw-bold  my-1">Selamat Datang Di PNB-PinjamBarang! 👋</h4>
                        <p class="mb-4">Silahkan login dan mulai meminjam.</p>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control form-control-lg fs-6" placeholder="Username ">
                    </div>
                    <div class="input-group input-group-merge mb-1">
                        <input type="password" name="password" id="password" class="form-control form-control-lg fs-6" placeholder="Password" aria-describedby="password">
                        <span class="input-group-text cursor-pointer" id="mata">
                            <i class="ti ti-eye-off" id="matanya"></i>
                        </span>
                    </div>
                    <div class="d-flex justify-content-end"> 
                      <a href="<?=base_url('Login/Forgot_Password/'); ?>">
                        <small>Lupa Password?</small>
                    </a>
                </div> 
                <div class="input-group mt-4">
                    <button class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                </div>
            </div>
        </div> 

    </div>
</div>
</form> 

<script>  
    $(document).ready(function(){ 
        $('#mata').on('click',()=>{ 
            if ($('#password').attr("type") == "password") {
                $('#matanya').removeClass("ti-eye-off");
                $('#matanya').addClass("ti-eye");
                $('#password').removeAttr("type");
                $('#password').attr("type","text"); 
            }else{ 
                $('#matanya').removeClass("ti-eye");
                $('#matanya').addClass("ti-eye-off");
                $('#password').removeAttr("type");
                $('#password').attr("type","password"); 
            }
        });
    });
</script> 