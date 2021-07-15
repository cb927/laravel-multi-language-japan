<?php 
if($kind=="ikeda"){
    $bank_name = "池田泉州銀行";
    $img_file_name = 'img/deposit-icon/ikedasensyu.png';
    $img_qr_name = 'aaa';
    $address = '3HZYgXp9NnQbuNez89vN3rYDqbQGmrFzuN';
}

?>

<div class="row">

    <div class="col-12">
        <div>
            <div class="row no-gutters">
                <div class="col-md-12">
                
                <a id="submit2" class="btn btn-main btn-lg btn-primary m-2" href="{{route('deposit')}}" style="float:left;">←前のページに戻る</a><br><br><br><br>

                    <div>
                        good enoughの入金申請を受付ました。<br>
                        ※入金申請受付は、入金予定の内容を通知するものです。<br>
                        お振込を確認できない限り、資金は反映されませんのでご注意ください。<br>
                    </div>

                    <div class="card-body" style="text-align:center;">
                        <img src="{{asset($img_file_name)}}">
                        
                        <p class="card-text" style="text-align:left;">{{$bank_name}}の銀行口座へお振込ください。</p>

                        <table border="1" width="500" cellspacing="0" cellpadding="5" bordercolor="#333333">
                        <tr>
                        <td bgcolor="#FFFFFF" valign="top" width="150">受取人口座名義</td>
                        <td bgcolor="#FFFFFF" valign="top" width="200">カ）グッドイナフ</td>
                        </tr>
                        <tr>
                        <td bgcolor="#FFFFFF" valign="top" width="150">送金先銀行　</td>
                        <td bgcolor="#FFFFFF" valign="top" width="200">池田泉州銀行</td>
                        </tr>
                        <tr>
                        <td bgcolor="#FFFFFF" valign="top" width="150">送金先銀行住所</td>
                        <td bgcolor="#FFFFFF" valign="top" width="200">大阪府大阪市北区茶屋町18番14号</td>
                        </tr>
                        <tr>
                        <td bgcolor="#FFFFFF" valign="top" width="150">支店名</td>
                        <td bgcolor="#FFFFFF" valign="top" width="200">本町支店</td>
                        </tr>
                        <tr>
                        <td bgcolor="#FFFFFF" valign="top" width="150">普通/当座</td>
                        <td bgcolor="#FFFFFF" valign="top" width="200">普通</td>
                        </tr>
                        <tr>
                        <td bgcolor="#FFFFFF" valign="top" width="150">受取人口座番号</td>
                        <td bgcolor="#FFFFFF" valign="top" width="200">229890</td>
                        </tr>
                        <tr>
                        <td bgcolor="#FFFFFF" valign="top" width="150">受取人住所</td>
                        <td bgcolor="#FFFFFF" valign="top" width="200">Unit 05,15/F,Austin Tower,22-26 Austine Avenue,Tsim Sha Tsui,Hong Kong</td>
                        </tr>
                        <tr>
                        <td bgcolor="#FFFFFF" valign="top" width="150">SWIFTコード</td>
                        <td bgcolor="#FFFFFF" valign="top" width="200">BIKEJPJS</td>
                        </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="">
        <div class="">
            <div class="depositLink" href="#" data-category="credit_card" data-objetive="alternative-al">
                <span class="bank">
                    
                </span>																	
                <img src="{{asset('img/deposit-icon/blank.png')}}" class="img-fluid" alt="" title="">
            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <div class="depositLink" href="#" data-category="credit_card" data-objetive="alternative-al">
                <span class="bank">
                    
                </span>																	
                <img src="{{asset('img/deposit-icon/blank.png')}}" class="img-fluid" alt="" title="">
            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <div class="depositLink" href="#" data-category="credit_card" data-objetive="alternative-al">
                <span class="bank">
                    
                </span>																	
                <img src="{{asset('img/deposit-icon/blank.png')}}" class="img-fluid" alt="" title="">
            </div>
        </div>
    </div>
    
</div>