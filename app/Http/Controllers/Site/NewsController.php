<?php

namespace App\Http\Controllers\Site;

use App\Model\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{

    public function index($id = null)
    {
        $title = "比格游戏新闻中心-比格娱乐官方网站";
        $meta_keyword = "比格游戏新闻,比格公告,游戏公告";
        $meta_description = "比格游戏新闻公告,汇聚了比格游戏相关新闻动态,最新游戏公告,方便玩家快速获取最新游戏动态!";
        $type_list = DB::table('b_news_type')->getPairsData('id','descr');
        $keyword = Input::get('news_keyword');
        $title_list = News::select('id','type','title')->orderBy("id","DESC")->get();
        if ($keyword){
            $news_info = News::whereRaw("title LIKE '%{$keyword}%' OR content LIKE '%{$keyword}%'")->first();
            if (empty($news_info)){
                return Redirect::back()->withInput()->withErrors('无记录');
            }else{
                $content = $news_info['content'];
                $page_num = substr_count($content,'<NEXTPAGE>')+1;
                $page_content = explode('<NEXTPAGE>',$content);
            }
        }else{
            if ($id){
                $news_info = News::findOrFail($id);
                $content = $news_info['content'];
                $page_num = substr_count($content,'<NEXTPAGE>')+1;
                $page_content = explode('<NEXTPAGE>',$content);
            }else{
                $news_info = News::whereRaw("create_time = (SELECT max(create_time) FROM b_news)")->first();
                $content = $news_info['content'];
                $page_num = substr_count($content,'<NEXTPAGE>')+1;
                $page_content = explode('<NEXTPAGE>',$content);
            }
        }

        return view('site.index.news',compact("title","news_info","title_list","type_list","page_num","page_content","meta_keyword","meta_description"));
    }

    public function getNewsData(){
        $result = [];
        $index = Input::get('index');
        $news_id = Input::get('id');
        $news_info = News::findOrFail($news_id);
        $page_content = explode('<NEXTPAGE>',$news_info->content);
        $result['content'] = $page_content[$index];
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
