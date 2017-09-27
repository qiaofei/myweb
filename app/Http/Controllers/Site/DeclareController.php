<?php

namespace App\Http\Controllers\Site;

use App\Model\SomeDeclare;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DeclareController extends Controller
{
    public function disclaimer(){
        $info = SomeDeclare::findOrFail(1);
        $title = $info->title;
        return view("site.index.privacyPolicy",compact("info","title"));
    }

    public function privacy(){
        $info = SomeDeclare::findOrFail(2);
        $title = $info->title;
        return view("site.index.privacyPolicy",compact("info","title"));
    }
}
