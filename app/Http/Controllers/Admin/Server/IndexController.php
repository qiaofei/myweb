<?php

namespace App\Http\Controllers\Admin\Server;

use App\Model\AccountSafety;
use App\Model\FAQ;
use App\Model\QuestionTitle;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function faq(){
        $title = "游戏常见问题";
        $title_id = Input::get('title_id');
        $question = Input::get('question');
        if ($title_id || $question){
            $where = [];
            empty($title_id)?"":array_push($where,"title_id = '{$title_id}'");
            empty($question)?"":array_push($where,"question LIKE '%{$question}%'");
            $sql = implode(" AND ",$where);

            $faq_list = FAQ::whereRaw($sql)->orderBy('id','DESC')->paginate(100);
        }else{
            $faq_list = FAQ::orderBy('id','ASC')->paginate(100);
        }
        $title_list = DB::table('b_question_title')->getPairsData('id','title');

        return view("admin.server.faq",compact("title","faq_list","title_list","title_id","question"));
    }

    public function createFaq(){
        $title_list = DB::table('b_question_title')->getPairsData('id','title');
        return view("admin.server.createFaq",compact("title_list"));
    }

    public function storeFaq(){
        $input = Input::get();
        if ($input['title_id']){
            $title_id = $input['title_id'];
        }else{
            return Redirect::back()->withInput()->withErrors('请选择标题归属');
        }

        $question = $input['question'];
        if ($input['question']){
            $answer = $input['answer'];
        }else{
            return Redirect::back()->withInput()->withErrors('请输入答案');
        }
        FAQ::create(['title_id'=>$title_id,'question'=>$question,'answer'=>$answer,'create_time'=>time()]);
        return "<script> parent.layer.msg('新增成功');parent.location.reload();parent.layer.close(parent.layer.getFrameIndex(window.name));</script>";
    }

    public function editFaq($id){
        $title_list = DB::table('b_question_title')->getPairsData('id','title');
        $faq_info = FAQ::findOrFail($id);
        return view("admin.server.editFaq",compact("title_list","faq_info"));
    }

    public function updateFaq($id){
        $faq_info = FAQ::findOrFail($id);
        $input = Input::get();
        if ($input['title_id']){
            $title_id = $input['title_id'];
        }else{
            return Redirect::back()->withInput()->withErrors('请选择标题归属');
        }

        $question = $input['question'];
        if ($input['question']){
            $answer = $input['answer'];
        }else{
            return Redirect::back()->withInput()->withErrors('请输入答案');
        }
        $update = $faq_info->update(['title_id'=>$title_id,'question'=>$question,'answer'=>$answer]);
        return empty($update)?"更新失败":"<script> parent.layer.msg('更新成功');parent.location.reload();parent.layer.close(parent.layer.getFrameIndex(window.name));</script>";
    }

    public function delFaq($id){
        FAQ::where('id', $id)->forceDelete();
        $result['code'] = 10000;
        return json_encode($result);
    }

    public function accountSafety(){
        $title = "账户与安全";
        $title_id = Input::get('title_id');
        $question = Input::get('question');
        if ($title_id || $question){
            $where = [];
            empty($title_id)?"":array_push($where,"title_id = '{$title_id}'");
            empty($question)?"":array_push($where,"question LIKE '%{$question}%'");
            $sql = implode(" AND ",$where);

            $as_list = AccountSafety::whereRaw($sql)->orderBy('id','DESC')->paginate(100);
        }else{
            $as_list = AccountSafety::orderBy('id','ASC')->paginate(100);
        }
        $title_list = DB::table('b_question_title')->getPairsData('id','title');

        return view("admin.server.as",compact("title","as_list","title_list","title_id","question"));
    }

    public function createAS(){
        $title_list = DB::table('b_question_title')->getPairsData('id','title');
        return view("admin.server.createAs",compact("title_list"));
    }

    public function storeAS(){
        $input = Input::get();
        if ($input['title_id']){
            $title_id = $input['title_id'];
        }else{
            return Redirect::back()->withInput()->withErrors('请选择标题归属');
        }

        $question = $input['question'];
        if ($input['question']){
            $answer = $input['answer'];
        }else{
            return Redirect::back()->withInput()->withErrors('请输入答案');
        }
        AccountSafety::create(['title_id'=>$title_id,'question'=>$question,'answer'=>$answer,'create_time'=>time()]);
        return "<script> parent.layer.msg('新增成功');parent.location.reload();parent.layer.close(parent.layer.getFrameIndex(window.name));</script>";
    }

    public function editAS($id){
        $title_list = DB::table('b_question_title')->getPairsData('id','title');
        $as_info = AccountSafety::findOrFail($id);
        return view("admin.server.editAS",compact("title_list","as_info"));
    }

    public function updateAS($id){
        $as_info = AccountSafety::findOrFail($id);
        $input = Input::get();
        if ($input['title_id']){
            $title_id = $input['title_id'];
        }else{
            return Redirect::back()->withInput()->withErrors('请选择标题归属');
        }

        $question = $input['question'];
        if ($input['question']){
            $answer = $input['answer'];
        }else{
            return Redirect::back()->withInput()->withErrors('请输入答案');
        }
        $update = $as_info->update(['title_id'=>$title_id,'question'=>$question,'answer'=>$answer]);
        return empty($update)?"更新失败":"<script> parent.layer.msg('更新成功');parent.location.reload();parent.layer.close(parent.layer.getFrameIndex(window.name));</script>";
    }

    public function delAS($id){
        AccountSafety::where('id', $id)->forceDelete();
        $result['code'] = 10000;
        return json_encode($result);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "归属问题";
        $title_list = QuestionTitle::orderBy('id','ASC')->paginate(100);
        return view("admin.server.title",compact("title","title_list"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.server.createTitle");
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
        if (empty($input['title'])){
            return Redirect::back()->withInput()->withErrors('请输入问题标题');
        }
        QuestionTitle::create(['title'=>$input['title']]);
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
        $title_info = QuestionTitle::findOrFail($id);
        return view("admin.server.editTitle",compact("title_info"));
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
        $title_info = QuestionTitle::findOrFail($id);
        $update = $title_info->update(['title'=>Input::get('title')]);
        return empty($update)?"更新失败":"<script> parent.layer.msg('更新成功');parent.location.reload();parent.layer.close(parent.layer.getFrameIndex(window.name));</script>";
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
