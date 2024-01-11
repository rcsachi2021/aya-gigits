<?php

namespace App\Http\Controllers\aya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\plan;
use Auth;

class IndexController extends Controller
{
    public function index(Request $request, $affilaite_id = '')
    {
        if(isset($affilaite_id))
        {
            $request->session()->put('affiliate', $affilaite_id);
        }
        return view('index');
    }

    public function portfolio()
    {
        return view('portfolio');
    }

    public function vera()
    {
        return view('vera');
    }

    public function affiliate()
    {
        return view('affiliate');
    }

    

    public function signup(Request $request)
    {
        //dd($request->session()->get('affiliate'));
        $plan = decrypt($request->str);
        $planDet = plan::where('plan_name',$plan)->first();
        //dd($planDet);
        return view('signup', compact('plan','planDet'));
    }
}
