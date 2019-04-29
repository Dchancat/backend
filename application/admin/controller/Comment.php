<?php

namespace app\admin\controller;


class Comment extends Base
{
    //评论列表
    public function list()
    {
	$comments = model('Comment')->with('article','member')->order(['create_time'=>'desc'])->paginate(10);
	$viewData = [
	    'comments'=>$comments
	];
	$this->assign($viewData);
	return view();
    }
    //评论删除
    public function del()
    {
        $commentInfo = model('Comment')->find(input('post.id'));
        $result = $commentInfo->delete();
        if($result){
            $this->success('评论删除成功','admin/comment/list');
        }else {
            $this->error('$result');
        }
    }

}
