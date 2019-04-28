<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

return [

];

Route:group('admin',function(){
    Route::rule('/', 'admin/index/login', 'get|post');
    Route::rule('index', 'admin/home/index', 'get');
    Route::rule('register', 'admin/index/register', 'get|post');
    Route::rule('forgot', 'admin/index/forgot', 'get|post');
    Route::rule('reset', 'admin/index/reset', 'post');
    Route::rule('logout', 'admin/home/logout', 'post');
    Route::rule('catelist', 'admin/cate/list', 'get');
    Route::rule('cateadd', 'admin/cate/add', 'get|post');
    Route::rule('catesort', 'admin/cate/sort', 'post');
    Route::rule('cateedit/[:id]','admin/cate/edit','get|post');
    Route::rule('catedel','admin/cate/del','post');
    Route::rule('articlelist','admin/article/list','get');
    Route::rule('articleadd','admin/article/add','get|post');
    Route::rule('articletop','admin/article/top','post');
    Route::rule('articleedit/[:id]','admin/article/edit','get|post');
    Route::rule('articledel','admin/article/del','post');
    Route::rule('memberlist','admin/member/list','get');
    Route::rule('memberadd','admin/member/add','get|post');
    Route::rule('memberedit/[:id]','admin/member/edit','get|post');
    Route::rule('memberdel','admin/member/del','post');
    Route::rule('adminlist','admin/admin/list','get');
    Route::rule('adminadd','admin/admin/add','get|post');
    Route::rule('adminstatus','admin/admin/status','post');
    Route::rule('adminedit','admin/admin/edit','get|post');
    Route::rule('admindel/[:id]','admin/admin/del','post');
    Route::rule('commentlist','admin/comment/list','get');
    Route::rule('commentdel','admin/comment/del','post');
    Route::rule('set','admin/system/set','get|post');
        
});

