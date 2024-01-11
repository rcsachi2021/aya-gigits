@extends('dashboard.master')
@section('title', 'Transactions')
@section('content')       
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
                            Status
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                          <td>
                           {{$transaction->id}}
                          </td>
                          <td>
                           {{$transaction->transaction_id}}
                          </td>
                          <td>
                          {{$transaction->plan}}
                          </td>
                          <td>
                          {{$transaction->amount}} BTC
                          </td>
                          <td>
                          <span class="@if($transaction->type == 'debit') text-danger @else text-success @endif"> {{ucfirst($transaction->type)}}</span>
                          </td>
                          <td>
                          {{$transaction->created_at}}
                          </td>
                          <td>
                          <span class="@if($transaction->payment_status == 'pending') text-danger @else text-success @endif">{{ucfirst($transaction->payment_status)}}</span>
                          </td>
                        </tr> 
                        @endforeach                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection