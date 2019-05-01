<?php

namespace app\common\validate;

use think\Validate;

class Member extends Validate
{
    protected $rule = [
	'username|用户名'=> 'require|max:25|alphaDash',
	'password|密码'  => 'require|min:6|max:16',
	'conpass|确认密码'=>'require|confirm:password',
	'oldpwd|原密码'  => 'require|min:6|max:16',
	'newpwd|新密码'  => 'require|min:6|max:16',
	'nickname|昵称'  => 'require|max:25|alphaDash',
        'email|邮箱'     => 'require|email',
	'verify|验证码'  => 'require|captcha'
    ];

    //添加场景
    public function sceneAdd()
    {
	return $this->only(['username','password','nickname','email']);
    }
 
    public function sceneEdit()
    {
        return $this->only(['oldpwd','newpwd','nickname','email']);
    }

    public function sceneRegister()
    {
        return $this->only(['username','password','conpass','nickname','email','verify'])->append('username','unique:member');
    }

    public function sceneLogin()
    {
        return $this->only(['username','password','verify']);
    }




}
