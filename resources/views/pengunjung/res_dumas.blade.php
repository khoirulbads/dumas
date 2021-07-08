@extends('layout.laypgg')

    @section('menu')
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item"><a href="{{ url('/pengunjung')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
              </li>
              <li class=" navigation-header"><span>Data</span>
              </li>
              <li class="nav-item"><a href="#"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Dashboard">Data Dumas</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="{{ url('/pdatadumas')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Data yang tersedia</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Data perlu direspon</span></a>
                    </li>
                </ul>
              </li>
              <li class=" nav-item">
                    <a href="{{ url('/pdatastat')}}"><i class="feather icon-bar-chart-2"></i><span class="menu-title" data-i18n="Email">Data Statistik</span></a>
              </li>        
          </ul>
      </div>
    @endsection

    <?php 

        $lev = array('Admin','Pimpinan','Pengunjung');

    ?>

    @section('content')
    <div class="app-content content">
       <!--  <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div> -->
        <div class="content-wrapper">
          <div class="content-header row">
              <div class="content-header-left col-md-9 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">Data Pengaduan Masyarakat</h2>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Data</a>
                                  </li>
                                  <li class="breadcrumb-item active">Data Pengaduan Masyarakat
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
                                                    <th>Kategori</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            @foreach($data as $dat)
                                            <tbody>
                                                <tr>
                                                    <td>{{$dat->JUDUL}}</td>
                                                    <td><?= date('d M Y',strtotime($dat->TGL)); ?></td>
                                                    <td>{{$dat->NAMA}}</td>
                                                    <td>{{$dat->KATEGORI}}</td>
                                                    <td style="width: 160px;">
                                                        <button type="button" class="btn btn-icon btn-icon btn-info" data-toggle="modal" data-target="#infodumas{{$dat->DUMAS_ID}}"><i class="feather icon-info"></i></button>
                                                        <button type="button" class="btn btn-icon btn-warning" data-toggle="modal" data-target="#resdumas{{$dat->DUMAS_ID}}"><i class="feather icon-message-square"></i></button>
                                                        
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

        @foreach($data as $det)
        <div class="modal fade text-left" id="resdumas{{$det->DUMAS_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">Tindak Lanjut Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                        <form action="{{ url('/dumas:respon')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="modal-body">
                                <div class="form-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        @foreach($idr as $id)
                                          <input type="hidden" name="idt" value="{{$id->RESPON_ID+1}}" readonly="">
                                        @endforeach
                                          <input type="hidden" name="idd" value="{{$det->DUMAS_ID}}" readonly="">

                                          <input type="hidden" name="idp" value="{{Session::get('akun')}}" readonly="">

                                        <div class="form-group">
                                            <label for="contact-info-vertical">Keterangan</label>
                                            <textarea type="text" id="contact-info-vertical" class="form-control" name="ket" autocomplete="off" style="height: 270px;resize: none;" placeholder="isi untuk merespon tindak lanjut pengaduan"></textarea>
                                        </div>
                                        
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-primary"><i class="feather icon-check-circle"></i> Respon</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
        @endforeach

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
                                            <textarea type="email" id="email-id-vertical" class="form-control" name="isi" autocomplete="off" required="" style="height: 270px;resize: none;background-color: white;" readonly=""> {{$upd->ISI}} </textarea>
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

            