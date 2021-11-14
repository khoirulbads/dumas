@extends('layout.layadm')

@section('menu')
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a href="{{ url('/admin')}}">
                    <i class="feather icon-home"></i>
                    <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>
            <li class=" navigation-header"><span>Data</span></li>
            <li class=" nav-item ">
                <a href="{{ url('/datapengguna')}}">
                    <i class="feather icon-users"></i>
                    <span class="menu-title" data-i18n="Email">Data Pengguna</span>
                </a>
            </li>
            <li class=" nav-item ">
                <a href="{{ url('/datakategori')}}">
                    <i class="feather icon-tag"></i><span class="menu-title" data-i18n="Email">Data Kategori</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="#"><i class="feather icon-mail"></i>
                    <span class="menu-title" data-i18n="Dashboard">Data Dumas</span>
                </a>
              <ul class="menu-content">
                  <li>
                    <a href="{{ url('/datadumas')}}">
                        <i class="feather icon-circle"></i>
                        <span class="menu-item" data-i18n="Analytics">telah masuk</span><span class="badge badge  badge-pill float-right" style="background-color: #323859">@foreach($jmasuk as $jm){{$jm->jum}}@endforeach</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ url('/datatlkdumas')}}">
                        <i class="feather icon-circle"></i>
                        <span class="menu-item" data-i18n="eCommerce">telah ditolak</span>
                        <span class="badge badge  badge-pill float-right" style="background-color: #323859">@foreach($jtlk as $jm){{$jm->jum}}@endforeach</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ url('/dataverdumas')}}">
                        <i class="feather icon-circle"></i>
                        <span class="menu-item" data-i18n="eCommerce">telah diverifikasi</span><span class="badge badge  badge-pill float-right" style="background-color: #323859">@foreach($jver as $jm){{$jm->jum}}@endforeach</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ url('/dataprodumas')}}">
                        <i class="feather icon-circle"></i>
                        <span class="menu-item" data-i18n="eCommerce">sedang diproses</span><span class="badge badge  badge-pill float-right" style="background-color: #323859">@foreach($jpro as $jm){{$jm->jum}}@endforeach</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ url('/datatladumas')}}">
                        <i class="feather icon-circle"></i>
                        <span class="menu-item" data-i18n="eCommerce">telah ditindak</span><span class="badge badge  badge-pill float-right" style="background-color: #323859">@foreach($jtla as $jm){{$jm->jum}}@endforeach</span>
                    </a>
                  </li>
              </ul>
            </li> 
            <li class=" nav-item">
                <a href="{{ url('/datastat')}}">
                    <i class="feather icon-bar-chart-2"></i>
                    <span class="menu-title" data-i18n="Email">Data Statistik</span>
                </a>
            </li>
            <li class=" nav-item">
                <a href="{{ url('/datakritik')}}">
                    <i class="feather icon-message-square"></i>
                    <span class="menu-title" data-i18n="Email">Data Kritik & Saran</span>
                </a>
            </li>            
        </ul>
    </div>
@endsection

    <?php 

        $sta = array('proses','selesai');

    ?>

    @section('content')
    <div class="app-content content">
       <!--  <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div> -->
        <div class="content-wrapper">
          <div class="content-header row">
              <div class="content-header-left col-md-12 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">Data Pengaduan Telah Ditindaklanjuti</h2>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Data</a>
                                  </li>
                                  <li class="breadcrumb-item active">Data Pengaduan Telah DItindaklanjuti
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
                                                      <th>Judul</th>
                                                      <th>Tanggal</th>
                                                      <th>Penulis</th>
                                                      <th>Status</th>
                                                      <th>Aksi</th>
                                                  </tr>
                                              </thead>
                                              @foreach($data as $dat)
                                              <tbody>
                                                  <tr>
                                                      <td>{{$dat->JUDUL}}</td>
                                                      <td><?= date('d M Y',strtotime($dat->TGL)); ?></td>
                                                      <td>{{$dat->NAMA}}</td>
                                                      <td>{{$dat->STATUS}}</td>
                                                      <td style="width: 80px;">
                                                          <button type="button" class="btn btn-icon btn-icon btn-info" data-toggle="modal" data-target="#infodumas{{$dat->DUMAS_ID}}"><i class="feather icon-info"></i></button>
                                                          <a href="{{ url('/dumas:del=')}}{{$dat->DUMAS_ID}}" class="btn btn-icon btn-icon btn-danger" onclick="return(confirm('Anda Yakin ?'));"><i class="feather icon-trash"></i></a>
                                                      </td>
                                                  </tr>
                                              </tbody>
                                              @endforeach
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



    @foreach($data as $ed)
    <div class="modal fade text-left" id="infodumas{{$ed->DUMAS_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title" id="myModalLabel160">Detail Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    $upd = DB::SELECT("select*from dumas where DUMAS_ID = '$ed->DUMAS_ID'");
                ?>
                @foreach($upd as $upd)
                <div class="modal-body">
                      <div class="form-body">
                          <div class="row">
                              <div class="col-md-7">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Judul</label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="judul" value="{{$upd->JUDUL}}" autocomplete="off" readonly=""  style="background-color: white;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Isi Pengaduan</label>
                                        <textarea type="email" id="email-id-vertical" class="form-control" name="isi" autocomplete="off" required="" style="height: 270px;resize: none;background-color: white;text-align: justify;white-space: pre-line;" readonly="">{{$upd->ISI}} </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                  <label for="password-vertical">Kategori</label>
                                  <input type="text" id="password-vertical" class="form-control" name="kat" value="{{$upd->KATEGORI}}" autocomplete="off" readonly=""  style="background-color: white;">
                              </div>
                              <div class="form-group">
                                  <label for="contact-info-vertical">Lokasi</label>
                                  <input type="text" id="contact-info-vertical" class="form-control" name="lokasi" value="{{$upd->LOKASI}}" autocomplete="off" readonly="" style="background-color: white;">
                              </div>
                              <div class="form-group">
                                  <label for="password-vertical">Lampiran</label>
                                  <center>
                                  <img src="assets/lampiran/{{$upd->LAMPIRAN}}" style="max-width: 100%;max-height: 300px;margin: 10px 0px 10px 0px;border-radius: 5px;">
                                  </center>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach

  
  @endsection

            