<?php

namespace App\Http\Controllers\Admin\News;

use App\Model\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "新闻";
        $news_title = Input::get('news_title');
        if ($news_title){
            $sql = "type = 1 AND title LIKE '%{$news_title}%'";
            $news_list = News::whereRaw($sql)->orderBy('create_time','DESC')->paginate(100);
        }else{
            $news_list = News::where(['type'=>1])->orderBy('create_time','DESC')->paginate(100);
        }
        return view("admin.news.index",compact("title","news_list","news_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "新闻";
        return view("admin.news.create",compact("title"));
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
        $title = $input['title'];
        $content = $input['content'];
        $create_time = strtotime($input['create_time']);

        if (empty($title)){
            return Redirect::back()->withInput()->withErrors('请输入新闻标题');
        }
        if (empty($content)){
            return Redirect::back()->withInput()->withErrors('请输入新闻内容');
        }
        News::create(['type'=>1,'title'=>$title,'content'=>$content,'create_time'=>$create_time]);
        return redirect('admin/news/index')->with('message', '成功发布！');
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
        $title = "新闻";
        $news_info = News::findOrFail($id);
        return view("admin.news.edit",compact("news_info","title"));
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
        $input = Input::get();
        $title = $input['title'];
        $content = $input['content'];
        $create_time = strtotime($input['create_time']);
        if (empty($title)){
            return Redirect::back()->withInput()->withErrors('请输入新闻标题');
        }
        if (empty($content)){
            return Redirect::back()->withInput()->withErrors('请输入新闻内容');
        }
        $news_info = News::findOrFail($id);
        $news_info->update(['title'=>$title,'content'=>$content,'create_time'=>$create_time]);
        return redirect('admin/news')->with('message', '成功发布！');
    }

    public function del($id){
        News::where('id', $id)->forceDelete();
        $result['code'] = 10000;
        return json_encode($result);
    }

    public function notice(){
        $title = "公告";
        $notice_title = Input::get('notice_title');
        if ($notice_title){
            $sql = "type = 2 AND title LIKE '%{$notice_title}%'";
            $notice_list = News::whereRaw($sql)->orderBy('create_time','DESC')->paginate(100);
        }else{
            $notice_list = News::where(['type'=>2])->orderBy('create_time','DESC')->paginate(100);
        }
        return view("admin.news.notice",compact("title","notice_list","notice_title"));
    }

    public function createNotice(){
        $title = "公告";
        return view("admin.news.createNotice",compact("title"));
    }

    public function storeNotice(){
        $input = Input::get();
        $title = $input['title'];
        $content = $input['content'];
        $create_time = strtotime($input['create_time']);
        if (empty($title)){
            return Redirect::back()->withInput()->withErrors('请输入新闻标题');
        }
        if (empty($content)){
            return Redirect::back()->withInput()->withErrors('请输入新闻内容');
        }
        News::create(['type'=>2,'title'=>$title,'content'=>$content,'create_time'=>$create_time]);
        return redirect('admin/notice/index')->with('message', '成功发布！');
    }

    public function editNotice($id){
        $title = "公告";
        $notice_info = News::findOrFail($id);
        return view("admin.news.editNotice",compact("notice_info","title"));
    }

    public function updateNotice($id){
        $input = Input::get();
        $title = $input['title'];
        $content = $input['content'];
        $create_time = strtotime($input['create_time']);
        if (empty($title)){
            return Redirect::back()->withInput()->withErrors('请输入新闻标题');
        }
        if (empty($content)){
            return Redirect::back()->withInput()->withErrors('请输入新闻内容');
        }
        $notice_info = News::findOrFail($id);
        $notice_info->update(['title'=>$title,'content'=>$content,'create_time'=>$create_time]);
        return redirect('admin/notice/index')->with('message', '成功发布！');
    }

    public function delNotice($id){
        News::where('id', $id)->forceDelete();
        $result['code'] = 10000;
        return json_encode($result);
    }
}
