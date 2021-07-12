@extends('layout.layadm')

    @section('menu')
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item "><a href="{{ url('/admin')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
              </li>
              <li class=" navigation-header"><span>Data</span>
              </li>
              <li class=" nav-item">
                  <a href="#"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Email">Data Pengguna</span></a>
              </li> 
              <li class=" nav-item"><a href="#"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Dashboard">Data Dumas</span></a>
                  <ul class="menu-content">
                      <li><a href="{{ url('/datadumas')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Data Masuk</span></a>
                      </li>
                      <li><a href="{{ url('/dataverdumas')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Data Diverifikasi</span></a>
                      </li>
                  </ul>
              </li>  
              <li class=" nav-item ">
                  <a href="{{ url('/datastat')}}"><i class="feather icon-bar-chart-2"></i><span class="menu-title" data-i18n="Email">Data Statistik</span></a>
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
                          <h2 class="content-header-title float-left mb-0">Data Sosmed</h2>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Data</a>
                                  </li>
                                  <li class="breadcrumb-item active">Data Sosmed
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

                                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#primary"><i class="feather icon-plus-circle"></i> Tambah Sosmed</button>
                                    <div class="table-responsive">
                                        <table class="table add-rows">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Link</th>
                                                    <th>Icon</th>
                                                    <th>Preview</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($data as $dat)
                                                <tr>
                                                    <td>{{$dat->ID_SOSMED}}</td>
                                                    <td>{{$dat->LINK}}</td>
                                                    <td>{{$dat->LOGO}}</td>
                                                    <td style="text-align:center;"><i class="{{$dat->LOGO}} fa-2x "></i></td>
                                                    <td style="width: 80px;">
                                                        <button type="button" class="btn btn-icon btn-icon btn-warning" data-toggle="modal" data-target="#editpeng{{$dat->ID_SOSMED}}"><i class="feather icon-edit"></i></button>
                                                        <a href="{{ url('/sosmed:del=')}}{{$dat->ID_SOSMED}}" class="btn btn-icon btn-icon btn-danger" onclick="return(confirm('Anda Yakin ?'));"><i class="feather icon-trash"></i></a>
                                                    </td>
                                                </tr>
                                              @endforeach
                                            </tbody>
                                        </table>
                                      <span style="color:black;font-weight: bold">*) jika preview tidak tampil mohon mengganti dengan kode lain</span>
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
                  <h5 class="modal-title" id="myModalLabel160">Tambah Sosmed</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{url('/add_sosmed')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
              <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            @foreach($idp as $id)
                              <input type="hidden" name="idp" value="{{$id->ID_SOSMED+1}}" readonly="">
                            @endforeach
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-8">
                                  <div class="form-group">
                                      <label for="first-name-vertical">Link</label>
                                      <input type="text" id="first-name-vertical" class="form-control" name="link" placeholder="https://web.facebook.com/" autocomplete="off" required="">
                                  </div>
                              </div>
                              <div class="col-4">
                                  <div class="form-group">
                                      <label for="first-name-vertical">Icon</label>
                                      <input type="text" id="first-name-vertical" class="form-control" name="logo" placeholder="fa fa-icons" autocomplete="off" required="">
                                  </div>
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
  <div class="modal fade text-left" id="editpeng{{$ed->ID_SOSMED}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-md" role="document">
          <div class="modal-content">
              <div class="modal-header bg-primary white">
                  <h5 class="modal-title" id="myModalLabel160">Edit Icons</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php
                  $upd = DB::SELECT("select*from sosmed where ID_SOSMED = '$ed->ID_SOSMED'");
              ?>
              @foreach($upd as $upd)
              <form action="{{ url('/sosmed:upd=')}}{{$upd->ID_SOSMED}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
              <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Link</label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="link" value="{{$upd->LINK}}" autocomplete="off" required="">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Icon</label>
                                        <input type="text" id="first-name-vertical" class="form-control" name="logo" value="{{$upd->LOGO}}" autocomplete="off" required="">
                                    </div>
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

            