@extends('layout.layadm')

  @section('menu')
      <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item" style="background-color:#0080C9;"><a href="#"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
              </li>
              <li class=" navigation-header"><span>Data</span>
              </li>
              <li class=" nav-item ">
                    <a href="{{ url('/datapengguna')}}"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Email">Data Pengguna</span></a>
              </li>
              <li class=" nav-item"><a href="#"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Dashboard">Data Dumas</span></a>
                  <ul class="menu-content">
                      <li><a href="{{ url('/datadumas')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Data Masuk</span></a>
                      </li>
                      <li><a href="{{ url('/dataverdumas')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Data Diverifikasi</span></a>
                      </li>
                  </ul>
              </li>  
              <li class=" nav-item">
                    <a href="{{ url('/datastat')}}"><i class="feather icon-bar-chart-2"></i><span class="menu-title" data-i18n="Email">Data Statistik</span></a>
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

            </div>
        </div>
    </div>
  @endsection
