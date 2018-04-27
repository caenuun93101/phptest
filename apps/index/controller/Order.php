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
}