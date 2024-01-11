@extends('dashboard.master')
@section('title', 'Profile')
@section('content')       

		<div class="main-body">
			<div class="row">
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							
							
							<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Name</h6>
									<span class="text-secondary">{{$user->name}}</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Email</h6>
									<span class="text-secondary">{{$user->email}}</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">BTC Wallet Address</h6>
									<span class="text-secondary">{{$user->wallet_address}}</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Plan</h6>
									<span class="text-secondary">{{$user->transactionDet->plan}}</span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Amount</h6>
									<span class="text-secondary">{{$user->transactionDet->amount}} BTC</span>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
					@if(session()->has('message'))	
					<div class="alert alert-success alert-dismissible fade show" role="alert">
  					{{session()->get('message')}}
  					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					@endif
						<div class="card-body">
						<form action="{{Route('profile.update')}}" id="profile-update" method="post">
							@csrf
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" readonly value="{{$user->name}}">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" readonly value="{{$user->email}}">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">BTC Wallet Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="wallet_address" value="{{$user->wallet_address}}">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="phone" value="{{$user->phone}}">
								</div>
							</div>
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$user->address}}" name="address">
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Save Changes">
								</div>
							</div>
							</form>
						</div>
						
						<div class="card-body">
						<h4>Change Password</h4>
						<br/>
						<form action="{{Route('profile.update.password')}}" id="profile-update" method="post">
							@csrf
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="password" class="form-control"  name="password">
									@error('password')	<span class="text-danger">{{$message}}</span>@enderror
								</div>
									
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Confirm Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="password" class="form-control"  name="password_confirmation">
								</div>
						
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" value="Update">
								</div>
							</div>
							</form>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	
@endsection