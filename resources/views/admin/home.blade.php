@extends('layout.layadm')

  @section('menu')
      <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item active"><a href="#"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
              </li>
              <li class=" navigation-header"><span>Data</span>
              </li>
              <li class=" nav-item "><a href="/datapengguna"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Email">Data Pengguna</span></a>
              </li>   <li class=" nav-item "><a href="/datadumas"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Data Dumas</span></a>
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
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card bg-analytics text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <img src="assets/back/app-assets/images/elements/decore-left.png" class="img-left" alt="
            card-img-left">
                                        <img src="assets/back/app-assets/images/elements/decore-right.png" class="img-right" alt="
            card-img-right">
                                        <div class="avatar avatar-xl bg-primary shadow mt-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-award white font-large-1"></i>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h1 class="mb-2 text-white">Congratulations John,</h1>
                                            <p class="m-auto w-75">You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25">92.6k</h2>
                                    <p class="mb-0">Subscribers Gained</p>
                                </div>
                                <div class="card-content">
                                    <div id="subscribe-gain-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-package text-warning font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25">97.5K</h2>
                                    <p class="mb-0">Orders Received</p>
                                </div>
                                <div class="card-content">
                                    <div id="orders-received-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </section>

            </div>
        </div>
    </div>
  @endsection
