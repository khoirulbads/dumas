@extends('layout.layppn')

  @section('menu')
      <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item">
                    <a href="{{ url('/pimpinan')}}">
                        <i class="feather icon-home"></i>
                        <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                    </a>
              </li>
              <li class=" navigation-header"><span>Data</span></li>
              <li class=" nav-item">
                <a href="#"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Dashboard">Data Dumas</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{ url('/odatadumas')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Analytics">Masuk</span>
                            <span class="badge badge badge-pill float-right" style="background-color: #323859">@foreach($jmasuk as $jm){{$jm->jum}}@endforeach</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/odataverdumas')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Analytics">Verifikasi</span>
                            <span class="badge badge badge-pill float-right" style="background-color: #323859">@foreach($jver as $jm){{$jm->jum}}@endforeach</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/odataprodumas')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Analytics">Proses</span>
                            <span class="badge badge badge-pill float-right" style="background-color: #323859">@foreach($jpro as $jm){{$jm->jum}}@endforeach</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/odatatladumas')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="Analytics">Tindaklanjut</span>
                            <span class="badge badge badge-pill float-right" style="background-color: #323859">@foreach($jtla as $jm){{$jm->jum}}@endforeach</span>
                        </a>
                    </li>
                </ul>
              </li>  
              <li class=" nav-item" style="background-color:#0080C9;">
                    <a href="{{ url('/odatakatdumas')}}">
                        <i class="feather icon-tag"></i>
                        <span class="menu-title" data-i18n="Email">Data Kategori</span>
                    </a>
              </li> 
              <li class=" nav-item">
                    <a href="{{ url('/odatastat')}}">
                        <i class="feather icon-bar-chart-2"></i>
                        <span class="menu-title" data-i18n="Email">Data Statistik</span>
                    </a>
              </li>             
          </ul>
      </div>
  @endsection



    @section('content')
    <div class="app-content content">
        <div class="content-wrapper">
          <div class="content-header row">
              <div class="content-header-left col-md-12 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">Data Pengaduan berdasarkan Kategori</h2>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Data</a>
                                  </li>
                                  <li class="breadcrumb-item active">Data Kategori
                                  </li>
                              </ol>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="content-body">
              <section id="add-row">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="table-responsive">
                                          <table class="table add-rows">
                                              <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Nama Kategori</th>
                                                      <th>Jumlah Dumas</th>
                                                  </tr>
                                              </thead>
                                              <tbody>

                                              <?php $no = 1; ?>
                                              @foreach($data as $dat)
                                                  <tr>
                                                      <td>{{$no++}}</td>
                                                      <td>{{$dat->KATEGORI}}</td>
                                                      <td style="text-align: center;">
                                                          <?php $dum = DB::SELECT("SELECT *,COUNT(*) as jum FROM dumas a, tindak_lanjut b WHERE a.DUMAS_ID = b.DUMAS_ID AND KATEGORI = '$dat->KATEGORI' AND b.STATUS = 'selesai'GROUP BY KATEGORI");?>
                                                      
                                                          @if($dum == null)
                                                            Belum Ada Pengaduan   
                                                          @else
                                                          @foreach($dum as $jdum)
                                                              {{$jdum->jum}} Pengaduan
                                                          @endforeach
                                                          @endif
                                                      </td>
                                                      
                                                  </tr>
                                              @endforeach
                                              </tbody>
                                          </table>
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

            