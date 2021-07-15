<?php

use Illuminate\Support\Facades\Route;
use  Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/local/{locale}', 'LangController@index');

Route::get('/', 'TopController@index')->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/top', 'TopController@index')->name('top');
Route::get('/btcasset', 'TopController@BtcAssetManagement')->name('btcasset');
Route::get('/btcasset2', 'TopController@BtcAssetManagement2')->name('btcasset2');
Route::get('/inquiry', 'InquiryController@index')->name('inquiry');
Route::post('/inquiry-confirm', 'InquiryController@confirm')->name('inquiry-confirm');

Route::get('/account', 'AccountsController@index')->name('account');
Route::get('/account/001af', 'AccountsController@index001af')->name('account-001af');

Route::get('/demo', 'DemoAccountsController@index')->name('demo');
Route::post('/demo-confirm', 'DemoAccountsController@confirm')->name('demo-confirm');

Route::get('/individual', 'IndividualAccountsController@index')->name('individual');
Route::get('/individual-testcode', 'IndividualAccountsController@testcode')->name('individual-testcode');
Route::post('/individual-confirm', 'IndividualAccountsController@confirm')->name('individual-confirm');
Route::get('/thanks', 'IndividualAccountsController@thanks')->name('thanks');

Route::get('/corporate', 'CorporateAccountsController@index')->name('corporate');
Route::post('/corporate-confirm', 'CorporateAccountsController@confirm')->name('corporate-confirm');
Route::get('/corporate-testcode', 'CorporateAccountsController@testcode')->name('corporate-testcode');

Route::get('/mt4login', 'Mt4LoginController@index')->name('mt4login');
Route::post('/mt4login-confirm', 'Mt4LoginController@postIndex')->name('mt4login-confirm');
Route::get('/password-reset', 'Mt4LoginController@passwordReset')->name('password-reset');

// 
Route::get('/my-page', 'MyPageController@index')->name('my-page');
Route::get('/my-history', 'MyPageController@history');
Route::get('/my-deposit', 'MyPageController@deposit');
Route::get('/my-transfer', 'MyPageController@transfer');
Route::get('/my-additional', 'MyPageController@additional');
Route::get('/my-setting', 'MyPageController@setting')->name('setting2');
Route::get('/my-setting/two', 'MyPageController@setting1')->name('setting1');
Route::get('/my-setting/mam', 'MyPageController@setting_mam')->name('setting_mam');
Route::get('/my-setting/mam/success', 'MyPageController@mam_success')->name('mam.success');

Route::get('/my-deposit/credit', 'MyPageController@depositCredit');
Route::get('/my-deposit/cryptocurrency', 'MyPageController@depositCryptocurrency');
Route::get('/my-deposit/withdrawal', 'MyPageController@depositWithdrawal')->name('depositWithdrawal');

Route::get('/my-deposit/withdrawal/credit', 'MyPageController@depositWithdrawalViaCredit');

Route::get('/my-page/aff_partner', 'MyPageController@aff_partner')->name('aff_partner');
Route::get('/my-page/aff_spec_partner', 'MyPageController@aff_spec_partner')->name('aff_spec_partner');
Route::get('/my-page/aff_success', 'MyPageController@aff_success')->name('aff_success');
Route::get('/my-page/aff_spec_success', 'MyPageController@aff_spec_success')->name('aff_spec_success');

// 

Route::post('/fa2-confirm', 'Mt4LoginController@fa2Confirm')->name('fa2-confirm');
Route::get('/mt4logout', 'Mt4LoginController@logout')->name('mt4logout');

Route::get('/funding', 'FundController@index')->name('funding');
Route::post('/funding-thanks', 'FundController@confirm')->name('funding-thanks');

Route::get('/terms', 'TermsController@TermsAndCondition')->name('terms');
Route::get('/faq', 'TermsController@Faq')->name('faq');
Route::get('/privacy', 'TermsController@Privacy')->name('privacy');
Route::get('/risk', 'TermsController@Risk')->name('risk');
Route::get('/esignature', 'TermsController@ESignature')->name('esignature');
Route::get('/aboutcompany', 'TermsController@Aboutcompany')->name('aboutcompany');


Route::get('/summary', 'PersonalPageController@Summary')->name('summary');
Route::get('/history', 'PersonalPageController@History')->name('history');
Route::get('/deposit', 'PersonalPageController@DepositsAndWithdrawals')->name('deposit');
// Route::get('/setting', 'PersonalPageController@Setting')->name('setting');
Route::get('/transfer', 'PersonalPageController@Transfer')->name('transfer');
Route::get('/addaccount', 'PersonalPageController@AddAccount')->name('addaccount');
Route::post('/addaccount-register', 'PersonalPageController@AddAccountRegister')->name('addaccount-register');
Route::post('/two-factor-authenticate', 'PersonalPageController@twoFactorAuthenticate')->name('two-factor-authenticate');
Route::post('/switchTwoFactorAuthenticate', 'MyPageController@switchTwoFactorAuthenticate')->name('switchTwoFactorAuthenticate');

Route::post('/add-bank', 'MyPageController@AddBank')->name('add-bank');
Route::post('/withdrawal-application', 'PersonalPageController@WithdrawalApplication')->name('withdrawal-application');
Route::post('/withdrawal-application', 'MyPageController@WithdrawalApplication')->name('withdrawal-application2');
Route::post('/deposit-application', 'PersonalPageController@DepositApplication')->name('deposit-application');

Route::get('/mam=consent', 'PersonalPageController@MamConsent')->name('mam=consent');

Route::post('/mam-consent-confirm', 'PersonalPageController@MamConsentConfirm')->name('mam-consent-confirm');

/** バッチ処理用 */
Route::get('sample/activate_account', 'SampleController@activateAccount');
Route::get('sample/manual_activate_account', 'SampleController@manualActivateAccount');
Route::get('sample/passivate_account', 'SampleController@passivateAccount');

/** csvダウンロード機能のサンプルコード */
Route::get('sample/download1', 'SampleController@download1');
Route::post('sample/download2', 'SampleController@download2');

/** API確認用のルーティング */
Route::get('sample/api/closedOrders', 'SampleController@closedOrders');
Route::get('sample/api/usersWithEquity', 'SampleController@usersWithEquity');
Route::get('sample/api/createRealUser', 'SampleController@createRealUser');
Route::get('/affiliate', 'AffiliateController@index')->name('affiliate');
Route::get('/affiliate2', 'AffiliateController@index2')->name('affiliate2');
Route::post('/affiliatethanks', 'AffiliateController@thanks')->name('affiliatethanks');
Route::get('/affiliate2-register', 'AffiliateController@index2RegisterForm')->name('affiliate2-register');
Route::post('/affiliatethanks2', 'AffiliateController@thanks2')->name('affiliatethanks2');

/*テスト用 */
Route::get('/individual-confirm', 'IndividualAccountsController@ThankyouPageTest')->name('individual-confirm2');
Route::get('/demo-confirm', 'DemoAccountsController@confirm')->name('demo-confirm2');

Route::get('/hash', 'HashController@index')->name('hash');
Route::get('/judge', 'HashController@judge')->name('judge');

Route::get('sample/sync_password', 'SampleController@syncPassword');

Route::get('sample/register_loginuser_as_tier5', 'AffiliateController@registerLoginUserAsAffiliateUser');

Route::post('/transfer-confirm', 'PersonalPageController@TransferConfirm')->name('transfer-confirm');
Route::post('/setting-confirm', 'PersonalPageController@SettingConfirm')->name('setting-confirm');

Route::get('sample-thanks', 'SampleController@thanks');


Route::get('mt4api/users_with_equity', 'Mt4APITestController@usersWithEquity');
