<?php
namespace app\index\controller;
use think\Db;
use think\Request;

class User
{
    public function index()
    {
        $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
		return ['code'=>0,'result'=>'error'];
    }

    public function login(Request $request)
    {
        echo($request->get('name'));
    	// $data = ['name'=>'crow','sex'=>'男'];
    	// return ['code'=>1,'result'=>$data];
    }
}
