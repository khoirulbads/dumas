@extends('layout.layppn')

    @section('menu')
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class="nav-item"><a href="/pimpinan"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
              </li>
              <li class="navigation-header"><span>Data</span>
              </li>
              <li class="nav-item"><a href="#"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Dashboard">Data Dumas</span></a>
                <ul class="menu-content">
                    <li>
                        <a href="/odatadumas"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Data Verifikasi</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Data Proses</span></a>
                    </li>
                    <li>
                        <a href="/odatatldumas"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Data Ditindak lanjuti </span></a>
                    </li>
                </ul>
              </li>  
              <li class=" nav-item">
                    <a href="/odatastat"><i class="feather icon-bar-chart-2"></i><span class="menu-title" data-i18n="Email">Data Statistik</span></a>
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
              <div class="content-header-left col-md-9 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">Data Pengaduan Masyarakat</h2>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Data</a>
                                  </li>
                                  <li class="breadcrumb-item active">Data Data Pengaduan Masyarakat
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
                                                      <td style="width: 50px;">
                                                          <button type="button" class="btn btn-icon btn-icon btn-success" data-toggle="modal" data-target="#statdumas{{$dat->DUMAS_ID}}"><i class="feather icon-toggle-right"></i></button>
                                                          <button type="button" class="btn btn-icon btn-icon btn-info" data-toggle="modal" data-target="#infodumas{{$dat->DUMAS_ID}}"><i class="feather icon-info"></i></button>
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
    <div class="modal fade text-left" id="statdumas{{$det->DUMAS_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h5 class="modal-title" id="myModalLabel160">Tindak Lanjut Laporan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <?php
                        $uds = DB::SELECT("select*from tindak_lanjut where DUMAS_ID = '$det->DUMAS_ID'");
                    ?>

                    @foreach($uds as $upd)
                    <form action="/odumas:sta={{$upd->DUMAS_ID}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password-vertical">Kategori</label>
                                        <select class="form-control" name="stat" required="">
                                            @foreach($sta as $st)
                                            <?php if ($st == $upd->STATUS){ ?>
                                                 <option value="{{$st}}" selected="">{{$st}}</option>
                                              <?php }else{ ?>
                                                <option value="{{$st}}">{{$st}}</option>
                                              <?php }?>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact-info-vertical">Keterangan</label>
                                        <textarea type="text" id="contact-info-vertical" class="form-control" name="ket"autocomplete="off" style="height: 270px;resize: none;"> {{$upd->KET}}</textarea>
                                    </div>
                                    
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary"><i class="feather icon-edit"></i> Ubah</button>
                        </div>
                    </form>
                    @endforeach
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

            