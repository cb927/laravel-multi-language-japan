<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use Illuminate\Support\Facades\Hash;
use \GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class HashController extends Controller
{

    public function index(Request $request)
    {
        echo Hash::make($request->password);
    }

    public function judge(Request $request)
    {
       if (Hash::check($request->password, Auth::user()->password)) {
            return "true";
        }else{
            return "false";
        }
    }
    
}
