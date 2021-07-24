@extends('layout.laypgg')

  @section('menu')
      <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item " style="background-color:#0080C9;"><a href="#"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
              </li>
              <li class=" navigation-header"><span>Data</span>
              </li>
              <li class="nav-item"><a href="#"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Dashboard">Data Dumas</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{ url('/pdatadumas')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Data yang tersedia</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/pdataresdumas')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Data perlu direspon</span></a>
                    </li>
                </ul>
              </li>
              <li class=" nav-item">
                    <a href="{{ url('/pdatastat')}}"><i class="feather icon-bar-chart-2"></i><span class="menu-title" data-i18n="Email">Data Statistik</span></a>
              </li>
          </ul>
      </div>
  @endsection

  @section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card bg-analytics text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <img src="assets/back/app-assets/images/elements/decore-left.png" class="img-left" alt="
            card-img-left">
                                        <img src="assets/back/app-assets/images/elements/decore-right.png" class="img-right" alt="
            card-img-right">
                                        <div >
                                            <div >
                                                <!-- <i class="feather icon-award white font-large-1"></i> -->
                                                <img src="assets/img/logo putih.png" style="width:150px;">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <br>
                                            <h1 class="mb-2 text-white">Selamat Datang  {{Session::get('nam')}}</h1>
                                            <!-- <p class="m-auto w-75">You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>              
                </section>

                <section id="statistics-card">
                    <div class="row">
                        
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8" style="padding-top: 10px;text-align: left;">
                                                <h2 class="text-bold-700">@foreach($jmasuk as $jm){{$jm->jum}}@endforeach</h2>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                                    <div class="avatar-content">
                                                        <i class="feather icon-download text-info font-medium-5"></i>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div>
                                        <p class="mb-0 line-ellipsis" style="text-align:left;">Pengaduan Masuk</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8" style="padding-top: 10px;text-align: left;">
                                                <h2 class="text-bold-700">@foreach($jver as $jm){{$jm->jum}}@endforeach</h2>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                                    <div class="avatar-content">
                                                        <i class="feather icon-toggle-right text-info font-medium-5"></i>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div>
                                        <p class="mb-0 line-ellipsis" style="text-align:left;">Pengaduan Verifikasi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8" style="padding-top: 10px;text-align: left;">
                                                <h2 class="text-bold-700">@foreach($jpro as $jm){{$jm->jum}}@endforeach</h2>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                                    <div class="avatar-content">
                                                        <i class="feather icon-refresh-cw text-info font-medium-5"></i>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div>
                                        <p class="mb-0 line-ellipsis" style="text-align:left;">Pengaduan Diproses</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8" style="padding-top: 10px;text-align: left;">
                                                <h2 class="text-bold-700">@foreach($jtla as $jm){{$jm->jum}}@endforeach</h2>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                                    <div class="avatar-content">
                                                        <i class="feather icon-check-circle text-info font-medium-5"></i>
                                                    </div>
                                                </div>
                                            </div>                                       
                                        </div>
                                        <p class="mb-0 line-ellipsis" style="text-align:left;">Pengaduan Selesai</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </section>

            </div>
        </div>
    </div>
  @endsection
