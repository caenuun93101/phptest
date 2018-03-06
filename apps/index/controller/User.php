<?php
namespace app\index\controller;

class User
{
    public function index()
    {
        $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
		return ['code'=>0,'result'=>'error'];
    }

    public function login()
    {
    	$data = ['name'=>'crow','sex'=>'男'];
    	return ['code'=>1,'result'=>$data];
    }
}
