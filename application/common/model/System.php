<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class System extends Model
{
    //软删除
    use SoftDelete;

    //系统设置
    public function set($data)
    {
	$validate = new \app\common\validate\System;
	if(!$validate->check($data)){
	    return $validate->getError();
	}
	$setInfo = $this->find($data['id']);
	$setInfo->webname = $data['webname'];
	$setInfo->copyright=$data['copyright'];
	$result = $setInfo->save();
	if($result){
	    return 1;
	}else {
	    return '设置失败';
	}
    }
}
