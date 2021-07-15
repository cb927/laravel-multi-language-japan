<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\GlobalVariable;

class FundController extends Controller
{
    public function index(Request $request)
    {
        $currentPath = asset('static')."/ja/accounts";
        $thisRouteName = 'funding';
        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();

        return view('funding')->with([
            "global" => $global,
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
         ]);
    }
    public function confirm(Request $request)
    {
        $currentPath = asset('static')."/ja/accounts";
        $thisRouteName = 'funding';
        // 共通部分表示に使用する情報
        $global = GlobalVariable::get_global_variable();
        $thanks_messsage1 = '入金申請を受け付けいたしました。３営業日以内に処理をいたします。';
        $thanks_messsage2 = '今しばらくお待ちいただけますようお願い致します。（土日を挟む場合は除く）';

        return view('thanks')->with([
            "global" => $global,
            "thanks_messsage1" => $thanks_messsage1,
            "thanks_messsage2" => $thanks_messsage2,
         ]);
    }

}
