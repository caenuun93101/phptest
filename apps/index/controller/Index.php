<?php
namespace app\index\controller;
use think\Db;
use think\Request;

class Index
{
    public function index(Request $request)
    {
  //       $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
		// return ['data'=>$data,'code'=>1,'message'=>'操作完成'];

    	//$result = Db::query('select * from user');
		//dump($result);
		// $list = Db::table('user')
		// 			->field('name')
		// 			->where('id',1)
		// 			->selet();
		// dump($list);
		echo($request->get('name'));
		// echo "hello world";

    }
}

