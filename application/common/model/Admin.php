<?php

namespace app\common\model;

use think\Model;
use think\Db;
use think\model\concern\SoftDelete;

class Admin extends Model
{
    use SoftDelete;

    public function login($data)
    {
	 $validate = new \app\common\validate\Admin;
         if (!$validate->scene('login')->check($data)){
             return $validate->getError();
         }

#	$result = $this->where($data)->select();
	$result = $this->where($data)->find();
#       $result = Db::name('admin')->where($data)->select();

	if ($result){
	    //判断用户是否可用
	    if ($result['status'] != 1){
		return '此用户已被禁用';
	    }
	    
	    $sessionData = [
		'id' => $result['id'],
		'nickname' => $result['nickname'],
		'is_super' => $result['is_super'],
	    ];
	    session('admin',$sessionData);
	    return 1; 
	}else {
	    return '用户名或者密码错误';
	}
    }

    //注册校验
    public function register($data)
    {
	 $validate = new \app\common\validate\Admin;
            if (!$validate->scene('register')->check($data)){
                return $validate->getError();
            }

	$result = $this->allowField(true)->save($data);	
	if ($result) {
	    mailto($data['email'],'注册管理员账户成功!','注册管理员账户成功');
	    return 1;
	}else {
	    return '注册失败';
	}
    }

    public function forgot($data)
    {
	$adminInfo = $this->where('email',$data['email'])->find();
	if ($adminInfo){
	    return 1;	
	}else {
	    return '该邮箱未注册，请检查您的邮箱是否填写正确';
	}

	
    }

    public function reset($data)
    {
	if ($data['captcha'] != session('captcha')){
	    return '驗證碼不正確';
	}
	$adminInfo = $this->where('email',$data['email'])->find();
	$password = mt_rand(10000,99999);
	$adminInfo->password = $password;
	$result = $adminInfo->save();
	if ($rsult){
	    $content = '恭喜您，密码重置成功<br>用户名：'.$adminInfo['username'].'<br>新密码：'.$password ;
	    mailto($data['email'],'密码重置成功',$content);
	    return 1;
	}else {
	    return '重置密码失败';
	}
    }

    public function add($data)
    {
         $validate = new \app\common\validate\Admin;
            if (!$validate->scene('add')->check($data)){
                return $validate->getError();
            }

        $result = $this->allowField(true)->save($data);
        if ($result) {
           # mailto($data['email'],'注册管理员账户成功!','注册管理员账户成功');
            return 1;
        }else {
            return '注册失败';
        }
    }

    public function edit($data)
    {
        $validate = new \app\common\validate\Admin;
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }
        $adminInfo = $this->find($data['id']);
        if($data['oldpwd'] != $adminInfo['password']){
            return '原密码不正确';
        }
        $adminInfo->password = $data['newpwd'];
        $adminInfo->nickname = $data['nickname'];
        $adminInfo->email    = $data['email'];
        $result = $adminInfo->save();
        if($result){
            return 1;
        }else {
            return '管理员修改失败';
        }
    }



}
