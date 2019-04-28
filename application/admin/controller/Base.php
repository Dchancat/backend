<?php

namespace app\admin\controller;

use think\Controller;
#use \app\common\model\Admin;
#use think\Db;

class Base extends Controller
{
    //
    public function initialize()
    {
	if(!session('?admin.id')){
	    $this->redirect('admin/index/login');
	}
    }
}
