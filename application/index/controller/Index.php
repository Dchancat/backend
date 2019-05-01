<?php
namespace app\index\controller;

class Index extends Base
{
    public function index()
    {
	$where = [];
	$catename = null;
	if(input('?id')){
	    $where = [
		'cate_id'=>input('id'),
	    ];

	    $catename = model('Cate')->where('id',input('id'))->value('catename');
	}
	$articles = model('Article')->where($where)->order('create_time','desc')->paginate(3);	
	$viewData = [
	    'articles'=>$articles,
	    'catename'=>$catename,
	];
	$this->assign($viewData);
        return view();
    }


    //注册
    public function register()
    {
        if (request()->isAjax()){
            $data = [
                'username' => input('post.username'),
                'password' => input('post.password'),
                'conpass'  => input('post.conpass'),
                'nickname' => input('post.nickname'),
                'email'    => input('post.email'),
		'verify'   => input('post.verify')
            ];
            $result = model('Member')->register($data);
            if ($result == 1) {
                #$this->success('注册成功你的账户是：'.$data['username'],'index/index/login');
                $this->success('注册成功','index/index/login');
            }else {
                $this->error($result);
            }
        }
        return view();
    }

    public function login()
    {
        if (request()->isAjax()){
            $data = [
                'username' => trim(input('post.username')),
                'password' => input('post.password'),
		'verify'  => input('post.verify')
            ];
	   $result = model('Member')->login($data);
           if($result ==1 ){
                $this->success('登录成功!','index/index/index');
           }else {
                $this->error($result);
           }
        }
        return view();
    }

    //退出登录
    public function logout()
    {
        session(null);
        if(session('?index.id')) {
            $this->error('退出失败');
        }else{
            $this->success('退出成功','index/index/login');
        }
    }

    public function search()
    {
	$where[] = ['title','like','%'.input('keyword').'%'];
	$catename= input('keyword');
	$articles = model('Article')->where($where)->order('create_time','desc')->paginate(10);
	$viewData = [
	'articles'=>$articles,
	'catename'=>$catename
	];

	$this->assign($viewData);
	return view('index');
    }

}

