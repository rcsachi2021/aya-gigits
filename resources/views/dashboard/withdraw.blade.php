@extends('dashboard.master')
@section('title', 'Withdraw')
@section('content')    
<meta name="csrf-token" content="{{ csrf_token() }}">  
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

.select2-container {
    box-sizing: border-box;
    display: inline-block;
    margin: 0px 0px 22px 0px;
    position: relative;
    vertical-align: middle;
}

input[type=submit] {
  background-color: #0d6efd;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #073f91;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session()->get('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  <form action="{{Route('withdraw.amount')}}" method="post">
    @csrf
    <label for="title">BTC Wallet Address</label>
    <input type="text" id="wallet_address" name="wallet_address" value="{{auth()->user()->wallet_address}}" placeholder="Wallet address">
    @error('wallet_address')<span class="text-danger">{{$message}}</span>@enderror
    <br/>
    <label for="message">Amount</label>
    <input type="text" id="amount" name="amount" placeholder="Amount">
    @error('amount')<span class="text-danger">{{$message}}</span>@enderror
    <br/>
    <input type="submit" value="Submit">
  </form>
</div>           
@endsection