<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use Illuminate\Support\Facades\Hash;
use \GuzzleHttp\Client;
use App\Library\EmailTemplate;
use App\Library\MT4API;
use App\Affiliateusers;
use App\SpecialAffiliators;
use Illuminate\Support\Facades\Auth;
use App\Affiliategroup;
use App\Library\TreeDiagram;
use App\Library\HttpRequest;
use App\Library\GlobalVariable;

class Mt4APITestController extends Controller
{
    public function usersWithEquity(Request $request)
    {
        $usersWithEquityInJson = MT4API::usersWithEquity();

        return $usersWithEquityInJson;
    }

    
}
