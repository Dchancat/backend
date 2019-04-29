<?php

namespace app\index\controller;

use think\Controller;

class Base extends Controller
{
    //使用共享视图
    public function initialize()
    {
	$cates = model('Cate')->order('sort','asc')->select();
	$setInfo = model('System')->find();
	$topArticle = model('Article')->where('is_top',1)->order('create_time','desc')->limit(5)->select();
	$viewData = [
	    'cates'=>$cates,
	    'setInfo'=>$setInfo,
	    'topArticle'=>$topArticle
	];	
	$this->view->share($viewData);
    }

}
