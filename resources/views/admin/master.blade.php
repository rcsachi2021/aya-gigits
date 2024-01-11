<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Aya Dashboard</title>
  <!-- plugins:css -->
  <link href="{!! asset('assets/dashboard/vendors/ti-icons/css/themify-icons.css') !!}" rel="stylesheet"> 
  <link href="{!! asset('assets/dashboard/vendors/base/vendor.bundle.base.css') !!}" rel="stylesheet"> 

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link href="{!! asset('assets/dashboard/css/apexcharts.css') !!}" rel="stylesheet"> 
  <link href="{!! asset('assets/dashboard/css/style.css') !!}" rel="stylesheet"> 
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>  
  
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    
    <!-- partial:partials/_navbar.html -->
    @include('admin.includes.topnavbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.includes.sidenavbar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">@yield('title')</h4>
                </div>
                <div>
                   <!-- <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>-->
                </div>
              </div>
            </div>
          </div>
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.includes.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{!! asset('assets/dashboard/vendors/base/vendor.bundle.base.js') !!}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{!! asset('assets/dashboard/vendors/chart.js/Chart.min.js') !!}"></script>
  <script src="{!! asset('assets/dashboard/js/jquery.cookie.js') !!}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{!! asset('assets/dashboard/js/off-canvas.js') !!}"></script>
  <script src="{!! asset('assets/dashboard/js/hoverable-collapse.js') !!}"></script>
  <script src="{!! asset('assets/dashboard/js/template.js') !!}"></script>
  <script src="{!! asset('assets/dashboard/js/todolist.js') !!}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{!! asset('assets/dashboard/js/dashboard.js') !!}"></script>
  <script src="{!! asset('assets/dashboard/js/apexcharts.js') !!}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
     var options = {
          series: [{
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Product Trends by Month',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
  </script>
  <!-- End custom js for this page-->
</body>

</html>

