<?php /*a:2:{s:87:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/admin/view/model/index.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/admin/view/publics/base.html";i:1555383687;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title><?php echo htmlentities($meta_title); ?>|WeiPHP管理平台</title>
    <link href="/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/admin/css/base.css?v=<?php echo SITE_VERSION; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="/admin/css/common.css?v=<?php echo SITE_VERSION; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="/admin/css/module.css?v=<?php echo SITE_VERSION; ?>" />
    <link rel="stylesheet" type="text/css" href="/admin/css/style.css?v=<?php echo SITE_VERSION; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="/admin/css/store.css?v=<?php echo SITE_VERSION; ?>" media="all">
	<link rel="stylesheet" type="text/css" href="/admin/css/<?php echo htmlentities(app('config')->get('COLOR_STYLE')); ?>.css?v=<?php echo SITE_VERSION; ?>" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/admin/js/jquery.mousewheel.js?v=<?php echo SITE_VERSION; ?>"></script>
    <!--<![endif]-->
    
</head>
<body <?php if(empty($top_menu['core_side_menu']) || (($top_menu['core_side_menu'] instanceof \think\Collection || $top_menu['core_side_menu'] instanceof \think\Paginator ) && $top_menu['core_side_menu']->isEmpty())): ?>style="padding-left:0;"<?php endif; ?>>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <?php if(config('SYSTEM_LOGO')) { ?>
        <span class="logo" style="float: left;margin-left: 2px;width: 198px;height: 49px;background:url('<?php echo config('SYSTEM_LOGO'); ?>') no-repeat " >

        <?php  }else{  ?>
        <span class="logo" style="float: left;margin-left: 2px;width: 198px;height: 49px;background:url('/static/base/images/logo.png') no-repeat 0 -22px" >

        <?php } ?>
        </span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($top_menu['core_top_menu']) || $top_menu['core_top_menu'] instanceof \think\Collection || $top_menu['core_top_menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $top_menu['core_top_menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?>
                <li data-id="<?php echo htmlentities($ca['id']); ?>" class="<?php echo htmlentities($ca['class']); ?>"><a href="<?php echo htmlentities($ca['url']); ?>" target="<?php echo htmlentities($ca['target']); ?>"><?php echo htmlentities($ca['title']); ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo htmlentities(get_nickname($mid)); ?>"><?php echo htmlentities(get_nickname($mid)); ?></em></li>
                <li><a href="<?php echo U('home/Index/index'); ?>">返回前台</a></li>
                <li><a href="<?php echo U('admin/User/updatePassword'); ?>">修改密码</a></li>
                <li><a href="<?php echo U('admin/User/updateNickname'); ?>">修改昵称</a></li>
                <li><a href="<?php echo U('admin/Publics/logout'); ?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <?php if(!(empty($top_menu['core_side_menu']) || (($top_menu['core_side_menu'] instanceof \think\Collection || $top_menu['core_side_menu'] instanceof \think\Paginator ) && $top_menu['core_side_menu']->isEmpty()))): ?>
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                    <!-- 子导航 -->
					<h3><i class="icon icon-unfold"></i><?php echo htmlentities($now_top_menu_name); ?></h3>                        
                        <ul class="side-sub-menu">
                            <?php if(is_array($top_menu['core_side_menu']) || $top_menu['core_side_menu'] instanceof \think\Collection || $top_menu['core_side_menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $top_menu['core_side_menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <li class="<?php echo htmlentities($vo['class']); ?>" data-id="<?php echo htmlentities($vo['id']); ?>"> <a class="item" href="<?php echo htmlentities($vo['url']); ?>" target="<?php echo htmlentities($vo['target']); ?>"> <?php echo htmlentities($vo['title']); ?> </a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>

                    <!-- /子导航 -->
            </div>
        
        <!-- /子导航 -->
    </div>
    <?php endif; ?>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!(empty($_show_nav) || (($_show_nav instanceof \think\Collection || $_show_nav instanceof \think\Paginator ) && $_show_nav->isEmpty()))): ?>
            <div class="breadcrumb">
                <span>您的位置:</span>
                <assign name="i" value="1" />
                <?php if(is_array($_nav) || $_nav instanceof \think\Collection || $_nav instanceof \think\Paginator): if( count($_nav)==0 ) : echo "" ;else: foreach($_nav as $k=>$v): if($i == count($_nav)): ?>
                    <span><?php echo htmlentities($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></a>&gt;</span>
                    <?php endif; ?>
                    <assign name="i" value="$i+1" />
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endif; ?>
            <!-- nav -->
            

            
	<!-- 标题栏 -->
	<div class="main-title">
		<h2>模型列表</h2>

	</div>
    <div class="tools">
        <a class="btn" href="<?php echo U('Model/add'); ?>">新 增</a>
        <a class="btn" href="<?php echo U('Model/update_sql'); ?>">批量更新插件的安装SQL文件</a>
<!--        <a class="btn" href="<?php echo U('Model/freshDBtoFile'); ?>">从数据库更新到文件</a>
        <a class="btn" href="<?php echo U('Model/freshFiletoDB'); ?>">从文件更新到数据库</a>-->
    <div class="search-form fr cf">
			<div class="sleft">
                <?php  $search_url = U('index'); $search_key='title'; ?>
				<input type="text" name="<?php echo htmlentities($search_key); ?>" class="search-input" value="<?php echo I($search_key); ?>" placeholder="请输入关键字">
				<a class="sch-btn" href="javascript:;" id="search" url="<?php echo htmlentities($search_url); ?>"><i class="btn-search"></i></a>
			</div>
	</div>        
    </div>


	<!-- 数据列表 -->
	<div class="data-table">
        <div class="data-table table-striped">
<table>
    <thead>
        <tr>
		<th>编号</th>
		<th>标识</th>
		<th>名称</th>
        <th>所属应用</th>
		<th>操作</th>
		</tr>
    </thead>
    <tbody>
	<?php if(!(empty($_list) || (($_list instanceof \think\Collection || $_list instanceof \think\Paginator ) && $_list->isEmpty()))): if(is_array($_list) || $_list instanceof \think\Collection || $_list instanceof \think\Paginator): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<tr>
			<td><?php echo htmlentities($vo['id']); ?> </td>
			<td><?php echo htmlentities($vo['name']); ?></td>
			<td><a data-id="<?php echo htmlentities($vo['id']); ?>" href="<?php echo U('model/edit?id='.$vo['id']); ?>#2"><?php echo htmlentities($vo['title']); ?></a></td>
            <td><?php echo htmlentities((isset($vo['addon_title']) && ($vo['addon_title'] !== '')?$vo['addon_title']:'')); ?></td>
			<td>
            <?php if(!(empty($vo['table_exists']) || (($vo['table_exists'] instanceof \think\Collection || $vo['table_exists'] instanceof \think\Paginator ) && $vo['table_exists']->isEmpty()))): if(!(empty($vo['update_file']) || (($vo['update_file'] instanceof \think\Collection || $vo['update_file'] instanceof \think\Paginator ) && $vo['update_file']->isEmpty()))): ?><a href="<?php echo U('freshDBtoFile?model_id='.$vo['id']); ?>">更新文件</a>&nbsp;&nbsp;&nbsp;<?php endif; if(!(empty($vo['update_db']) || (($vo['update_db'] instanceof \think\Collection || $vo['update_db'] instanceof \think\Paginator ) && $vo['update_db']->isEmpty()))): ?><a href="<?php echo U('freshFiletoDB?model_id='.$vo['id']); ?>">更新数据表</a>&nbsp;&nbsp;&nbsp;<?php endif; ?>
                <a href="<?php echo U('attribute/index?model_id='.$vo['id']); ?>">字段管理</a>&nbsp;&nbsp;&nbsp;
				<a href="<?php echo U('model/edit?id='.$vo['id']); ?>#2">编辑</a>
				<?php else: ?>
<a href="<?php echo U('importModel',['model_name'=>$vo['name'],'model_addon'=>$vo['addon']]); ?>">导入模型</a>
                <?php endif; ?>
                &nbsp;&nbsp;&nbsp;<a href="<?php echo U('model/del?ids='.$vo['id']); ?>" class="confirm">删除</a>
            </td>
		</tr>
		<?php endforeach; endif; else: echo "" ;endif; else: ?>
		<td colspan="7" class="text-center"> aOh! 暂时还没有内容! </td>
		<?php endif; ?>
	</tbody>
    </table>

        </div>
    </div>
    <div class="page">
        <?php echo $_page; ?>
    </div>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="https://www.weiphp.cn" target="_blank">WeiPHP</a>管理平台</div>
                <div class="fr">V<?php echo config('SYSTEM_UPDATRE_VERSION'); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
	var  IMG_PATH = "/admin/images";
	var  STATIC = "/static";
	var  ROOT = "";
	var  UPLOAD_PICTURE = "<?php echo U('home/File/upload_picture',array('session_id'=>session_id())); ?>";
	var  UPLOAD_FILE = "<?php echo U('home/File/upload',array('session_id'=>session_id())); ?>";
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "__APP__", //当前项目地址
            "PUBLIC" : "", //项目公共目录地址
            "DEEP"   : "<?php echo config('URL_PATHINFO_DEPR'); ?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo config('URL_MODEL'); ?>", "<?php echo config('URL_CASE_INSENSITIVE'); ?>", "<?php echo config('URL_HTML_SUFFIX'); ?>"],
            "VAR"    : ["<?php echo config('VAR_MODULE'); ?>", "<?php echo config('VAR_CONTROLLER'); ?>", "<?php echo config('VAR_ACTION'); ?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/static/think.js?v=<?php echo SITE_VERSION; ?>"></script>
    <script type="text/javascript" src="/static/jquery.dragsort-0.5.2.min.js"></script>
    <script type="text/javascript" src="/static/base/js/admin_common.js?v=<?php echo SITE_VERSION; ?>"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
    <script src="/static/thinkbox/jquery.thinkbox.js?v=<?php echo SITE_VERSION; ?>"></script>
    <script type="text/javascript">
$(function(){
	//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
        var query  = $('.search-form').find('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
		 url = change_search_url(url);
		window.location.href = url;
	});

    //回车自动提交
    $('.search-form').find('input').keyup(function(event){
        if(event.keyCode===13){
            $("#search").click();
        }
    });

})
</script>

</body>
</html>
