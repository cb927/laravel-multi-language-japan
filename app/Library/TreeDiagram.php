<?php
namespace App\Library;

use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Library\MT4API;
use App\AffiliateGroup;

class TreeDiagram
{
    // clientsTopologyが与えられる
    static public function IBQuantity($clientsTopology, $time = null)
    {
        //最下層一般ユーザ、ログインユーザが属するアフィリグループ、ログインユーザのtier
        list($thisTierClients, $affiligroup, $tier) = self::getLowestNoneAffilliateUser($clientsTopology);



        //から発生するコミッション等
        $commissionPercent = self::getCommissionPercent($tier, $affiligroup);
        $commissions_by_child_users = self::getCommissionsOfThePeople($thisTierClients, $commissionPercent, $time);

        //上記を元に、コミッション、デポジットもだせる







        

        // tier2に対する合計commissionと、tier3に対する合計commissionの総合計

        $sumSumInfo = (object) [
            'volumes'   => 0,
            'commission'   => 0,
            'commissionPercent'   => $commissionPercent,
        ];

        $sumSumInfo->volumes += $commissions_by_child_users->sumInfo->volumes;
        $sumSumInfo->commission += $commissions_by_child_users->sumInfo->commission;
        
        $result = (object) [
            'commissions_by_child_users'   => $commissions_by_child_users,
            'sumSumInfo'   => $sumSumInfo,
        ];;


        //dd($result);
        return $result;
    }

    static public function getLowestNoneAffilliateUser($clientsTopology)
    {
        // 自身のtierを取得
        $tier = Auth::user()->tier;

        // 属するグループの情報取得
        $affiligroupid = Auth::user()->affiligroup;
        $affiligroup = AffiliateGroup::Where('name', $affiligroupid)->first();

        // 組織末端の一般ユーザが自分の何段下かを特定して(自分がtier1の時のtier)
        $mattantier = 6 - (int)$tier;

        //その階層のユーザ全員
        $thisTierClients = self::extractXTierUsers($clientsTopology, $mattantier);

        return [$thisTierClients, $affiligroup, $tier];
    }

    static public function getCommissionPercent($tier, $affiligroup)
    {
        // 自身のコミッションパーセントを取得
        $commissionPercent = 0;
        if($tier == "1")
        {
            $commissionPercent = $affiligroup->tier1;
        }
        if($tier == "2")
        {
            $commissionPercent = $affiligroup->tier2;
        }
        if($tier == "3")
        {
            $commissionPercent = $affiligroup->tier3;
        }
        if($tier == "4")
        {
            $commissionPercent = $affiligroup->tier4;
        }

        return $commissionPercent;
    }

    static private function getCommissionsOfThePeople($child_users, $spread, $time)
    {
        $commissions_by_child_users = [];
        
        $sumInfo = (object) [
            'volumes'   => 0,
            'commission'   => 0,
            'spread'   => $spread,
            'count' => count($child_users),
        ];;
        
        foreach($child_users as $child_user)
        {
            // ログインユーザが紹介した(tier2)あるユーザから発生するコミッション等
            $commission_by_child_user = self::getCommissionOfThePerson($child_user, $spread, $time);
            $commissions_by_child_users[] = $commission_by_child_user;

            $sumInfo->volumes += $commission_by_child_user->volumes;
            $sumInfo->commission += $commission_by_child_user->commission;
            
        }

        $result = (object) [
            'commissions_by_child_users'   => $commissions_by_child_users,
            'sumInfo'   => $sumInfo,
        ];;

        return $result;
    }

    // 第一引数の子ユーザの総取引量(lot)と、それに対して紹介者(親)が得るコミッション(pips)と、それを円に直したdeposit
    static private function getCommissionOfThePerson($child_user, $spread, $time)
    {
        $login = $child_user->this_user->account_number;

        $theUserWithEquity = MT4API::GetTheUserWithEquity($login);
        $user_info = MT4API::getInfos($login, $theUserWithEquity, $time);
        $volumes = $user_info->volumes;

        $commission = $volumes * $spread;

        $result = (object) [
            'account_number'   => $login,
            'volumes'   => $volumes,
            'spread'   => $spread,
            'commission'   => $commission,
        ];;

        return $result;
    }

    // 与えたaffilicodeで紹介された人たちそれぞれに対して、その人が紹
    static public function RecursivelyIntroducedPersons($this_user)
    {
        $child_users = User::where('introducer', $this_user->affilicode)->get();

        $childUserInfos = [];
        
        if(count($child_users) != 0)
        {
            foreach($child_users as $child_user)
            {
                $childUserInfos[] = self::RecursivelyIntroducedPersons($child_user);
            }
        }
        
        $this_user_detail = (object) [
        ];;

        return (object) [
            'this_user'   => $this_user,
            'this_user_detail'   => $this_user_detail,
            'child_users'   => $childUserInfos,
        ];;
    }

    // 自分をtier1とした時、tier5までを取得
    static public function flatTree($clientsTopology)
    {
        $clients = [];

        if(count($clientsTopology->child_users)!=0) 
        foreach($clientsTopology->child_users as $tier2_user)
        {
            $clients[] = $tier2_user;

            if(count($tier2_user->child_users)!=0) 
            foreach($tier2_user->child_users as $tier3_user)
            {
                $clients[] = $tier3_user;

                if(count($tier3_user->child_users)!=0) 
                foreach($tier3_user->child_users as $tier4_user)
                {
                    $clients[] = $tier4_user;

                    if(count($tier4_user->child_users)!=0) 
                    foreach($tier4_user->child_users as $tier5_user)
                    {
                        $clients[] = $tier5_user;
                    }
                }
            }
        }

        return $clients;
    }

    // 与えられた木構造に対して、$tierのユーザ一覧を抽出
    static public function extractXTierUsers($clientsTopology, $tier)
    {
        $clients = [];

        if(count($clientsTopology->child_users)!=0) 
        foreach($clientsTopology->child_users as $tier2_user)
        {
            if($tier == 2)
            $clients[] = $tier2_user;

            if(count($tier2_user->child_users)!=0) 
            foreach($tier2_user->child_users as $tier3_user)
            {
                if($tier == 3)
                $clients[] = $tier3_user;

                if(count($tier3_user->child_users)!=0) 
                foreach($tier3_user->child_users as $tier4_user)
                {
                    if($tier == 4)
                    $clients[] = $tier4_user;

                    if(count($tier4_user->child_users)!=0) 
                    foreach($tier4_user->child_users as $tier5_user)
                    {
                        if($tier == 5)
                        $clients[] = $tier5_user;
                    }
                }
            }
        }

        return $clients;
    }

    static private function IntroducedPersons($affilicode)
    {
        $child_users = User::where('introducer', $affilicode)->get();

        $descendants = self::IndirectlyIntroducedPersons($child_users);

        $result = (object) [
            'child_users'   => $child_users,
            'descendants'   => $descendants,
        ];;

        return $result;
    }

    static private function IndirectlyIntroducedPersons($child_users)
    {
        $descendants = [];
        foreach($child_users as $child_user)
        {
            $affilicode = $child_user->affilicode;
            $descendants[] = User::where('introducer', $affilicode)->get();
        }

        return $descendants;
    }
}