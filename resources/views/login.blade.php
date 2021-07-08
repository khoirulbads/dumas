<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>SI Pengaduan Masyarakat</title>
    <link rel="apple-touch-icon" href="assets/back/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/login.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/back/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>

<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0" >
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img src="assets/img/login.png" alt="branding logo" style="padding-right: 30px;">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2" style="text-align: center;">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4>Login</h4>
                                            </div>
                                            <img src="">
                                        </div>
                                        <p class="px-2">Welcome back, please login to your account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="{{ url('/actlog')}}" method="get">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" name="user" class="form-control" id="user-name" placeholder="Username" autocomplete="off" required="">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Username</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" name="pass" class="form-control" id="user-password" placeholder="Password"autocomplete="off" required="">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                    <br><br>
                                                    <button type="submit" class="btn float-right btn-block" style="background-color:#0080C9;color:white;">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <?php
                                                $data = DB::SELECT("select * from pengguna where LEVEL = 'Admin'");
                                                if(count($data) >= 1){
                                                ?> 
                                                <div class="divider">
                                                    <div class="divider-text">OR</div>
                                                </div>
                                                <a href="#" class="btn btn-outline-primary btn-block" style="margin-bottom: 20px;" data-toggle="modal" data-target="#daftar">Register</a>
                                                <br>
                                                <?php
                                                }else{
                                            ?>
                                              <a href="#" class="btn btn-outline-primary btn-block" style="margin-bottom: 20px;" data-toggle="modal" data-target="#primary">Register</a>
                                          <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-md" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary white">
                  <h5 class="modal-title" id="myModalLabel160">Register</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{url('/regis')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            
                            <input type="hidden" name="idp" value="1" readonly="">
                           
                            <div class="col-md-4">
                              <center>
                                FOTO<br>
                               <img id="image-preview" style="width: 130px; height: 130px;margin: 10px 0px 10px 0px;border:1px solid white;border-radius: 100px;"><br>
                                <input type="file" name="foto" class="form-control" id="image-source" onchange="previewImage();" style="width: 100%;" autocomplete="off"><br><br>
                              </center>
                            </div>
                            <div class="col-md-8">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Nama</label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="nama" placeholder="nama lengkap" autocomplete="off" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Email</label>
                                        <input type="email" id="email-id-vertical" class="form-control" name="email" placeholder="email" autocomplete="off" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="contact-info-vertical">Username</label>
                                        <input type="text" id="contact-info-vertical" class="form-control" name="user" placeholder="username" autocomplete="off" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password-vertical">Password</label>
                                        <input type="text" id="password-vertical" class="form-control" name="pass" placeholder="password" autocomplete="off" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary"><i class="feather icon-check-circle"></i> Simpan</button>
              </div>
              </form>
          </div>
      </div>
  </div>

  <div class="modal fade text-left" id="daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary white">
                  <h5 class="modal-title" id="myModalLabel160">Register</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{url('/regis:pengunjung')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            @foreach($idp as $id)
                              <input type="hidden" name="idp" value="{{$id->PENG_ID+1}}" readonly="">
                            @endforeach
                            
                            <div class="col-md-12">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Nama</label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="nama" placeholder="nama lengkap" autocomplete="off" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Email</label>
                                        <input type="email" id="email-id-vertical" class="form-control" name="email" placeholder="email" autocomplete="off" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="contact-info-vertical">Username</label>
                                        <input type="text" id="contact-info-vertical" class="form-control" name="user" placeholder="username" autocomplete="off" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="password-vertical">Password</label>
                                        <input type="text" id="password-vertical" class="form-control" name="pass" placeholder="password" autocomplete="off" required="">
                                    </div>
                                </div>
                                <div class="col-12">
                                <div class="form-group">
                                    <label for="password-vertical">Foto</label>
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary"><i class="feather icon-check-circle"></i> Simpan</button>
              </div>
              </form>
          </div>
      </div>
  </div>

    <script src="assets/back/app-assets/vendors/js/vendors.min.js"></script>
    <script src="assets/back/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="assets/back/app-assets/js/core/app-menu.js"></script>
    <script src="assets/back/app-assets/js/core/app.js"></script>
    <script src="assets/back/app-assets/js/scripts/components.js"></script>
    <script type="text/javascript">
        function previewImage() {
        document.getElementById("image-preview").style.display = "inline";
        var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

        oFReader.onload = function(oFREvent) {
          document.getElementById("image-preview").src = oFREvent.target.result;
            };
        };
    </script>
</body>

</html>