@extends('admin.layout.master')

@section('content')
  <!-- Start Content-->
  <div class="container-fluid">

    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="showWidget()">Donasi</a>
                            <a href="javascript:void(0);" class="dropdown-item" onclick="showTarget()">Target</a>

                        </div>
                    </div>

                    <h4 id="headerTitle" class="header-title mt-0 mb-4">Total Donasi</h4>

                    <div class="widget-chart-1">

                        <div id="widget" class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1">Rp <?php echo $Totaldonasi; ?> </h2>
                            <p class="text-muted mb-1">Donasi</p>
                        </div>

                        <div id="target" class="widget-detail-1 text-end" style="display: none;">
                            <h2 class="fw-normal pt-2 mb-1">Rp {{ $Totaltarget }} </h2>
                            <p class="text-muted mb-1">Target</p>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    

                    <h4 class="header-title mt-0 mb-3 mt-2">Realisasi Target Danako</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2 text-end">
                            <span class="badge bg-success rounded-pill float-start mt-3">{{ $percentage }}% <i class="mdi mdi-trending-up"></i> </span>
                            <h2 class="fw-normal mb-2"> {{ $percentage }} %</h2>
                            <p class="text-muted mb-2">Target</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">

                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="Showuser()">Total Pengguna</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="Showadmin()">Total Admin</a>
                          
                        </div>
                    </div>


                    <h4 id="juduluser" class="header-title mt-0 mb-4">User</h4>

                    <div id="user" class="widget-chart-1">
                        <div class="widget-chart-box-1 float-start" dir="ltr">
                            <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                    data-bgColor="#FFE6BA" value="{{ $roleOneUserCount }}"
                                    data-skin="tron" data-angleOffset="180" data-readOnly=true
                                    data-thickness=".15"/>
                        </div>
                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> {{ $roleOneUserCount }} </h2>
                            <p class="text-muted mb-1">User</p>
                        </div>
                    </div>

                    <div id="admin" class="widget-chart-1" style="display: none;">
                        <div class="widget-chart-box-1 float-start" dir="ltr">
                            <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                    data-bgColor="#FFE6BA" value="{{ $roleOneUserCount }}"
                                    data-skin="tron" data-angleOffset="180" data-readOnly=true
                                    data-thickness=".15"/>
                        </div>
                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> {{ $roleOneAdminCount }} </h2>
                            <p class="text-muted mb-1">Admin</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    

                    <h4 class="header-title mt-0 mb-4">Jumlah Donatur</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-start" dir="ltr">
                            <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                    data-bgColor="#FFE6BA" value="{{ $Donation }}"
                                    data-skin="tron" data-angleOffset="180" data-readOnly=true
                                    data-thickness=".15"/>
                        </div>
                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> {{ $Donation }} </h2>
                            <p class="text-muted mb-1">Donatur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mt-0 mb-3"> Campaign Category</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2 text-end">
                            <h2 class="fw-normal mb-1"> {{ $CampaignCategory }} </h2>
                            <p class="text-muted mb-3">Campaign</p>
                        </div>
                        <div class="progress progress-bar-alt-pink progress-sm">
                            <div class="progress-bar bg-pink" role="progressbar"
                                    aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                    style="width:  {{ $CampaignCategory }}%;">
                                <span class="visually-hidden"> {{ $CampaignCategory }}% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>       
        </div>


        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="Showuser()">Total Pengguna</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="Showadmin()">Total Admin</a>
                          
                        </div>
                    </div>

                    <h4 class="header-title mt-0 mb-3">Jumlah Campaign</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2 text-end">
                            <h2 class="fw-normal mb-1"> {{ $Campaign }} </h2>
                            <p class="text-muted mb-3">Campaign</p>
                        </div>
                        <div class="progress progress-bar-alt-pink progress-sm">
                            <div class="progress-bar bg-pink" role="progressbar"
                                    aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                    style="width:  {{ $Campaign }}%;">
                                <span class="visually-hidden"> {{ $Campaign }}% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div><!-- end col -->

    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                  
                    <h4 class="header-title mt-0">Donasi yang Terkumpul</h4>

                    <div class="widget-chart text-center">
                        <div id="morris-donut-example" dir="ltr" style="height: 245px;" class="morris-chart"></div>
                        <ul class="list-inline chart-detail-list mb-0">
                            <li class="list-inline-item">
                                <h5 style="color: #ff8acc;"><i class="fa fa-circle me-1"></i>Terkumpul</h5>
                            </li>
                            <li class="list-inline-item">
                                <h5 style="color: #5b69bc;"><i class="fa fa-circle me-1"></i>Belum</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    
                    
                    <h4 class="header-title mt-0">Donasi Per Bulan</h4>
                    {{-- @foreach($monthlyDonations as $month => $totalAmount)
                    <p>Total amount for month {{ $month }}: {{ $totalAmount }}</p>
                @endforeach --}}
                    
                    <div id="morris-bar-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <h4 class="header-title mt-0">Total Revenue</h4>
                    <div id="morris-line-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

    
    
</div> <!-- container-fluid -->
@endsection

@section('init-js')
  <!-- knob plugin -->
  <script src="{{asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

  <!--Morris Chart-->
  <script src="{{asset('assets/libs/morris.js06/morris.min.js')}}"></script>
  <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

  <script>
    function showWidget() {
        document.getElementById("widget").style.display = "block";
        document.getElementById("target").style.display = "none";
        document.getElementById("headerTitle").innerHTML = "Total Donasi";
    }

    function showTarget() {
        document.getElementById("widget").style.display = "none";
        document.getElementById("target").style.display = "block";
        document.getElementById("headerTitle").innerHTML = "Total Target";
    }

    function Showuser() {
        document.getElementById("user").style.display = "block";
        document.getElementById("admin").style.display = "none";
        document.getElementById("juduluser").innerHTML = "User";
    }

    function Showadmin() {
        document.getElementById("user").style.display = "none";
        document.getElementById("admin").style.display = "block";
        document.getElementById("juduluser").innerHTML = "Admin";
        
    }

    


</script>

  <script>
    "use strict";
!(function (e) {
  function a() {
    this.$realData = [];
  }
  (a.prototype.createBarChart = function (e, a, r, t, o, i) {
    Morris.Bar({
      element: e,
      data: a,
      xkey: r,
      ykeys: t,
      labels: o,
      hideHover: "auto",
      resize: !0,
      gridLineColor: "rgba(173, 181, 189, 0.1)",
      barSizeRatio: 0.2,
      dataLabels: !1,
      barColors: i,
    });
  }),
    (a.prototype.createLineChart = function (e, a, r, t, o, i, n, s, l) {
      Morris.Line({
        element: e,
        data: a,
        xkey: r,
        ykeys: t,
        labels: o,
        fillOpacity: i,
        pointFillColors: n,
        pointStrokeColors: s,
        behaveLikeLine: !0,
        gridLineColor: "rgba(173, 181, 189, 0.1)",
        hideHover: "auto",
        resize: !0,
        pointSize: 0,
        dataLabels: !1,
        lineColors: l,
      });
    }),
    (a.prototype.createDonutChart = function (e, a, r) {
      Morris.Donut({
        element: e,
        data: a,
        resize: !0,
        colors: r,
        backgroundColor: "transparent",
      });
    }),
    (a.prototype.init = function () {
      e("#morris-bar-example").empty(),
        e("#morris-line-example").empty(),
        e("#morris-donut-example").empty();
        var monthlyDonations = @json($monthlyDonations);

        var chartData = Object.keys(monthlyDonations).map(function (month) {
            var label = "bulan " + month; // Tambahkan teks di depan nilai bulan
            return { y: label, a: monthlyDonations[month] };
        });


        this.createBarChart(
            "morris-bar-example",
            chartData,
            "y",
            ["a"],
            ["Statistics"],
            ["#188ae2"]
        );

      this.createLineChart(
        "morris-line-example",
        [
          { y: "2008", a: 50, b: 0 },
          { y: "2009", a: 75, b: 50 },
          { y: "2010", a: 30, b: 80 },
          { y: "2011", a: 50, b: 50 },
          { y: "2012", a: 75, b: 10 },
          { y: "2013", a: 50, b: 40 },
          { y: "2014", a: 75, b: 50 },
          { y: "2015", a: 100, b: 70 },
        ],
        "y",
        ["a", "b"],
        ["Series A", "Series B"],
        ["0.9"],
        ["#ffffff"],
        ["#999999"],
        ["#10c469", "#188ae2"]
      );
      this.createDonutChart(
        "morris-donut-example",
        [
          { label: "Terkumpul", value: {{ $percentage }} },
          { label: "Belum", value: {{ $percentage_remaining }} },
        ],
        ["#ff8acc", "#5b69bc", "#35b8e0"]
      );
    }),
    (e.Dashboard1 = new a()),
    (e.Dashboard1.Constructor = a);
})(window.jQuery),
  (function (a) {
    a.Dashboard1.init(),
      window.addEventListener("adminto.setBoxed", function (e) {
        a.Dashboard1.init();
      }),
      window.addEventListener("adminto.setFluid", function (e) {
        a.Dashboard1.init();
      });
  })(window.jQuery);

  </script>
@endsection