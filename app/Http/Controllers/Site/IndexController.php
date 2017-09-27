<?php

namespace App\Http\Controllers\Site;

use App\Model\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "比格棋牌-比格娱乐官方网站";
        $news_list = News::select('id','title','create_time')->where(['type'=>1])->orderBy("create_time","DESC")->take(5)->get();
        $notice_list = News::select('id','title','create_time')->where(['type'=>2])->orderBy("create_time","DESC")->take(5)->get();
        $meta_keyword = "斗地主游戏，麻将游戏，棋牌游戏平台，在线棋牌游戏，比格游戏，比格曼游戏";
        $meta_description = "比格娱乐是全民娱乐的专业棋牌在线平台，提供斗地主，麻将，牛牛，德州扑克，象棋等各类棋牌游戏，同时还有捕鱼,桌球,贪吃蛇等休闲游戏。比格棋牌游戏平台旨在为玩家创造出不一样的棋牌游戏体验。";
        return view("site.index.index",compact("title","news_list","notice_list","meta_keyword","meta_description"));
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
