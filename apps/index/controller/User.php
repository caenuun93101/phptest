<?php
namespace app\index\controller;
use think\Db;
use think\Request; 
use app\index\model\User as UserModel;

class User
{
    public function index()
    {
        //$data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
		//return ['code'=>0,'result'=>'error'];
        //echo "2";
        // $user = new UserModel;
        // $user->phonenum = '11111';
        // $user->save();
        // if ($user->save()) {
        //     return '用户[ ' . $user->phonenum . ':' . $user->id . ' ]新增成功';
        // } else {
        //     return $user->getError();
        // }
        // $result = Db::query('select * from zzl_user');
        // dump($result);
        $user = UserModel::get(['phonenum'=>'123']);
        dump($user);
    }

    public function getCode(Request $request)
    {
        $phoneNumber = $request->get('phoneNum');
        $g = "/13[12356789]{1}\d{8}|15[1235689]\d{8}|188\d{8}/"; 
        if(preg_match($g,$phoneNumber))
        {
            $user = UserModel::get(['phonenum'=>$phoneNumber]);
            if ($user == NULL) {
               return ['code'=>1, 'result'=>'123'];
            }
            else
            {
                return ['code'=>0, 'result'=>'手机号码已存在'];
            }
            
        }else
        {
            return ['code'=>0, 'result'=>'error'];
        }
    }

    public function checkCode(Request $request)
    {
        $phoneCode = $request->get('phoneCode');
        if (strcmp($phoneCode, '1234')) {
            return ['code'=>0, 'result'=>'验证码错误'];
        }else
        {
            return ['code'=>1, 'result'=>'ok'];
        }
    }

    public function register(Request $request)
    {
        $phoneNumber = $request->get('phoneNum');
        $password = $request->get('password');
        $user = new UserModel;
        $user->phonenum = $phoneNumber;
        $user->password = $password;
        $user->username = 'U'.$phoneNumber;
        $user->save();
        
    }

    public function login(Request $request)
    {
        echo($request->get('name'));
        
    	// $data = ['name'=>'crow','sex'=>'男'];
    	// return ['code'=>1,'result'=>$data];
    }
}
