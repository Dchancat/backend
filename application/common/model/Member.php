<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Member extends Model
{
    //软删除
    use SoftDelete;

    //关联评论
    public function comments()
    {
	return $this->hasMany('Comment','member_id','id');
    }
    
    //会员添加
    public function add($data)
    {
	$validate = new \app\common\validate\Member();
        if(!$validate->scene('add')->check($data)){
            return $validate->getError();
        }
	$result = $this->allowField(true)->save($data);
	if($result){
	    return 1;
	}else {
	    return '会员添加失败';
	}
    }

    public function edit($data)
    {
        $validate = new \app\common\validate\Member();
        if(!$validate->scene('edit')->check($data)){
            return $validate->getError();
        }
	$memberInfo = $this->find($data['id']);
	if($data['oldpwd'] != $memberInfo['password']){
	    return '原密码不正确';
	}
	$memberInfo->password = $data['newpwd'];
	$memberInfo->nickname = $data['nickname'];
	$memberInfo->email    = $data['email'];
        $result = $memberInfo->save();
        if($result){
            return 1;
        }else {
            return '会员修改失败';
        }
    }

}
