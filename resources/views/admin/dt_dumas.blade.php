@extends('layout.layadm')

    @section('menu')
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item "><a href="/admin"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
              </li>
              <li class=" navigation-header"><span>Data</span>
              </li>
              <li class=" nav-item"><a href="/datapengguna"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Email">Data Pengguna</span></a>
              </li> 
              <li class=" nav-item active"><a href="#"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Data Dumas</span></a>
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

                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#primary"><i class="feather icon-plus-circle"></i> Tambah Data</button>
                                    <div class="table-responsive">
                                        <table class="table add-rows">
                                            <thead>
                                                <tr>
                                                    <th>Judul</th>
                                                    <th>Tanggal</th>
                                                    <th>Lokasi</th>
                                                    <th>Kategori</th>
                                                    <th>Penulis</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            @foreach($data as $dat)
                                            <tbody>
                                                <tr>
                                                    <td>{{$dat->JUDUL}}</td>
                                                    <td><?= date('d M Y',strtotime($dat->TGL)); ?> </td>
                                                    <td>{{$dat->LOKASI}}</td>
                                                    <td>{{$dat->KATEGORI}}</td>
                                                    <td>{{$dat->NAMA}}</td>
                                                    <td style="width: 130px;">
                                                        <button type="button" class="btn btn-icon btn-icon btn-info" data-toggle="modal" data-target="#infodumas{{$dat->DUMAS_ID}}"><i class="feather icon-info"></i></button>
                                                        <button type="button" class="btn btn-icon btn-icon btn-warning" data-toggle="modal" data-target="#editdumas{{$dat->DUMAS_ID}}"><i class="feather icon-edit"></i></button>
                                                        <a href="/pengguna:del={{$dat->DUMAS_ID}}" class="btn btn-icon btn-icon btn-danger" onclick="return(confirm('Anda Yakin ?'));"><i class="feather icon-trash"></i></a>
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

    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary white">
                  <h5 class="modal-title" id="myModalLabel160">Masukkan Pengaduan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{url('/add_dumas')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
              <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                          @foreach($idd as $id)
                            <input type="hidden" name="idd" value="{{$id->DUMAS_ID+1}}" readonly="">
                          @endforeach
                          <div class="col-md-8">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Judul</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="judul" placeholder="judul" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-vertical">Isi Pengaduan</label>
                                    <textarea type="email" id="email-id-vertical" class="form-control" name="isi" placeholder="isi" autocomplete="off" required="" style="height: 270px;resize: none;"> </textarea>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label for="password-vertical">Kategori</label>
                                <input type="text" id="password-vertical" class="form-control" name="kat" placeholder="kategori" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                <label for="contact-info-vertical">Lokasi</label>
                                <input type="text" id="contact-info-vertical" class="form-control" name="lokasi" placeholder="lokasi" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                <label for="password-vertical">Lampiran</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="lamp" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="contact-info-vertical" class="form-control" name="akun" value="{{Session::get('akun')}}" autocomplete="off" required="" readonly="">
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

  @foreach($data as $ed)
  <div class="modal fade text-left" id="infodumas{{$ed->DUMAS_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary white">
                  <h5 class="modal-title" id="myModalLabel160">Edit Barang</h5>
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
                            <div class="col-md-8">
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
                          <div class="col-md-4">
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
                                <img src="assets/lampiran/{{$upd->LAMPIRAN}}" style="width: 180px; height: 180px;margin: 10px 0px 10px 0px;border:1px solid grey;border-radius: 7px;">
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

  @foreach($data as $ed)
  <div class="modal fade text-left" id="editdumas{{$ed->DUMAS_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary white">
                  <h5 class="modal-title" id="myModalLabel160">Edit Pengguna</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php
                  $upd = DB::SELECT("select*from dumas where DUMAS_ID = '$ed->DUMAS_ID'");
              ?>
              @foreach($upd as $upd)
              <form action="/dumas:upd={{$upd->DUMAS_ID}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
              <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                          <div class="col-md-8">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="first-name-vertical">Judul</label>
                                      <input type="text" id="first-name-vertical" class="form-control" name="judul" value="{{$upd->JUDUL}}" autocomplete="off" required="">
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="email-id-vertical">Isi Pengaduan</label>
                                      <textarea type="email" id="email-id-vertical" class="form-control" name="isi" autocomplete="off" required="" style="height: 270px;resize: none;"> {{$upd->ISI}} </textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label for="password-vertical">Kategori</label>
                                <input type="text" id="password-vertical" class="form-control" name="kat" value="{{$upd->KATEGORI}}" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                <label for="contact-info-vertical">Lokasi</label>
                                <input type="text" id="contact-info-vertical" class="form-control" name="lokasi" value="{{$upd->LOKASI}}" autocomplete="off" required="">
                            </div>
                            <div class="form-group">
                                <label for="password-vertical">Lampiran</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="lamp" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="contact-info-vertical" class="form-control" name="akun" value="{{Session::get('akun')}}" autocomplete="off" required="" readonly="">
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


 

    @endsection

            