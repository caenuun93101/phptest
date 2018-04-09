<?php
namespace app\index\controller;
use think\Db;
use think\Request; 
use app\index\model\User as UserModel;

class User
{
    public function index()
    {

        echo "11111";
    }

    public function getCode(Request $request)
    {
        $phoneNumber = $request->get('phonenum');
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
        $phoneNumber = $request->get('phonenum');
        $password = $request->get('password');
        $user = new UserModel;
        $user->phonenum = $phoneNumber;
        $user->password = $password;
        $user->username = 'U'.$phoneNumber;
        if ($user->save()) {
             return ['code'=>1, 'result'=>'注册成功'];
        }else
        {
            return ['code'=>0, 'result'=>'注册失败'];
        }
    }

    public function login(Request $request)
    {
        //echo($request->get('phonenum'));
        $phoneNumber = $request->get('phonenum');
        $password = $request->get('password');
        $user = UserModel::get(['phonenum'=>$phoneNumber]);
        if (strcmp($user->password, $password)) {
            return ['code'=>0, 'result'=>'手机号或者密码错误'];
        }else
        {
             return ['code'=>1, 'result'=>'登陆成功'];
        }
    }

    public function changeUserName(Request $request)
    {
        $phoneNumber = $request->get('phonenum');
        $userName = $request->get('username');
        $user = UserModel::get(['phonenum'=>$phoneNumber]);
        $user->username = $userName;
       if ($user->save()) {
             return ['code'=>1, 'result'=>'修改成功'];
        }else
        {
            return ['code'=>0, 'result'=>'修改失败'];
        }
    }

    public function changePassword(Request $request)
    {
        $phoneNumber = $request->get('phonenum');
        $password = $request->get('password');
        $user = UserModel::get(['phonenum'=>$phoneNumber]);
        $user->password = $password;
       if ($user->save()) {
             return ['code'=>1, 'result'=>'修改成功'];
        }else
        {
            return ['code'=>0, 'result'=>'修改失败'];
        }
    }

    public function changeSex(Request $request)
    {
        $phoneNumber = $request->get('phonenum');
        $sex = $request->get('sex');
        $user = UserModel::get(['phonenum'=>$phoneNumber]);
        $user->sex = $sex;
       if ($user->save()) {
             return ['code'=>1, 'result'=>'修改成功'];
        }else
        {
            return ['code'=>0, 'result'=>'修改失败'];
        }
    }

    public function changeAge(Request $request)
    {
        $phoneNumber = $request->get('phonenum');
        $age = $request->get('age');
        $user = UserModel::get(['phonenum'=>$phoneNumber]);
        $user->age = $age;
       if ($user->save()) {
             return ['code'=>1, 'result'=>'修改成功'];
        }else
        {
            return ['code'=>0, 'result'=>'修改失败'];
        }
    }
}
