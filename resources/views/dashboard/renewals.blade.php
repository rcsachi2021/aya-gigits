@extends('dashboard.master')
@section('title', 'Renewals')
@section('content')       
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Your Renewals</h4>
                  
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
                            Renwal date
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
                          <td>
                           {{$renewal->transaction_id}}
                          </td>
                          <td>
                          {{$renewal->plan}}
                          </td>
                          <td>
                          {{$renewal->renewal_amount}} BTC
                          </td>
                          <td>
                          {{$renewal->created_at}}
                          </td>
                          <td>
                          <span class="@if($renewal->status == 0) text-danger @else text-success @endif">@if($renewal->status == 0) Pending @else Approved @endif</span>
                          </td>
                        </tr> 
                        @endforeach  
                        @else
                          <tr>
                            <td colspan="6" style="text-align:center;">No Data!</td>
                        </tr>
                       @endif
                                            
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection