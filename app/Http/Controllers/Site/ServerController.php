<?php

namespace App\Http\Controllers\Site;

use App\Model\AccountSafety;
use App\Model\FAQ;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "比格游戏客服中心-比格娱乐官方网站";
        $title_pairs = DB::table('b_question_title')->getPairsData('id','title');
        $faq_title_id = FAQ::groupBy('title_id')->get();
        $as_title_id = AccountSafety::groupBy('title_id')->get();
        $question1 = AccountSafety::select(['title_id','question','answer'])->get();
        $question2 = FAQ::select(['title_id','question','answer'])->get();
        $meta_keyword = "比格游戏客服中心，游戏指南";
        $meta_description = "比格游戏客服中心提供有新手玩家指南,游戏中常见问题以及建议提交等。如仍解决不了您的问题可直接联系在线客服或拨打客服热线!";
        return view('site.index.service',compact("title","as_title_id","faq_title_id","title_pairs","meta_keyword","meta_description","question1","question2"));
    }

    public function getData(){
        $str_id = Input::get('str_id');
        $title_pairs = DB::table('b_question_title')->getPairsData('id','title');
        $result = [];
        if (substr($str_id,0,2) == 'as'){  //账号与安全
            $title_id = substr($str_id,3);
            $result['title'] = $title_pairs[$title_id];
            $result['list'] = AccountSafety::select(['question','answer'])->where(['title_id'=>$title_id])->get();
        }else{
            $title_id = substr($str_id,3);
            $result['title'] = $title_pairs[$title_id];
            $result['list'] = FAQ::select(['question','answer'])->where(['title_id'=>$title_id])->get();
        }
        return json_encode($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

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
