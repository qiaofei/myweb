<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*-- ----------------------------
  ---- 前台页面  BigMan网站 Route 路由
  -- ----------------------------*/

Route::group(['prefix' => '/'], function () {

  Route::get('/', 'Site\IndexController@index');

  Route::get('gameCenter', function () {
    $title = "在线棋牌游戏_棋牌游戏下载_在线德州扑克_私人房斗地主_在线麻将-比格娱乐官方网站";
    $meta_keyword = "在线棋牌游戏_棋牌游戏下载_在线德州扑克_私人房斗地主_在线麻将-比格娱乐官方网站";
    $meta_description = "提供特色棋牌游戏下载，包括比格斗地主之猪队友，比格德州扑克之谁是火枪手，比格牛牛，以及各类地方麻将棋牌游戏下载，丰富多彩的棋牌世界尽在比格棋牌游戏平台。";
    return view('site.index.gameCenter', compact("title", "meta_keyword", "meta_description"));
  });

  Route::get('/service', 'Site\ServerController@index');
  Route::get('/aboutUS', function () {
    $title = "关于我们-比格游戏娱乐网站";
    $meta_keyword = "比格游戏，比格曼游戏，比格棋牌，比格曼棋牌";
    $meta_description = "比格游戏隶属于深圳市亚势力广告与设计顾问有限公司，旗下有多款自主研发的棋牌游戏，包括比格斗地主之猪队友，比格德州扑克之谁是火枪手，以及各类地方麻将棋牌游戏。";
    return view('site.index.aboutUS', compact("title", "meta_keyword", "meta_description"));
  });
  Route::get('/privacyPolicy', function () {
    $title = "隐私政策";
    return view('site.index.privacyPolicy', compact("title"));
  });
  Route::get('/disclaimer', 'Site\DeclareController@disclaimer');
  Route::get('/privacyPolicy', 'Site\DeclareController@privacy');

  Route::any('/service/getData', 'Site\ServerController@getData');
  Route::any('/news/{id?}', 'Site\NewsController@index');
  Route::any('/getNewsData', 'Site\NewsController@getNewsData');
});

//-------------- App 后台接口 --------------//
Route::any('/test', function () {
  return "success";
});

//应用宝接口
Route::get('/testApi', 'Tencent\TencentController@testApi');

Route::any('/tencent/checkLogin', 'Tencent\TencentController@checkAccount');

Route::any('/tencent/pay_callback', 'Tencent\TencentController@wx_pay_callback');


//vivo接口
Route::post('/vivo/checkLogin', 'VivoController@checkAccount');
Route::post('/vivo/get_pay_order', 'VivoController@get_order');
Route::post('/vivo/pay_callback', 'VivoController@pay_callback');

/*-- ----------------------------
  ---- 登陆注册
  -- ----------------------------*/

Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);

/*-- ----------------------------
  ---- 后台管理
  -- ----------------------------*/

Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
  //-------------- CDKEY --------------//
  /*
  Route::any('/','CDKey\CDKeyController@index');
  Route::any('/unused','CDKey\CDKeyController@unused');
  Route::any('/used','CDKey\CDKeyController@used');
  Route::any('/expire','CDKey\CDKeyController@expire');
  Route::resource('cdkey','CDKey\CDKeyController');
  */

  //-------------- BigMna Service --------------//
  Route::any('/', 'Server\IndexController@faq');
  Route::get('/server/faq/createFaq', 'Server\IndexController@createFaq');
  Route::post('/server/faq/storeFaq', 'Server\IndexController@storeFaq');
  Route::get('/server/{id}/editFaq', 'Server\IndexController@editFaq');
  Route::post('/server/faq/{id}/updateFaq', 'Server\IndexController@updateFaq');
  Route::get('/server/{id}/delFaq', 'Server\IndexController@delFaq');
  Route::any('/server/as', 'Server\IndexController@accountSafety');
  Route::get('/server/as/createAS', 'Server\IndexController@createAS');
  Route::post('/server/as/storeAS', 'Server\IndexController@storeAS');
  Route::get('/server/{id}/editAS', 'Server\IndexController@editAS');
  Route::post('/server/as/{id}/updateAS', 'Server\IndexController@updateAS');
  Route::get('/server/{id}/delAS', 'Server\IndexController@delAS');
  Route::get('/server/title/{id}/edit', 'Server\IndexController@edit');
  Route::resource('server/title', 'Server\IndexController');

  Route::get('/declare/disclaimer', 'Server\DeclareController@disclaimer');
  Route::get('/declare/{id}/editDisclaimer', 'Server\DeclareController@editDisclaimer');
  Route::post('/declare/{id}/storeDisclaimer', 'Server\DeclareController@storeDisclaimer');
  Route::get('/declare/privacy', 'Server\DeclareController@privacy');
  Route::get('/declare/{id}/editPrivacy', 'Server\DeclareController@editPrivacy');
  Route::post('/declare/{id}/storePrivacy', 'Server\DeclareController@storePrivacy');

  Route::any('/news/index', 'News\IndexController@index');
  Route::any('/news/{id}/del', 'News\IndexController@del');
  Route::resource('news', 'News\IndexController');

  Route::any('/notice/index', 'News\IndexController@notice');
  Route::any('/notice/createNotice', 'News\IndexController@createNotice');
  Route::post('/notice/storeNotice', 'News\IndexController@storeNotice');
  Route::get('/notice/{id}/editNotice', 'News\IndexController@editNotice');
  Route::post('notice/{id}/updateNotice', 'News\IndexController@updateNotice');
  Route::any('/notice/{id}/delNotice', 'News\IndexController@delNotice');

  //-------------- Setup --------------//
  Route::any('/setup/adminList', 'Setup\AdminController@index');
  Route::any('/setup/adminLog', 'Setup\AdminController@log');

  Route::post('/uploadImage', 'UploadController@uploadImage');

});