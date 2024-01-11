@extends('admin.master')
@section('title', 'Sendmessage')
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
  <form action="{{Route('admin.savemessage')}}" method="post">
    @csrf
    <label for="customers">Customers</label>
    <select class="customers" name="customer[]" multiple="multiple">
    @error('customer')<span class="text-danger">{{$message}}</span>@enderror
    @foreach($customers as $customer)
        <option value="{{$customer->id}}">{{$customer->name}}</option>
    @endforeach
    </select>
    <label for="title">Title</label>
    <input type="text" id="title" name="title" placeholder="Title">
    @error('title')<span class="text-danger">{{$message}}</span>@enderror
    <br/>
    <label for="title">Type</label>
    <select name="type">
      <option value="">Select</option>
      <option value="message">Message</option>
      <option value="notification">Notification</option>
    </select>
    @error('type')<span class="text-danger">{{$message}}</span>@enderror
    <br/>
    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>
    @error('message')<span class="text-danger">{{$message}}</span>@enderror
    <br/>
    <input type="submit" value="Submit">
  </form>
</div>
              
            <script>
                $(document).ready(function(){
                    $('.customers').select2();
                  $(".account_status").on('change', function(){
                    if(confirm("Do you want to change the status")){
                    var userID = $(this).attr('rel');
                    var account_status = $(this).val();
                  
                    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
                    $.ajax({
                        url: '{{Route('change.account.status')}}',
                        data: {
                          'userID': userID, 'account_status':account_status
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function(data) {
                          if(data.success = 1)
                          {
                            alert(data.message);
                          }
                        }
                        
                    });
                  
                    }
                  
                    
                  })
                  
                })
              </script>
@endsection