<?php 
$currency_mongon;

if($kind=="btc"){
    $currency_mongon = "ビットコイン";
    $img_file_name = 'img/deposit-icon/bitcoin.png';
    $img_qr_name = 'aaa';
    $address = '3HZYgXp9NnQbuNez89vN3rYDqbQGmrFzuN';
}

if($kind=="tether"){
    $currency_mongon = "テザー";
    $img_file_name = 'img/deposit-icon/tether.png';
    $img_qr_name = 'aaa';
    $address = '3HZYgXp9NnQbuNez89vN3rYDqbQGmrFzuN';
}

if($kind=="eth"){
    $currency_mongon = "イーサリアム";
    $img_file_name = 'img/deposit-icon/ethereum.png';
    $img_qr_name = 'aaa';
    $address = '3HZYgXp9NnQbuNez89vN3rYDqbQGmrFzuN';
}

if($kind=="rip"){
    $currency_mongon = "リップル";
    $img_file_name = 'img/deposit-icon/bitcash.png';
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

                    <div class="card-body" style="text-align:center;">
                        <img src="{{asset($img_file_name)}}">
                        
                        <p class="card-text" style="text-align:left;">お客様の {{$currency_mongon}} 預入用アドレスです。コピーするか、2次元バーコードをスキャンしてご利用ください。<br>
※送金の際、タグに口座番号を記載して送金してください。</p>

<p>お客様用{{$currency_mongon}}アドレス</p>

<img src="{{$img_qr_name}}" alt="QRコード" />

<p>{{$address}}</p>

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
                <img src="{{asset('img/deposit-icon/blank.png')}}" class="img-fluid" alt="Secure Deposit Methods | Alternative (クレジットカード)" title="Secure Deposit Methods | Alternative (クレジットカード)">
            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <div class="depositLink" href="#" data-category="credit_card" data-objetive="alternative-al">
                <span class="bank">
                    
                </span>																	
                <img src="{{asset('img/deposit-icon/blank.png')}}" class="img-fluid" alt="Secure Deposit Methods | Alternative (クレジットカード)" title="Secure Deposit Methods | Alternative (クレジットカード)">
            </div>
        </div>
    </div>

    <div class="">
        <div class="">
            <div class="depositLink" href="#" data-category="credit_card" data-objetive="alternative-al">
                <span class="bank">
                    
                </span>																	
                <img src="{{asset('img/deposit-icon/blank.png')}}" class="img-fluid" alt="Secure Deposit Methods | Alternative (クレジットカード)" title="Secure Deposit Methods | Alternative (クレジットカード)">
            </div>
        </div>
    </div>
    
</div>