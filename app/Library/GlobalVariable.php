<?php
namespace App\Library;
use App\Affiliateusers;

class GlobalVariable
{
    

    static public function get_global_variable()
    {
        return (object) [
            'header_table_body' => self::header_table_body(),
            'header_table_body2'   => self::header_table_body2(),
            'footer_table_body'   => self::footer_table_body(),
        ];
    }

    static public function header_table_body()
    {
        $table_body = [];

       
        $table_body2 = [];
        $table_body2[] = trans('header.menu_top');
        $table_body2[] = route('top');
        $table_body2[] = "2";
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('header.menu_new_account');
        $table_body2[] = route('individual');
        $table_body2[] = "3";
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('header.menu_demo');
        $table_body2[] = route('demo');
        $table_body2[] = "3";
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('header.menu_info');
        $table_body2[] = route('top')."#annai";
        $table_body2[] = "4";
        $table_body[] = $table_body2;
        
        return $table_body;
    }

    static public function header_table_body2()
    {
        $table_body = [];
        
        $table_body2 = [];
        $table_body2[] = trans('header.menu_notice');
        $table_body2[] = route('top')."#osirase";
        $table_body2[] = "3";
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('header.menu_faq');
        $table_body2[] = route('faq');
        $table_body2[] = "3";
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('header.menu_login');
        $table_body2[] = route('mt4login');
        $table_body2[] = "3";
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('header.menu_logout');
        $table_body2[] = route('mt4logout');
        $table_body2[] = "3";
        $table_body[] = $table_body2;
        
        

        return $table_body;
    }



    static private function footer_table_body()
    {
        $table_body = [];
        
        $table_body2 = [];
        $table_body2[] = trans('footer.footer_FSG');
        $table_body2[] = asset('images/GEFX FSG.pdf');
        $table_body2[] = "2";
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('footer.footer_PDS');
        $table_body2[] = asset('images/GEFX PDS.pdf');
        $table_body2[] = "2";
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('footer.footer_transaction_tem');
        $table_body2[] = asset('images/GEFX Terms & conditions.pdf');
        $table_body2[] = "1";
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('footer.footer_policy');
        $table_body2[] = asset('images/GEFX WebsitePrivacyPolicy.pdf');
        $table_body2[] = "3";
        $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('footer.footer_term_use');
        $table_body2[] = asset('images/GEFX利用規約.pdf');
        $table_body2[] = "2";
        $table_body[] = $table_body2;

        // $table_body2 = [];
        // $table_body2[] = 'コンプライアンス';
        // $table_body2[] = route('top');
        // $table_body2[] = "1";
        // $table_body[] = $table_body2;

        $table_body2 = [];
        $table_body2[] = trans('footer.footer_profile');
        $table_body2[] = route('aboutcompany');
        $table_body2[] = "1";
        $table_body[] = $table_body2;
        
        

        return $table_body;
    }
}