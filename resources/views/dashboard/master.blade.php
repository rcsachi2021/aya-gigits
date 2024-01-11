<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Aya Dashboard</title>
  <!-- plugins:css -->
  <link href="{!! asset('assets/dashboard/vendors/ti-icons/css/themify-icons.css') !!}" rel="stylesheet"> 
  <link href="{!! asset('assets/dashboard/vendors/base/vendor.bundle.base.css') !!}" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"/>
  <link href="{!! asset('assets/dashboard/css/apexcharts.css') !!}" rel="stylesheet"> 
  <link href="{!! asset('assets/dashboard/css/style.css') !!}" rel="stylesheet"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <style>
    .btn-primary {
    color: #fff;
    background-color: #0151ac !important;
    border-color: #104f95 !important;
}

.btn-primary:hover {
    color: #fff !important;
    background-color: #2672c7 !important;
    border-color: #0953a5 !important;
}
main{
        display: flex;
        justify-content: center;
    }
    #qrcode{
        display: flex;
        justify-content: center;
    }
* {
  box-sizing: border-box;
}
html {
    transition: color 300ms, background-color 300ms;
}

html[data-theme='dark'] {
    background: #000;
    filter: invert(1) hue-rotate(180deg)
}

html[data-theme='dark'] img {
  filter: invert(1) hue-rotate(180deg)
}

h1 {
  color: #2961ba;
}

h2 {
  color: #ba6129;
}
#dark{
  background-color: rgb(0, 0, 0);
    color: rgb(255, 255, 255);
}
    </style>
</head>
<body>
  <div class="container-scroller">
    
    <!-- partial:partials/_navbar.html -->
    @include('dashboard.includes.topnavbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('dashboard.includes.sidenavbar')
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
                   <button type="button" class="btn btn-primary btn-icon-text btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <i class="ti-plug btn-icon-prepend"></i>Renew
                    </button>
                </div>
              </div>
            </div>
          </div>
          @yield('content')
        </div>
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form method="post" id="renew" action="{{route('renew')}}">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Renew Plan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <div class="form-group">
            <main>
                <div id="qrcode" style="width:20px"></div>
            </main>
            </div>
            <div class="form-group">
              <label for="amount">Amount</label>
              <input class="form-control" name="amount" id="amount" required>
            </div>
            <div class="form-group">
            <label class="form-check-label" for="flexCheckDefault">
              Confirm If Paid
            </label>
            <input class="form-check-input" name="confirm" type="checkbox" value="1" id="confirm" >
            
          </div>
            
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="btn-renew" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
</div>


        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('dashboard.includes.footer')
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
  <script type="text/javascript" language="javascript">
    var pausecontent = new Array();
    <?php 
    if(!empty($profitDates)){
      foreach($profitDates as $key => $val){ ?>
       pausecontent.push('<?php echo $val; ?>');  
       
    <?php }} ?>
   
    var myJsonString = JSON.stringify(pausecontent);
    //alert(myJsonString);
</script>
  <script>
    
    var options = {
          series: [{
            name: "Profit %",
            data: [{{$profits ?? ''}}],
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
          categories: pausecontent
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
  </script>
  <!-- End custom js for this page-->

  <script>

$(document).ready(function(){

// updating the view with notifications using ajax

function load_unseen_notification(view = '')
{
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
 $.ajax({

  url:"{{route('getnotification')}}",
  method:"POST",
  data:{view:view},
  dataType:"html",
  success:function(data)
  {

   $(".msg-box").html(data);

   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }

  }

 });

}

load_unseen_notification();

function load_unseen_messages(view = '')
{
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
 $.ajax({

  url:"{{route('getmessages')}}",
  method:"POST",
  data:{view:view},
  dataType:"html",
  success:function(data)
  {

   $(".notify-box").html(data);

   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }

  }

 });

}
load_unseen_messages();
// load new notifications

$("#notificationDropdown").click(function(){
  $(".msg-popup").hide();
  $(".profile-popup").hide();
  $(".notification-popup").toggle();
})

$("#profileDropdown").click(function(){
  $(".notification-popup").hide();
  $(".msg-popup").hide();
  $(".profile-popup").toggle();
})

$(document).on('click', '#messageDropdown', function(){
  $(".profile-popup").hide();
  $(".notification-popup").hide();
  $(".msg-popup").toggle();

 //$('.count').html('');

 load_unseen_notification('yes');

});

setInterval(function(){

 load_unseen_notification();
 load_unseen_messages();

}, 5000);


// $("#btn-renew").on('click', function(){
//   $.ajaxSetup({
//     headers: {
//       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
//   });
//   // amount = $("#amount").val();
//   // confirm = $("#confirm").val();
//   data = $("#renew").serialize();
//   alert(data);
//   $.ajax(function(){
//     url:"{{route('renew')}}",
//     method:"post",
//     data:data,
//     dataType:"JSON",
//     success:function(data)
//     {

//     })
// })

});

</script>
<script>
            const htmlEl = document.getElementsByTagName('html')[0];

const toggleTheme = (theme) => {
    localStorage.setItem("mode", theme);
    htmlEl.dataset.theme = theme;
}
            </script>
<script>
        var qrcode = new QRCode("qrcode",
        "1Lbcfr7sAHTD9CgdQo3HTMTkV8LK4ZnX71.");
    </script>
    <script>
      $(document).ready(function(){
        mode = localStorage.getItem("mode");
        
        $("#"+mode).show();
        toggleTheme(mode);
        // $("#dark").click(function(){
        //   $(this).toggle();
        //   $("#light").toggle();
        // })
        // $("#light").click(function(){
        //   $(this).toggle();
        //   $("#dark").toggle();
        // })
      })
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>

