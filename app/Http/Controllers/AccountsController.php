<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index(Request $request)
    {
        $currentPath = asset('static')."/ja/forms/accounts";
        $thisRouteName = 'account';

        return view('account')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
         ]);
    }

    public function index001af(Request $request)
    {
        $currentPath = asset('static')."/ja/forms/accounts";
        $thisRouteName = 'account';

        return view('account001af')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
         ]);
    }
}
