<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RoyalUI Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/ti-icons/css/themify-icons.css')!!}">
  <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/base/vendor.bundle.base.css')!!}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{!! asset('assets/dashboard/css/style.css')!!}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{!! asset('assets/dashboard/images/favicon.png')!!}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            @if(session()->has('message'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session()->get('message')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              
              <h4>Admin Login</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="{{route('process.login')}}" method="post">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Username">
                  @error('email')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
                  @error('password')<span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="rememberme" class="form-check-input" value="1">
                      Keep me signed in
                    </label>
                  </div>
                  <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                </div>
                
                <!-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{!! asset('assets/dashboard/vendors/base/vendor.bundle.base.js') !!}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{!! asset('assets/dashboard/js/off-canvas.js') !!}"></script>
  <script src="{!! asset('assets/dashboard/js/hoverable-collapse.js') !!}"></script>
  <script src="{!! asset('assets/dashboard/js/template.js') !!}"></script>
  <script src="{!! asset('assets/dashboard/js/todolist.js') !!}"></script>
  <!-- endinject -->
</body>

</html>
