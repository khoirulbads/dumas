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
              <li class=" nav-item">
                  <a href="/datadumas"><i class="feather icon-mail"></i><span class="menu-title" data-i18n="Email">Data Dumas</span></a>
              </li>
              <li class=" nav-item active">
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
                                           <canvas id="barChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.min.js"></script>
    <script>
        var canvas = document.getElementById("barChart");
        var ctx = canvas.getContext('2d');

        // Global Options:
        Chart.defaults.global.defaultFontColor = 'black';
        Chart.defaults.global.defaultFontSize = 16;

        var data = {
          labels: [<?php foreach ($data as $key){ ?>
                              '<?php echo $key->bln; ?>',
                          <?php }?>],
          datasets: [{
              label: "Diverivikasi",
              fill: false,
              lineTension: 0.1,
              backgroundColor: "rgba(54, 162, 235, 0.2)",
              borderColor: "green", // The main line color
              borderCapStyle: 'square',
              borderDash: [], // try [5, 15] for instance
              borderDashOffset: 0.0,
              borderJoinStyle: 'miter',
              pointBorderColor: "black",
              pointBackgroundColor: "white",
              pointBorderWidth: 1,
              pointHoverRadius: 8,
              pointHoverBackgroundColor: "yellow",
              pointHoverBorderColor: "brown",
              pointHoverBorderWidth: 2,
              pointRadius: 4,
              pointHitRadius: 10,
              // notice the gap in the data and the spanGaps: true
              data: [<?php foreach ($data as $key){ ?>
                              '<?php echo $key->ver; ?>',
                          <?php }?>],
              spanGaps: true,
            }, {
              label: "Tidak DIverivikasi",
              fill: false,
              lineTension: 0.1,
              backgroundColor: "rgba(255, 99, 132, 0.2)",
              borderColor: "red",
              borderCapStyle: 'butt',
              borderDash: [],
              borderDashOffset: 0.0,
              borderJoinStyle: 'miter',
              pointBorderColor: "white",
              pointBackgroundColor: "black",
              pointBorderWidth: 1,
              pointHoverRadius: 8,
              pointHoverBackgroundColor: "brown",
              pointHoverBorderColor: "yellow",
              pointHoverBorderWidth: 2,
              pointRadius: 4,
              pointHitRadius: 10,
              // notice the gap in the data and the spanGaps: false
              data: [<?php foreach ($data as $key){ ?>
                              '<?php echo $key->tdk; ?>',
                          <?php }?>],
              spanGaps: false,
            }

          ]
        };

        // Notice the scaleLabel at the same level as Ticks
        var options = {
          scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel: {
                             display: true,
                             labelString: 'Pengaduan Masyarakat',
                             fontSize: 20 
                          }
                    }]            
                }  
        };

        // Chart declaration:
        var myBarChart = new Chart(ctx, {
          type: 'line',
          data: data,
          options: options
        });
    </script>

    @endsection

            