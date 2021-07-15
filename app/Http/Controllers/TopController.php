<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\GlobalVariable;

class TopController extends Controller
{
    /**
     * Show the application dashboard.  
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $global = GlobalVariable::get_global_variable();

        return view('top')->with([
            "global" => $global,
         ]);
    }

    public function BtcAssetManagement(Request $request)
    {
        $currentPath = asset('static')."/ja";
        $thisRouteName = 'btcasset';

        return view('btcasset')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
         ]);
    }
    
    public function BtcAssetManagement2(Request $request)
    {
        $currentPath = asset('static')."/ja";
        $thisRouteName = 'btcasset2';

        return view('btcasset2')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
         ]);
    }
}
