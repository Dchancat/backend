<?php

namespace app\admin\controller;


class Member extends Base
{
    //会员列表
    public function list()
    {
	$members = model('Member')->order('create_time')->paginate(10);
	$viewData = [
	    'members'=>$members
	];
	$this->assign($viewData);
	return view();
    }
   //会员添加
    public function add()
    {
	if(request()->isAjax()){
	    $data = [
		'username'=> input('post.username'),
		'password'=> input('post.password'),
		'nickname'=> input('post.nickname'),
		'email'   => input('post.email'),
	    ];
	    $result = model('Member')->add($data);
	    if($result == 1){
		$this->success('会员添加成功','admin/member/list');
	    }else {
		$this->error($result);
	    }
	}
	return view();
    }
    //会员信息修改
    public function edit()
    {
	if(request()->isAjax()){
	    $data = [
		'id'  =>input('post.id'),
		'username'=> input('post.username'),
		'oldpwd'  => input('post.oldpwd'),
		'newpwd'  => input('post.newpwd'),
		'nickname'=> input('post.nickname'),
		'email'   => input('post.email'),
	    ];
	    $result = model('Member')->edit($data);
	    if($result == 1){
		$this->success('会员修改成功','admin/member/list');
	    }else {
		$this->error($result);	
	    }
	}
	$memberInfo = model('Member')->find(input('id'));
	$viewData = [
	    'memberInfo'=>$memberInfo
	];
	$this->assign($viewData);
	return view();
    }
    
    //会员删除
    public function del()
    {
	$memberInfo = model('Member')->with('comments')->find(input('post.id'));
	$result = $memberInfo->together('comments')->delete();
	if($result){
	    $this->success('会员删除成功','admin/member/list');
	}else {
	    $this->error('$result');
	}
    }
}
