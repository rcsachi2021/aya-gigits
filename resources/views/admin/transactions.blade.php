@extends('admin.master')
@section('title', 'Transactions')
@section('content')    
<meta name="csrf-token" content="{{ csrf_token() }}">  
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Your Transactions</h4>
                  
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
                            Type
                          </th>
                          <th>
                            Payment date
                          </th>
                          <th>
                            Payment Status
                          </th>                          
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach($transactions as $transaction)
                        <tr>
                          <td>
                           {{$transaction->id}}
                          </td>
                          <td>@if(!empty($transaction->userdetails)){{$transaction->userdetails->name}}@endif</td>
                          <td>
                           {{$transaction->transaction_id}}
                          </td>
                          <td>
                          {{ucwords($transaction->plan)}}
                          </td>
                          <td>
                          {{$transaction->amount}} BTC
                          </td>
                          <td>
                          <span class="@if($transaction->type == 'credit') text-success @else text-danger @endif">{{ucwords($transaction->type)}}</span>
                          </td>
                          <td>
                          {{$transaction->created_at}}
                          </td>
                          <td>
                          <select name="payment_status" class="payment_status" rel="{{$transaction->id}}" id="user-{{$transaction->userdetails->id}}">
                            <option value="pending" @if($transaction->payment_status == 'pending') selected @endif>Pending</option>
                            <option value="completed" @if($transaction->payment_status == 'completed') selected @endif>Completed</option>
                          </select>                          
                          </td>
                          
                        </tr> 
                        @endforeach     
                        
                      </tbody>
                      
                    </table>
                    <div class="d-flex">
    {!! $transactions->links() !!}
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
                        url: '{{Route('change.payment.status')}}',
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