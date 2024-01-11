@extends('admin.master')
@section('title', 'Customers')
@section('content')    
<meta name="csrf-token" content="{{ csrf_token() }}">  
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customers</h4>
                  
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                          Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Phone
                          </th>
                          <th>
                            Registerd On
                          </th>
                          <th>
                            Plan
                          </th>
                          <th>
                            Amount
                          </th>
                          
                          <th>
                           Status
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($customers as $customer)
                        <tr>
                          <td>
                           {{$customer->id}}
                          </td>
                          <td>{{$customer->name}}</td>
                          <td>
                           {{$customer->email}}
                          </td>
                          <td>
                          {{$customer->phone}}
                          </td>
                          <td>
                          {{$customer->created_at}} 
                          </td>
                          <td>
                          {{ucwords($customer->plan)}} 
                          </td>
                          <td>
                          {{$customer->amount}} BTC 
                          </td>
                          <td>
                          <select name="account_status" class="account_status" rel="{{$customer->id}}">
                            <option value="1" @if($customer->active_status == 1) selected @endif>Active</option>
                            <option value="0" @if($customer->active_status == 0) selected @endif>Inactive</option>
                          </select>                          
                          </td>
                          
                        </tr> 
                        @endforeach     
                        
                      </tbody>
                      
                    </table>
                    <div class="d-flex">
    {!! $customers->links() !!}
</div>                 
                  </div>
                </div>
              </div>
            </div>
            <script>
                $(document).ready(function(){
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