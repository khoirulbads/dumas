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
            <li class=" nav-item" style="background-color:#0080C9;">
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
              <div class="content-header-left col-md-12 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">Data Pengguna</h2>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Data</a>
                                  </li>
                                  <li class="breadcrumb-item active">Data Pengguna
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

                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#primary"><i class="feather icon-plus-circle"></i> Tambah Pengguna</button>
                                    <div class="table-responsive">
                                        <table class="table add-rows">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Level</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($data as $dat)
                                                <tr>
                                                    <td>{{$dat->NAMA}}</td>
                                                    <td>{{$dat->EMAIL}}</td>
                                                    <td>{{$dat->USERNAME}}</td>
                                                    <td>{{$dat->PASSWORD}}</td>
                                                    <td>{{$dat->LEVEL}}</td>
                                                    <td style="width: 80px;">
                                                        <button type="button" class="btn btn-icon btn-icon btn-warning" data-toggle="modal" data-target="#editpeng{{$dat->PENG_ID}}"><i class="feather icon-edit"></i></button>
                                                        <a href="{{ url('/pengguna:del=')}}{{$dat->PENG_ID}}" class="btn btn-icon btn-icon btn-danger" onclick="return(confirm('Anda Yakin ?'));"><i class="feather icon-trash"></i></a>
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

    <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-md" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary white">
                  <h5 class="modal-title" id="myModalLabel160">Tambah Pengguna</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{url('/add_pengguna')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
              <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            @foreach($idp as $id)
                              <input type="hidden" name="idp" value="{{$id->PENG_ID+1}}" readonly="">
                            @endforeach
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
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password-vertical">Level</label>
                                      <select class="form-control" name="level">
                                        <option></option>
                                        @foreach($lev as $le)
                                        <option>{{$le}}</option>
                                        @endforeach
                                      </select>
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



  
  @foreach($data as $ed)
  <div class="modal fade text-left" id="editpeng{{$ed->PENG_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-md" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary white">
                  <h5 class="modal-title" id="myModalLabel160">Edit Pengguna</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php
                  $upd = DB::SELECT("select*from pengguna where PENG_ID = '$ed->PENG_ID'");
              ?>
              @foreach($upd as $upd)
              <form action="{{ url('/pengguna:upd=')}} {{$upd->PENG_ID}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
              <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                           <div class="col-md-4">
                              <center>
                                FOTO<br>
                               <!-- <img id="image-preview" style="width: 130px; height: 130px;margin: 10px 0px 10px 0px;border:1px solid white;border-radius: 100px;"><br> -->
                                <input type="file" name="foto" class="form-control" id="image-source" onchange="previewImage();" style="width: 100%;" autocomplete="off"><br><br>
                              </center>
                          </div>
                          <div class="col-md-8">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Nama</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="nama" value="{{$upd->NAMA}}" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-vertical">Email</label>
                                    <input type="email" id="email-id-vertical" class="form-control" name="email" value="{{$upd->EMAIL}}" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="contact-info-vertical">Username</label>
                                    <input type="text" id="contact-info-vertical" class="form-control" name="user" value="{{$upd->USERNAME}}"autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password-vertical">Password</label>
                                    <input type="text" id="password-vertical" class="form-control" name="pass" value="{{$upd->PASSWORD}}" autocomplete="off" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password-vertical">Level</label>
                                      <select class="form-control" name="level">
                                        @foreach($lev as $le)
                                        <?php if ($le == $upd->LEVEL){ ?>
                                             <option value="{{$le}}" selected="">{{$le}}</option>
                                          <?php }else{ ?>
                                            <option value="{{$le}}">{{$le}}</option>
                                          <?php }?>
                                        @endforeach
                                      </select>
                                </div>
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

            