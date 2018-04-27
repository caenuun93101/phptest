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
        if ($order->save()) {
             return ['code'=>1, 'result'=>'注册成功'];
        }else
        {
            return ['code'=>0, 'result'=>'注册失败'];
        }
    }
}