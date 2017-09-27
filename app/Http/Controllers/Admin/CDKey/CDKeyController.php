<?php

namespace App\Http\Controllers\Admin\CDKey;

use Illuminate\Http\Request;
use App\Model\AdminLog;
use App\Model\CDKey;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CDKeyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $shop_list = ["1"=>"礼包1","2"=>"礼包2","3"=>"礼包3","4"=>"礼包4","5"=>"礼包5"];
        $use_state = [1=>"未使用",2=>"已使用",3=>"已过期"];
        $title = "KEY 列表";
        $serial = Input::get("serial");   //序列号
        $ids = Input::get("ids");         //ID咧
        if ($serial || $ids){
            $where = [];
            empty($serial)?"":array_push($where,"serial = '{$serial}'");
            empty($ids)?"":array_push($where,"id IN ({$ids})");
            $sql = implode(" AND ",$where);

            $key_list = CDKey::whereRaw($sql)->orderBy('id','DESC')->paginate(100);
        }else{
            $key_list = CDKey::orderBy('id','DESC')->paginate(100);
        }
        return view("admin.cdkey.index",compact("shop_list","use_state","title","key_list", "serial", "ids"));
    }

    /**
     * 未使用
     */
    public function unused(){
        $shop_list = ["1"=>"礼包1","2"=>"礼包2","3"=>"礼包3","4"=>"礼包4","5"=>"礼包5"];
        $title = "未使用";
        $serial = Input::get("serial");   //序列号
        if ($serial){
            $key_list = CDKey::where(["serial"=>$serial,"use_state"=>1])->orderBy('id','DESC')->paginate(100);
        }else{
            $key_list = CDKey::where(["use_state"=>1])->orderBy('id','DESC')->paginate(100);
        }
        return view("admin.cdkey.unused",compact("shop_list","title","key_list","serial"));
    }

    /**
     * 已使用
     */
    public function used(){
        $shop_list = ["1"=>"礼包1","2"=>"礼包2","3"=>"礼包3","4"=>"礼包4","5"=>"礼包5"];
        $title = "已使用";
        $serial = Input::get("serial");   //序列号
        if ($serial){
            $key_list = CDKey::where(["serial"=>$serial,"use_state"=>2])->orderBy('id','DESC')->paginate(100);
        }else{
            $key_list = CDKey::where(["use_state"=>2])->orderBy('id','DESC')->paginate(100);
        }
        return view("admin.cdkey.used",compact("shop_list","title","key_list","serial"));
    }

    /**
     * 已过期
     */
    public function expire(){
        $shop_list = ["1"=>"礼包1","2"=>"礼包2","3"=>"礼包3","4"=>"礼包4","5"=>"礼包5"];
        $title = "已过期";
        $serial = Input::get("serial");   //序列号
        if ($serial){
            $key_list = CDKey::where(["serial"=>$serial,"use_state"=>3])->orderBy('id','DESC')->paginate(100);
        }else{
            $key_list = CDKey::where(["use_state"=>3])->orderBy('id','DESC')->paginate(100);
        }
        return view("admin.cdkey.expire",compact("shop_list","title","key_list","serial"));
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
        $id = "";
        foreach ($serial_result as $key=>$serial){
            $result = CDKey::create(['serial'=>$serial,'shop_id'=>$shop_id,'start_time'=>$start_time,'expire_time'=>$expire_time,'use_state'=>1]);
            $id .= $result['id'].",";
        }
        $ids = substr($id,0,-1);
        $admin_log = ["admin_id"=>Auth::user()->id,"admin_name"=>Auth::user()->name,"operation"=>"新增CDKEY，记录ID为[".$ids."]","time"=>time()];
        AdminLog::create($admin_log);
        return "<script> parent.layer.msg('新增成功');parent.location.reload();parent.layer.close(parent.layer.getFrameIndex(window.name));</script>";

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
