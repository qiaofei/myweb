<?php

namespace App\Http\Controllers\Admin\Server;

use App\Model\SomeDeclare;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class DeclareController extends Controller
{

    public function disclaimer(){
        $disclaimer_info = SomeDeclare::findOrFail(1);
        return view("admin.server.disclaimer",compact("title","disclaimer_info"));
    }

    public function editDisclaimer($id){
        $disclaimer_info = SomeDeclare::findOrFail($id);
        return view("admin.server.editDisclaimer",compact("title","disclaimer_info"));
    }

    public function storeDisclaimer($id){
        dd(Input::get('content'));
        $disclaimer_info = SomeDeclare::findOrFail($id);
        $disclaimer_info->update(['content'=>Input::get('content')]);
        return redirect('/admin/declare/disclaimer');
    }

    public function privacy(){
        $privacy_info = SomeDeclare::findOrFail(2);
        return view("admin.server.privacy",compact("title","privacy_info"));
    }

    public function editPrivacy($id){
        $privacy_info = SomeDeclare::findOrFail($id);
        return view("admin.server.editPrivacy",compact("title","privacy_info"));
    }

    public function storePrivacy($id){
        dd(Input::get('content'));
        $disclaimer_info = SomeDeclare::findOrFail($id);
        $disclaimer_info->update(['content'=>Input::get('content')]);
        return redirect('/admin/declare/privacy');
    }

}
