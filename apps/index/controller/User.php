<?php
namespace app\index\controller;
use think\Db;
use think\Request; 
use app\index\model\User as UserModel;

class User
{
    public function index()
    {

        return ['message'=>'hello world'];
    }

    public function getCode(Request $request)
    {
        $phoneNumber = $request->post('phonenum');
        $g = "/13[12356789]{1}\d{8}|15[1235689]\d{8}|188\d{8}/"; 
        if(preg_match($g,$phoneNumber))
        {
            $user = UserModel::get(['phonenum'=>$phoneNumber]);
            if ($user == NULL) {
               return ['code'=>1, 'result'=>'123'];
            }
            else
            {
                return ['code'=>2, 'result'=>'手机号码已存在'];
            }
            
        }else
        {
            return ['code'=>0, 'result'=>'error'];
        }
    }

    public function checkCode(Request $request)
    {
        $phoneCode = $request->post('phoneCode');
        if (strcmp($phoneCode, '1234')) {
            return ['code'=>0, 'result'=>$phoneCode];
        }else
        {
            return ['code'=>1, 'result'=>'ok'];
        }
    }

    public function register(Request $request)
    {
        $phoneNumber = $request->post('phonenum');
        $password = $request->post('password');
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
        $phoneNumber = $request->post('phonenum');
        $password = $request->post('password');
        $user = UserModel::get(['phonenum'=>$phoneNumber]);
        if ($user == NULL) {
            return ['code'=>0, 'result'=>'手机号或者密码错误'];
        }
        else if (strcmp($user->password, $password)) {
            return ['code'=>0, 'result'=>'手机号或者密码错误'];
        }else
        {
             return ['code'=>1, 'result'=>'登陆成功'];
        }
    }

    public function changeUserName(Request $request)
    {
        $phoneNumber = $request->post('phonenum');
        $userName = $request->post('username');
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
        $phoneNumber = $request->post('phonenum');
        $password = $request->post('password');
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
        $phoneNumber = $request->post('phonenum');
        $sex = $request->post('sex');
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
        $phoneNumber = $request->post('phonenum');
        $age = $request->post('age');
        $user = UserModel::get(['phonenum'=>$phoneNumber]);
        $user->age = intval($age);
       if ($user->save()) {
             return ['code'=>1, 'result'=>'修改成功'];
        }else
        {
            return ['code'=>0, 'result'=>'修改失败'];
        }
    }

    public function changeScore(Request $request)
    {
        $phoneNumber = $request->post('phonenum');
        $newScore = $request->post('score');
        $user = UserModel::get(['phonenum'=>$phoneNumber]);
        $times = $user->times;
        $score = $user->score;
        $user->times++;
        $user->score  = round(($times * $score + $newScore) / ($times + 1),2);
       if ($user->save()) {
             return ['code'=>1, 'result'=>'修改成功'];
        }else
        {
            return ['code'=>0, 'result'=>'修改失败'];
        }
    }

    public function getUserInfo(Request $request)
    {
        $phoneNumber = $request->post('phonenum');
        $user = UserModel::get(['phonenum'=>$phoneNumber]);
        if ($user != NULL) {
            return ['code'=>1, 'result'=>$user];
        }else
        {
            return ['code'=>0, 'result'=>'error'];
        }
        
    }
}
