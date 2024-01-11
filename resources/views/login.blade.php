@extends('template.master')
@section('title', 'User Login')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/ti-icons/css/themify-icons.css')!!}">
  <link rel="stylesheet" href="{!! asset('assets/dashboard/vendors/base/vendor.bundle.base.css')!!}">
<link rel="stylesheet" href="{!! asset('assets/dashboard/css/style.css')!!}">
<form action="{{Route('processlogin')}}" method="post">
    @csrf
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
              
              
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="{{Route('processlogin')}}" method="post">
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
                  
                    <label class="form-check-label text-muted">
                      <input type="checkbox" name="remember"  value="1">
                      Keep me signed in
                    </label>
                 
                   <a href="{{Route('forget.password.get')}}" class="auth-link text-black">Forgot password?</a> 
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
</form>
<script src="{!! asset('assets/dashboard/vendors/base/vendor.bundle.base.js') !!}"></script>
@endsection