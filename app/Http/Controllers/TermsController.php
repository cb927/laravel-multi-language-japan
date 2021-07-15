<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\GlobalVariable;

class TermsController extends Controller
{
    public function TermsAndCondition(Request $request)
    {
        $currentPath = asset('static')."/ja";
        $thisRouteName = 'terms';

        return view('terms.terms')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
         ]);
    }

    public function Faq(Request $request){
        $currentPath = asset('static')."/ja/room/-resources";
        $thisRouteName = 'faq';

        return view('terms.faq')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
         ]);
    }

    public function Privacy(Request $request)
    {
        $currentPath = asset('static')."/ja";
        $thisRouteName = 'privacy';

        return view('terms.privacy')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
         ]);
    }

    public function Risk(Request $request)
    {
        $currentPath = asset('static')."/ja";
        $thisRouteName = 'risk';

        return view('terms.risk')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
         ]);
    }

    public function ESignature(Request $request)
    {
        $currentPath = asset('static')."/ja";
        $thisRouteName = 'esignature';

        return view('terms.esignature')->with([
            "currentPath" => $currentPath,
            "thisRouteName" => $thisRouteName,
            "inqueryComplete" => $request->inqueryComplete,
         ]);
    }

    public function Aboutcompany(Request $request)
    {
        $global = GlobalVariable::get_global_variable();
        $summary_main_table_body = self::summary_main_table_body();

        return view('terms.aboutcompany')->with([
            "global" => $global,
            "summary_main_table_body" => $summary_main_table_body,
        ]);
    }

    private function summary_main_table_body()
    {
        $table_body = [];

       

        $table_body2 = [];
        $table_body2[] = '会社名';
        $table_body2[] = "GOOD ENOUGH TREASURE co.ltd";
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = '所在地';
        $table_body2[] = "83 Baker Street, London,UK";
        $table_body[] = $table_body2;

        $table_body3 = [];
        $table_body3[] = "1. Business related to foreign exchange / CFD / trading on the Internet";
        $table_body3[] = "2. Forex / CFD / trading business";
        $table_body3[] = "3. Forex / CFD / Trading information service";

        $table_body2 = [];
        $table_body2[] = '事業内容';
        $table_body2[] = "multi_contents";
        $table_body2[] = $table_body3;
        $table_body[] = $table_body2;

        return $table_body;
    }
}
