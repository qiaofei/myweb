<?php

namespace App\Http\Controllers\Admin;

use App\Model\CDKey;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CDKeyController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $shop_list = ["1"=>"礼包1","2"=>"礼包2","3"=>"礼包3","4"=>"礼包4","5"=>"礼包5"];
        $use_state = [1=>"未使用",2=>"已使用",3=>"已过期"];
        $title = "KEY 列表";
        if ($request->method() == 'POST'){
            $input = Input::get();
            dd($input);
        }
        $key_list = CDKey::orderBy('id','DESC')->paginate(100);
        return view("admin.cdkey.index",compact("shop_list","use_state","title","key_list"));
    }

    /**
     * 未使用
     */
    public function unused(){
        $shop_list = ["1"=>"礼包1","2"=>"礼包2","3"=>"礼包3","4"=>"礼包4","5"=>"礼包5"];
        $title = "未使用";
        $key_list = CDKey::where(["use_state"=>1])->orderBy('id','DESC')->paginate(100);
        return view("admin.cdkey.unused",compact("shop_list","title","key_list"));
    }

    /**
     * 已使用
     */
    public function used(){
        $shop_list = ["1"=>"礼包1","2"=>"礼包2","3"=>"礼包3","4"=>"礼包4","5"=>"礼包5"];
        $title = "已使用";
        $key_list = CDKey::where(["use_state"=>2])->orderBy('id','DESC')->paginate(100);
        return view("admin.cdkey.used",compact("shop_list","title","key_list"));
    }

    /**
     * 已过期
     */
    public function expire(){
        $shop_list = ["1"=>"礼包1","2"=>"礼包2","3"=>"礼包3","4"=>"礼包4","5"=>"礼包5"];
        $title = "已过期";
        $key_list = CDKey::where(["use_state"=>3])->orderBy('id','DESC')->paginate(100);
        return view("admin.cdkey.expire",compact("shop_list","title","key_list"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop_list = ["1"=>"礼包1","2"=>"礼包2","3"=>"礼包3","4"=>"礼包4","5"=>"礼包5"];
        return view("admin.cdkey.create",compact("shop_list"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::get();
        $serial_result = CDKey::createKey(trim($input['key_row']));
        $shop_id = $input['shop'];
        $start = trim($input['start_time']);
        $expire = trim($input['expire_time']);
        if (empty($expire) || empty($expire)){
            return Redirect::back()->withInput()->withErrors('请正确输入“开始有效时间”和“结束有效时间”');
        }
        $start_time = strtotime($start);
        $expire_time = strtotime(trim($expire." 23:59:59"));
        foreach ($serial_result as $key=>$serial){
            CDKey::create(['serial'=>$serial,'shop_id'=>$shop_id,'start_time'=>$start_time,'expire_time'=>$expire_time,'use_state'=>1]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
