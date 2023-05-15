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
                            <a href="{{ url('admin/donations') }}" class="dropdown-item" >Lihat Data</a>
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
                            <a href="{{ url('admin/users') }}" class="dropdown-item" >Lihat Data</a>
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

                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                           
                            <a href="{{ url('admin/categories') }}" class="dropdown-item" >Lihat Data</a>
                        </div>
                    </div>

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
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item" onclick="Bulanshwo()">Berdasarkan Bulan</a>
                            <a href="javascript:void(0);" class="dropdown-item" onclick="Tahunshow()">Berdasarkan Minggu</a>
                            <a href="javascript:void(0);" class="dropdown-item">Berdasarkan Hari</a>
                        </div>
                    </div>
                    
                   <div class="container-fluid" id="bulan" >
                    <h4 class="header-title mt-0">Donasi Per Bulan</h4>
                    <div id="morris-bar-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                   </div>
                    
                   <div class="container mt-3" id="tahun" >
                    <h4 class="header-title mt-0">Donasi Per Minggu</h4>
                    <div id="morris-bar-example2" dir="ltr" style="height: 280px" class="morris-chart"></div>
                   </div>
                   

                    {{-- @foreach($mingguDonations  as $week  => $total)
                    <p>Total amount for week {{ $week   }}: {{ $total }}</p>
                @endforeach --}}
                
                </div>
            </div>
        </div><!-- end col -->


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

    function Bulanshwo() {
        // Hide Donasi Per Minggu section
        document.getElementById("tahun").style.display = "none";
        // Show Donasi Per Bulan section
        document.getElementById("bulan").style.display = "block";
    }

    function Tahunshow() {
        // Show Donasi Per Minggu section
        document.getElementById("tahun").style.display = "block";
        // Hide Donasi Per Bulan section
        document.getElementById("bulan").style.display = "none";
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
  (a.prototype.createBarChart2 = function (e, a, r, t, o, i) {
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
      e("#morris-bar-example2").empty(),
        e("#morris-donut-example").empty();

        var monthlyDonations = @json($monthlyDonations);

        var chartData = Object.keys(monthlyDonations).map(function (month) {
            return { y: month, a: monthlyDonations[month] };
        });

        var mingguDonations = @json($mingguDonations);

        var chartData2 = Object.keys(mingguDonations).map(function (week) {
            return { y: week, a: mingguDonations[week] };
        });

        this.createBarChart(
            "morris-bar-example",
            chartData,
            "y",
            ["a"],
            ["Statistics"],
            ["#188ae2"]
        );

        this.createBarChart2(
            "morris-bar-example2",
            chartData2,
            "y",
            ["a"],
            ["Statistics"],
            ["#188ae2"]
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