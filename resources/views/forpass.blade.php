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
    <title>Lupa Password</title>
    <link rel="apple-touch-icon" href="assets/back/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/back/app-assets/images/ico/favicon.ico">
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
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="assets/back/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/back/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-5 d-lg-block d-none text-center align-self-center">
                                    <img src="assets/back/app-assets/images/pages/forgot-password.png" alt="branding logo">
                                </div>
                                <div class="col-lg-7 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2 py-1">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Memulihkan Kata Sandi Anda</h4>
                                            </div>
                                        </div>
                                        <br>
                                        <p class="px-2 mb-0" style="text-align:justify;">Silahkan masukkan alamat email akun anda yang telah terdaftar di sistem informasi kami dan kami akan mengirimkan beberapa informasi akun anda melalui email anda</p>
                                        <div class="col-md-12" style="margin-top: 10px;">
                                            <?php if(Session::get('gagal')){ ?>
                                                <div class="alert" style=" color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;margin-bottom: 0px;">
                                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                                                    email yang anda masukkan tidak cocok !!!
                                                </div>
                                            <?php }elseif(Session::get('berhasil')){ ?>
                                                <div class="alert" style=" color: #004085; background-color: #cce5ff; border-color: #b8daff;margin-bottom: 0px;">
                                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                                                     silahkan cek password anda di email anda !!!
                                                </div>
                                            <?php }else{

                                            }?>
                                        </div>
                                        <div class="card-content">
                                            <form action="{{ url('/sendpass')}}" method="post">
                                                {{csrf_field()}}
                                                <div class="card-body">
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required="">
                                                        <label for="inputEmail">Email</label>
                                                    </div>
                                                    <div class="float-md-left d-block mb-1">
                                                        <a href="{{ url('/auth')}}" class="btn btn-outline-primary btn-block px-75">Kembali</a>
                                                    </div>
                                                    <div class="float-md-right d-block mb-1">
                                                        <button class="btn btn-block px-75" style="background-color:#0080C9;color:white;">Pulihkan Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="assets/back/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="assets/back/app-assets/js/core/app-menu.js"></script>
    <script src="assets/back/app-assets/js/core/app.js"></script>
    <script src="assets/back/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>