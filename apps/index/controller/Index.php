<?php
namespace app\index\controller;
use think\Db;
use think\Request;

class Index
{
    public function index(Request $request)
    {
		 return ['message'=>'hello world'];

    	//$result = Db::query('select * from user');
		//dump($result);
		// $list = Db::table('user')
		// 			->field('name')
		// 			->where('id',1)
		// 			->selet();
		// dump($list);
		//echo($request->get('name'));
		// echo "hello world";

    }
}

