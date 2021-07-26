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
                        <a href="{{ url('/pdataresdumas')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Data perlu direspon</span></a>
                    </li>
                </ul>
              </li>
              <li class=" nav-item">
                    <a href="{{ url('/pdatastat')}}"><i class="feather icon-bar-chart-2"></i><span class="menu-title" data-i18n="Email">Data Statistik</span></a>
              </li>           
          </ul>
      </div>
    @endsection


    @section('content')
    <div class="app-content content">
       <!--  <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div> -->
        <div class="content-wrapper">
          <div class="content-header row">
              <div class="content-header-left col-md-9 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0">Detail Pengaduan Masyarakat</h2>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.html">Data</a>
                                  </li>
                                  <li class="breadcrumb-item active">Data Detail Pengaduan Masyarakat
                                  </li>
                              </ol>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          @foreach($data as $det)
          <div class="content-body">
              <section id="add-row">
                <div class="row">
                  <div class="col-md-7">
                      <div class="card">
                          <div class="card-content">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label for="first-name-vertical">Judul</label>
                                      <input type="text" id="first-name-vertical" class="form-control" name="judul" value="{{$det->JUDUL}}" autocomplete="off" readonly=""  style="background-color: white;">
                                  </div>
                                  <div class="form-group">
                                      <label for="email-id-vertical">Isi Pengaduan</label>
                                      <textarea type="email" id="email-id-vertical" class="form-control" name="isi" autocomplete="off" required="" style="height: 270px;resize: none;background-color: white;text-align: justify;" readonly=""> {{$det->ISI}} </textarea>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-8">
                                          <div class="form-group">
                                            <label for="password-vertical">Kategori</label>
                                            <input type="text" id="password-vertical" class="form-control" name="kat" value="{{$det->KATEGORI}}" autocomplete="off" readonly=""  style="background-color: white;">
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="contact-info-vertical">Lokasi</label>
                                              <input type="text" id="contact-info-vertical" class="form-control" name="lokasi" value="{{$det->LOKASI}}" autocomplete="off" readonly="" style="background-color: white;">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="password-vertical">Lampiran</label>
                                      <center>
                                      <img src="assets/lampiran/{{$det->LAMPIRAN}}" style="width: 100%;min-height: 300px ;margin: 10px 0px 10px 0px;border-radius: 5px;">
                                      </center>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-5">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Status terakhir</h4>
                          </div>
                          <div class="card-content">
                              <div class="card-body">
                                  <ul class="activity-timeline timeline-left list-unstyled">
                                      <li>
                                          @foreach($data as $tm1)
                                          <div class="timeline-icon bg-info">
                                              <i class="feather icon-check-circle font-medium-2 align-middle"></i>
                                          </div>
                                          <div class="timeline-info">
                                              <p class="font-weight-bold mb-0">Pengaduan Dibuat</p>
                                              <span class="font-small-3">{{$tm1->NAMA}} telah membuat sebuah pengaduan </span>
                                          </div>
                                          <small class="text-muted"><?= date('d M Y H:i',strtotime($tm1->TGL)); ?></small>
                                          @endforeach
                                      </li>
                                      <li>
                                        @foreach($ver as $tm2)
                                            <?php if ($tm2->STATUS == 'belum verifikasi' ){ ?>
                                                <div class="timeline-icon bg-light">
                                                    <i class="feather icon-clock font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                  <p class="font-weight-bold mb-0">Status Verifikasi</p>
                                                  <span class="font-small-3">menunggu diverifikasi</span>
                                                </div>
                                            <?php }else if ($tm2->STATUS == 'tidak verifikasi'){ ?>
                                                <div class="timeline-icon bg-danger">
                                                    <i class="feather icon-x-circle font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                  <p class="font-weight-bold mb-0">Status Verifikasi</p>
                                                  <span class="font-small-3">pengaduan anda tidak diverifikasi atau ditolak
                                                      <?php if($tm2->KET == null){ }else{ echo 'dengan keterangan : <i>"'.$tm2->KET.'"</i>.'; }?> 
                                                  </span>
                                                </div>
                                            <?php }else{ ?>
                                                <div class="timeline-icon bg-info">
                                                    <i class="feather icon-check-circle font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                  <p class="font-weight-bold mb-0">Status Verifikasi</p>
                                                  <span class="font-small-3">pengaduan anda telah diverifikasi 
                                                      <?php if($tm2->KET == null){ }else{ echo 'dengan keterangan : <i>"'.$tm2->KET.'"</i>.'; }?> 
                                                  </span>
                                                </div>
                                                <small class="text-muted"><?= date('d M Y H:i',strtotime($tm2->TGL)); ?></small>
                                            <?php } ?>
                                        @endforeach
                                      </li>
                                      <li>
                                        <?php if ($tln == null){ ?>
                                            <div class="timeline-icon bg-light">
                                                <i class="feather icon-clock font-medium-2 align-middle"></i>
                                            </div>
                                            <div class="timeline-info">
                                              <p class="font-weight-bold mb-0">Status Tindak Lanjut</p>
                                              <span class="font-small-3">menunggu ditindak lanjuti</span>
                                            </div>
                                        <?php }else{ ?>
                                            
                                            @foreach($tln as $tm3)
                                            <?php if($tm3->STATUS == 'proses'){?> 

                                                <div class="timeline-icon bg-gradient-info">
                                                    <i class="feather icon-refresh-cw font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                  <p class="font-weight-bold mb-0">Status Tindak Lanjut</p>
                                                  <span class="font-small-3">pengaduan anda sedang diproses 
                                                      <?php if($tm3->KET == null){ }else{ echo 'dengan keterangan : <i>"'.$tm3->KET.'"</i>.'; }?> </span>
                                                </div>
                                                <small class="text-muted"><?= date('d M Y H:i',strtotime($tm3->TGL)); ?></small>

                                            <?php }else{ ?>

                                                <div class="timeline-icon bg-info">
                                                    <i class="feather icon-check-circle font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                  <p class="font-weight-bold mb-0">Status Tindak Lanjut</p>
                                                  <span class="font-small-3">pengaduan anda telah selesai di proses
                                                      <?php if($tm3->KET == null){ }else{ echo 'dengan keterangan : <i>"'.$tm3->KET.'"</i>.'; }?></span>
                                                </div>
                                                <small class="text-muted"><?= date('d M Y H:i',strtotime($tm3->TGL)); ?></small>

                                            <?php } ?>
                                            @endforeach
                                        <?php } ?>
                                      </li>
                                      <li>
                                        <?php if ($res == null){ ?>
                                            <div class="timeline-icon bg-light">
                                                <i class="feather icon-clock font-medium-2 align-middle"></i>
                                            </div>
                                            <div class="timeline-info">
                                              <p class="font-weight-bold mb-0">Status Respon</p>
                                              <span class="font-small-3">menunggu direspon</span>
                                            </div>
                                        <?php }else{ ?>
                                            @foreach($res as $tm4)
                                              <div class="timeline-icon bg-info">
                                                  <i class="feather icon-check-circle font-medium-2 align-middle"></i>
                                              </div>
                                              <div class="timeline-info">
                                                <p class="font-weight-bold mb-0">Status Respon</p>
                                                <span class="font-small-3">{{$tm1->NAMA}} telah merespon dengan pesan <i>"{{$tm4->ISI}}"</i></span>
                                              </div>
                                              <small class="text-muted"><?= date('d M Y H:i',strtotime($tm4->TGL)); ?></small>
                                            @endforeach
                                        <?php } ?>
                                      </li>
                                      <li>
                                        <?php if ($res == null){ ?>
                                            <div class="timeline-icon bg-light">
                                                <i class="feather icon-clock font-medium-2 align-middle"></i>
                                            </div>
                                            <div class="timeline-info">
                                              <p class="font-weight-bold mb-0">Status Selesai </p>
                                              <span class="font-small-3">beberapa proses masih belum terpenuhi </span>
                                            </div>
                                        <?php }else{ ?>
                                              <div class="timeline-icon bg-info">
                                                  <i class="feather icon-check-circle font-medium-2 align-middle"></i>
                                              </div>
                                              <div class="timeline-info">
                                                <p class="font-weight-bold mb-0">Status Selesai</p>
                                                <span class="font-small-3">Pengaduan telah terselesaikan</span>
                                              </div>
                                              @foreach($res as $tm5)
                                              <small class="text-muted"><?= date('d M Y H:i',strtotime($tm5->TGL)); ?></small>
                                              @endforeach
                                        <?php } ?>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </section>
            </div>
            @endforeach
      </div>
    </div>

@endsection