@extends('layout.layadm')

    @section('menu')
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item "><a href="/admin"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
              </li>
              <li class=" navigation-header"><span>Data</span>
              </li>
              <li class=" nav-item">
                  <a href="/datapengguna"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Email">Data Pengguna</span></a>
              </li> 
              <li class=" nav-item"><a href="#"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Dashboard">Data Dumas</span></a>
                  <ul class="menu-content">
                      <li><a href="/datadumas"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Data Masuk</span></a>
                      </li>
                      <li><a href="/dataverdumas"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">Data Diverifikasi</span></a>
                      </li>
                  </ul>
              </li>  
              <li class=" nav-item" style="background-color:#0080C9;">
                  <a href="/datastat"><i class="feather icon-bar-chart-2"></i><span class="menu-title" data-i18n="Email">Data Statistik</span></a>
              </li>              
          </ul>
      </div>
    @endsection

    <?php 

        $lev = array('Admin','Pimpinan','Pengunjung');

    ?>

 

    @section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                
                <section id="chartjs-charts">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pl-0">
                                        <canvas id="myChart" width="400" height="180"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jumlah Diverifikasi', 'Jumlah Ditindak Lanjuti', 'Jumlah Selesai'],
                datasets: [{
                    label: 'Jumlah Pangaduan per Kategori',
                    data: [ 
                            <?php foreach ($ver as $ver){ ?>'<?php echo $ver->jum; ?>' <?php }?> ,
                            <?php foreach ($tln as $tln){ ?>'<?php echo $tln->jum; ?>' <?php }?> , 
                            <?php foreach ($sel as $sel){ ?>'<?php echo $sel->jum; ?>' <?php }?>
                          ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        // 'rgba(75, 192, 192, 0.2)',
                        // 'rgba(153, 102, 255, 0.2)',
                        // 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        // 'rgba(75, 192, 192, 1)',
                        // 'rgba(153, 102, 255, 1)',
                        // 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    

    @endsection

            