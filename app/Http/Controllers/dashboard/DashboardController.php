<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserBalance;
use App\Models\Message;
use App\Models\UserAffiliate;
use App\Models\Renewal;
use App\Models\UserProfit;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $plan = auth()->user()->plan;
        $baseUrl = url('/');
        $affiliateUrl = $baseUrl.'/' .auth()->user()->affiliate_id;
        $affiliates = UserAffiliate::where('parent_id', auth()->user()->affiliate_id)->get();
        $affiliateCount = $affiliates->count();

        $renewals = Renewal::where('user_id',auth()->user()->id)->get();
        $renewalCount = $renewals->count();
        switch($plan)
        {
            case "pollux":
                $min = 12;
                $max = 50;
                break;
            case "antares":
                $min = 20;
                $max = 50;
                break;
            case "tauri":
                $min = 80;
                $max = 120;
                break;
            case "exclusive":
                $min = 120;
                $max = 250;    
            default:
                $min = 12;
                $max = 50;
        }
        $profitPercent = rand($min,$max);
        if($request->session()->get('profitcent') == '')
        {
            $request->session()->put('profitcent', $profitPercent);
        }

        $profitPer = $request->session()->get('profitcent');
        
        $userBlanceDet = UserBalance::where('user_id', auth()->user()->id)->first();
        $userBlanace   = (isset($userBlanceDet))?$userBlanceDet->balance:0.0;
        if(isset($userBlanace)){
            $total         = $userBlanace + ($userBlanace * $profitPer/100);
        }else{
            $total         = 0.0;
        }
        $date = \Carbon\Carbon::today()->subDays(7);
        $dailyProfit = UserProfit::where('profit_date','>=',$date)->where('user_id',auth()->user()->id)->get();
        //dd($dailyProfit);
        $profits = '';
       
        foreach($dailyProfit as $profit)
        {
            $profits .= $profit->profit.',';
            $date = $profit->profit_date;
            $datess = Carbon::createFromFormat('Y-m-d', $date)->format('l');
            $profitDates[] = $datess;
        }
        if(empty($profitDates))
        {
            $profitDates = [];
        }
       // dd($profits);
        return view('dashboard.dashboard', compact('profitPer','userBlanace','total','affiliateUrl','affiliateCount','renewalCount','dailyProfit','profits','profitDates'));
    }


    public function getnotification(Request $request)
    {
        if($request->view != null)
        {
            $userID = auth()->user()->id;
            $unviewdMsg = Message::where('to_user', $userID)->update(['viewed_status'=>'viewd']);
                      
        }

        $messages = Message::where('to_user', auth()->user()->id)->where('type','message')->where('date_viewed', null)->orderby('id','desc')->take(3)->get();
        //dd($messages);
        $html = '';

        foreach($messages as $message){
            $html .= '<a class="dropdown-item">
            <div class="item-content flex-grow">
              <h6 class="ellipsis font-weight-normal">Admin</h6>
              <p class="font-weight-light small-text text-muted mb-0">'.
              $message->message
              .'</p>
            </div>
          </a>';
        }
        
        return $html; 


    }

    public function getmessages(Request $request)
    {
        if($request->view != null)
        {
            $userID = auth()->user()->id;
            $unviewdMsg = Message::where('to_user', $userID)->update(['viewed_status'=>'viewd']);
                      
        }

        $messages = Message::where('to_user', auth()->user()->id)->where('type','notification')->where('date_viewed', null)->orderby('id','desc')->take(3)->get();
        //dd($messages);
        $html = '';

        foreach($messages as $message){
            $html .= '<a class="dropdown-item">
            <div class="item-thumbnail">
              <div class="item-icon bg-success">
                <i class="ti-info-alt mx-0"></i>
              </div>
            </div>
            <div class="item-content">
              <h6 class="font-weight-normal">Earned 120%</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Just now
              </p>
            </div>
          </a>';
        }
        
        return $html; 


    }

}
