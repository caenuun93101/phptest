<?php
namespace app\index\controller;
use think\Db;
use think\Request; 
use app\index\model\Order as OrderModel;

class Order
{
    public function index()
    {

        return ['message'=>'hello world'];
    }

    public function newOrder(Request $request)
    {
    	$orderid = $request->post('orderid');
        $originatorid =  $request->post('originatorid');
        $ordertime = $request->post('ordertime');
        $longitude = $request->post('longitude');
        $latitude = $request->post('latitude');
        $origin = $request->post('origin');
        $destination = $request->post('destination');
        $starttime = $request->post('starttime');
        $peoplenum = $request->post('peoplenum');
        $city = $request->post('city');

        $order = new OrderModel;
        $order->orderid = $orderid;
        $order->originatorid = $originatorid;
        $order->ordertime = $ordertime;
        $order->longitude = $longitude;
        $order->latitude = $latitude;
        $order->origin = $origin;
        $order->destination = $destination;
        $order->starttime = $starttime;
        $order->peoplenum = $peoplenum;
        $order->city = $city;
        $order->status = 00;
        if ($order->save()) {
             return ['code'=>1, 'result'=>'注册成功'];
        }else
        {
            return ['code'=>0, 'result'=>'注册失败'];
        }
    }

    public function nearBy(Request $request)
    {
        $userid = $request->post('userid');
        $city = $request->post('city');
        $list = OrderModel::all(['city'=>$city]);
        $array = array();
        foreach ($list as $order) {
            //if (!strcmp($userid, $order->userid)) {
                //array_push($array, $order);
            //}
            $array[]=$order;
        }
        if (count($array) == 0) {
            return ['code'=>0, 'result'=>dump($list)];
        }
        return ['code'=>1, 'result'=>$array];
    }
}