@extends('admin.master')
@section('title', 'Renewals')
@section('content')    
<meta name="csrf-token" content="{{ csrf_token() }}">  
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Account Renewals</h4>
                  
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Customer
                          </th>
                          <th>
                            Transaction ID
                          </th>
                          <th>
                            Plan
                          </th>
                          <th>
                            Amount
                          </th>                          
                          <th>
                            Payment date
                          </th>
                          <th>
                            Status
                          </th>                          
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($renewals))
                        @foreach($renewals as $renewal)
                        <tr>
                          <td>
                           {{$renewal->id}}
                          </td>
                          <td>{{$renewal->userdetails->name}}</td>
                          <td>
                           {{$renewal->transaction_id}}
                          </td>
                          <td>
                          {{ucwords($renewal->plan)}}
                          </td>
                          <td>
                          {{$renewal->renewal_amount}} BTC
                          </td>
                          <td>
                          {{$renewal->created_at}}
                          </td>
                          <td>
                          <select name="payment_status" class="payment_status" rel="{{$renewal->id}}" id="account_status-{{$renewal->userdetails->id}}">
                            <option value="0" @if($renewal->status == 0) selected @endif>Pending</option>
                            <option value="1" @if($renewal->status == 1) selected @endif>Completed</option>
                          </select>                          
                          </td>
                          
                        </tr> 
                        @endforeach     
                        @else
                        <tr>
                          <td colspan="7" style="text-align:center;">No Data!</td>
                        </tr>
                        @endif
                      </tbody>
                      
                    </table>
                    <div class="d-flex">
    {!! $renewals->links() !!}
</div>                 
                  </div>
                </div>
              </div>
            </div>
            <script>
                $(document).ready(function(){
                  $(".payment_status").on('change', function(){
                    if(confirm("Do you want to change the status")){
                    var transactionID = $(this).attr('rel');
                    var payment_status = $(this).val();
                    var ids = $(this).attr('id');
                    id = ids.split('-');
                    userID = id[1];
                    $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
                    $.ajax({
                        url: '{{Route('change.renewal.status')}}',
                        data: {
                          'transactionID': transactionID, 'payment_status':payment_status, 'userID':userID
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