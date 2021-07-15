<div style="text-align:center;">
    <h1>暗号通貨入金</h1><br>
    <h2>下記口座にお振り込みをお願いいたします</h2><br>
    反映までの時間: 着金確認即時　　手数料: ５％<br>
</div>

<div>
    <div class="green_back_box wide_padding_box">
        専用入金固定アドレス
    </div>
    <div>
        @foreach($depositCryptCurrencyInfo as $thisCurrencyInfo)
        <div class="pad_vertical">
            <img src="{{$thisCurrencyInfo->img}}" /><br>
            <div class="col-sm-11 col-xs-10 pad0">
                <input type="text" value="{{$thisCurrencyInfo->address}}" class="small_text_box" readonly />
            </div>

            <div class="col-sm-1 col-xs-2 pad0">
                <div class="green_back_box small_text_box clipboard_copy_btn" />
                    Copy
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div style="text-align:left;">
◇金融商品取引は高リスクを伴う為、損失に耐えうる資金投資をして下さい<br>
◇場合により口座への入金反映が通常より遅れる場合がございます<br>
◇当社が取扱わない通貨、トークン等を誤ってお預入された場合、原則として返還対応いたしかねます。返還が可能な場合においても、<br>
　それに係る手数料等をお支払いただくことがあります。<br>
◇ご入金には手数料（2.5%）が発生致します。<br>
◇外国為替相場については、三菱UFJ銀行（TTS AM11:00）のレートを適応しております。<br>
</div>



<script>

/**
 * クリップボードコピー関数
 * 入力値をクリップボードへコピーする
 * [引数]   textVal: 入力値
 * [返却値] true: 成功　false: 失敗
 */
function copyTextToClipboard(textVal){
  // テキストエリアを用意する
  var copyFrom = document.createElement("textarea");
  // テキストエリアへ値をセット
  copyFrom.textContent = textVal;
 
  // bodyタグの要素を取得
  var bodyElm = document.getElementsByTagName("body")[0];
  // 子要素にテキストエリアを配置
  bodyElm.appendChild(copyFrom);
 
  // テキストエリアの値を選択
  copyFrom.select();
  // コピーコマンド発行
  var retVal = document.execCommand('copy');
  // 追加テキストエリアを削除
  bodyElm.removeChild(copyFrom);
  // 処理結果を返却
  return retVal;
}

$(function () {
    $(".clipboard_copy_btn")
    .click(function () {
        let btn = $(this);
        let content = btn.parent().parent().find("input").val();
        console.log(content);

        copyTextToClipboard(content);

        alert("コピーしました。")
        
    });
});
    
/*
var textarea = document.getElementsByTagName("textarea")[0];
// 文字をすべて選択
textarea.select();
// コピー
document.execCommand("copy");
*/
</script>