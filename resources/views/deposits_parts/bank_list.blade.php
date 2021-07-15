<div class="row">

    <div class="col-12">
        <div class="card mb-3 mx-auto border-0" style="max-width: 500px;">
            <div class="row no-gutters">
                <div class="col-md-4 p-3 text-center">																	
                    
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">銀行送金</h5>
                        <p class="card-text"><small>反映までの時間:</small>１～３営業日</p>
                        <p class="card-text"><small class="text-primary">手数料: お客様負担</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-sm-6 col-md-4 mt-4 depositMethodPanel">
        <div class="depositPanel btn btn-outline-light bg-white">
            <a class="depositLink" href="{{route('deposit')}}?type=banks&kind=ikeda" data-category="credit_card" data-objetive="alternative">
                <span class="bank">
                ご入金する
                </span>																	
                <img src="{{asset('img/deposit-icon/ikedasensyu.png')}}" class="img-fluid" alt="Secure Deposit Methods | Alternative (クレジットカード)" title="Secure Deposit Methods | Alternative (クレジットカード)">
            </a>
        </div>
        <ul class="list-group list-group-horizontal-sm currencies bg-dark p-2 rounded-bottom text-light currenciesDepositCabinet flex-row">
            <li class="list-group-item p-1 border-0 USD">USD</li>
            <li class="list-group-item p-1 border-0 EUR">EUR</li>
            <li class="list-group-item p-1 border-0 CAD">CAD</li>
            <li class="list-group-item p-1 border-0 GBP">GBP</li>
            <li class="list-group-item p-1 border-0 RUB">RUB</li>                                                         
        </ul>
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