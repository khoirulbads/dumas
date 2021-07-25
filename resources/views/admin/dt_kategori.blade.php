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
            <li class=" nav-item" style="background-color:#0080C9;">
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
              <div class="content-header-left col-md-8 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">Data kategori</h2>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Data</a>
                                  </li>
                                  <li class="breadcrumb-item active">Data kategori
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

                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#primary"><i class="feather icon-plus-circle"></i> Tambah kategori</button>
                                    <div class="table-responsive">
                                        <table class="table add-rows">
                                            <thead>
                                                <tr>
                                                    <th data-orderable="false">#</th>
                                                    <th>Kategori</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php $no = 1; ?>
                                              @foreach($data as $dat)
                                                <tr>
                                                    <td data-orderable="false">{{$no++}}</td>
                                                    <td>{{$dat->KATEGORI}}</td>
                                                    <td style="width: 80px;">
                                                      <a class="btn btn-icon btn-icon btn-warning" data-toggle="modal" data-target="#editkat{{$dat->KAT_ID}}" style="color:black;"><i class="feather icon-edit"></i></a>
                                                      <a href="{{ url('/kategori:del=')}}{{$dat->KAT_ID}}" class="btn btn-icon btn-icon btn-danger" onclick="return(confirm('Anda Yakin ?'));"><i class="feather icon-trash"></i></a>
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
                  <h5 class="modal-title" id="myModalLabel160">Tambah kategori</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{url('/add_kategori')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
              <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            @foreach($idk as $id)
                              <input type="hidden" name="idk" value="{{$id->KAT_ID+1}}" readonly="">
                            @endforeach
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="first-name-vertical">Kategori</label>
                                  <input type="text" id="first-name-vertical" class="form-control" name="kat" placeholder="kategori" autocomplete="off" required="">
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
  <div class="modal fade text-left" id="editkat{{$ed->KAT_ID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-md" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary white">
                  <h5 class="modal-title" id="myModalLabel160">Edit Kategori</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php
                  $upd = DB::SELECT("select*from kategori where KAT_ID = '$ed->KAT_ID'");
              ?>
              @foreach($upd as $upd)
              <form action="{{ url('/kategori:upd=')}}{{$upd->KAT_ID}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
              <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="first-name-vertical">Kategori</label>
                                  <input type="text" id="first-name-vertical" class="form-control" name="kat" value="{{$upd->KATEGORI}}" autocomplete="off" required="">
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

            