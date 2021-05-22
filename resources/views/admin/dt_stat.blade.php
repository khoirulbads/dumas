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
                                    <h4 class="card-title">Line Chart</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pl-0">
                                            <canvas id="densityChart" width="600" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        var densityCanvas = document.getElementById("densityChart");

        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;

        var densityData = {
          label: 'Density of Planet (kg/m3)',
          data: [5, 6, 3, 8, 5, 4, 7, 8],
          backgroundColor: 'rgba(0, 99, 132, 0.6)',
          borderWidth: 0,
          yAxisID: "y-axis-density"
        };

        var gravityData = {
          label: 'Gravity of Planet (m/s2)',
          data: [3.7, 8.9, 9.8, 3.7, 23.1, 9.0, 8.7, 11.0],
          backgroundColor: 'rgba(99, 132, 0, 0.6)',
          borderWidth: 0,
          yAxisID: "y-axis-gravity"
        };

        var planetData = {
          labels: ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune"],
          datasets: [densityData, gravityData]
        };

        var chartOptions = {
          scales: {
            xAxes: [{
              barPercentage: 1,
              categoryPercentage: 0.6
            }],
            yAxes: [{
              id: "y-axis-density"
            }, {
              id: "y-axis-gravity"
            }]
          }
        };

        var barChart = new Chart(densityCanvas, {
          type: 'bar',
          data: planetData,
          options: chartOptions
        });
    </script>

    @endsection

            