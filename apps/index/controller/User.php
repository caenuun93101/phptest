<?php
namespace app\index\controller;
use think\Db;
use think\Request;

class User
{
    public function index()
    {
        //$data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
		//return ['code'=>0,'result'=>'error'];
        echo "1";
    }

    public function getCode(Request $request)
    {
        $phoneNumber = $request->get('phoneNumber');
        $g = "/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/"; 
        if(preg_match($g,$phoneNumber))
        {
            return ['code'=>1, 'result'=>'手机号正确'];
        }else
        {
            return ['code'=>0, 'result'=>'手机号错误'];
        }
    }

    public function register(Request $request)
    {
        //echo($request->get('phone'));
        $phoneNumber = $request->get('phoneNumber');
        $phoneCode = $request->get('phoneCode');
        if (strcmp($phoneCode, '1234')) {
            return ['code'=>0, 'result'=>'验证码错误'];
        }else
        {
            return ['code'=>1, 'result'=>'注册成功'];
        }
    }

    public function login(Request $request)
    {
        echo($request->get('name'));
        
    	// $data = ['name'=>'crow','sex'=>'男'];
    	// return ['code'=>1,'result'=>$data];
    }
}
