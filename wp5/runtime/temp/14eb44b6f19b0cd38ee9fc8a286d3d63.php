<?php /*a:8:{s:94:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/weixin/view/custom_menu/lists.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/common.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/head.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/header.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/_nav.html";i:1555383687;s:103:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/weixin/view/custom_menu/_lists_content.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/footer.html";i:1555383687;s:85:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/var.html";i:1555383687;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" />
<meta content="<?php echo config('WEB_SITE_KEYWORD'); ?>" name="keywords"/>
<meta content="<?php echo config('WEB_SITE_DESCRIPTION'); ?>" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL; ?>/favicon.ico">
<title><?php echo htmlentities((isset($page_title) && ($page_title !== '')?$page_title:'weiphp')); ?></title>
<link href="/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link rel="stylesheet" href="/static/ymyui/css/ymyui.css">
<!-- <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.css"> -->
<link href="/static/base/css/base.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link href="/static/base/css/module.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link href="/static/base/css/weiphp.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link rel="stylesheet" href="//at.alicdn.com/t/font_727459_zyp88ew3c6.css"></link>

<!-- <link rel="stylesheet" src="/static/ymyui/css/ymyui.css"> -->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION; ?>"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<!-- <script type="text/javascript" src="/static/bootstrap/js/bootstrap.min.js"></script> -->
<!-- 菜单下拉 -->
<script src="//cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
<script type="text/javascript" src="/static/ymyui/js/ymyui.min.js"></script>



<script type="text/javascript" src="/static/uploadify/jquery.uploadify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
<script type="text/javascript" src="/static/base/js/dialog.js?v=<?php echo SITE_VERSION; ?>"></script>

<script type="text/javascript" src="/static/webuploader-0.1.5/webuploader.min.js"></script>

<script type="text/javascript" src="/static/base/js/admin_common.js?v=<?php echo SITE_VERSION; ?>"></script>
<script type="text/javascript" src="/static/base/js/admin_image.js?v=<?php echo SITE_VERSION; ?>"></script>
<script type="text/javascript" src="/static/masonry/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/static/jquery.dragsort-0.5.2.min.js"></script> 
<script src="//cdn.bootcss.com/limonte-sweetalert2/7.21.1/sweetalert2.all.min.js"></script>
<!-- 封装的jquery表单验证插件，依赖sweetalert2 -->
<script src="/static/default/lib/formverfiy.js"></script>
<script type="text/javascript">
var  IMG_PATH = "/static/base/images";
var  STATIC = "/static";
var  ROOT = "";
var  UPLOAD_PICTURE = "<?php echo U('home/File/upload_picture',array('session_id'=>session_id())); ?>";
var  UPLOAD_FILE = "<?php echo U('home/File/upload',array('session_id'=>session_id())); ?>";
var  UPLOAD_DIALOG_URL = "<?php echo U('home/File/upload_dialog',array('session_id'=>session_id())); ?>";
var COPY_PAGE_URL = "<?php echo U('home/index/copy'); ?>";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader'); ?>

    
</head>
<body>
	

	<!-- 主体 -->

<?php  //验证登录
  if(!is_login() && empty(cookie( '__forward__'))){
  $forward = cookie('__forward__');
            empty( $forward ) && cookie('__forward__', $_SERVER['REQUEST_URI']);
  //return redirect(U('home/user/login',array('from'=>4)));
  }  ?>
<div id="main-container" class="admin_container">
  <?php if(!(empty($top_menu['core_side_menu']) || (($top_menu['core_side_menu'] instanceof \think\Collection || $top_menu['core_side_menu'] instanceof \think\Paginator ) && $top_menu['core_side_menu']->isEmpty()))): ?>
    <div class="sidebar">
      <!-- 左侧栏用户信息 -->
      <div class="user-info">
        

        <a href="#" class="user-info-head">
            <img class="admin_head url" src="<?php echo SITE_URL; ?>/static/base/images/shenxun_logo.jpg"/>
        </a>

        <div class="user-info-name"><?php echo htmlentities(getShort($myinfo['nickname'],4)); ?><i class="pl_5 fa fa-sort-down"></i>
          <div class="user-info-dropdown">
          <a href="<?php echo U('home/User/profile'); ?>">修改密码</a>
          <a href="<?php echo U('home/User/logout'); ?>">退出</a>
        </div>
        </div>

        
      </div>
      
    
      <div id="sidenav">
        <ul class="sidenav_sub">
          <?php if(is_array($top_menu['core_side_menu']) || $top_menu['core_side_menu'] instanceof \think\Collection || $top_menu['core_side_menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $top_menu['core_side_menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li class="<?php echo htmlentities($vo['class']); ?>" data-id="<?php echo htmlentities($vo['id']); ?>"> <a href="<?php echo htmlentities($vo['url']); ?>"> <?php echo htmlentities($vo['title']); ?> </a><b class="active_arrow"></b></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
          <div class="bar"></div>
        </ul>

      </div>

    </div>

  <?php endif; ?>
   
    <div class="main_body admin-body">
      <!-- 头部 -->
      <!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content"></div>
</div>


<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="wrap">

       <a class="brand" title="<?php echo config('WEB_SITE_TITLE'); ?>" href="<?php echo U('home/index/main'); ?>">
       		<img height="52" src="/static/base/images/logo.png"/>
       </a>
      <?php  $index_2 = parse_name(MODULE_NAME) . '/' . parse_name(CONTROLLER_NAME) . '/*' ; $index_3 = parse_name(MODULE_NAME) . '/' . parse_name(CONTROLLER_NAME) . '/' . parse_name(ACTION_NAME );  ?>

            <div class="top_nav">
                <?php if(is_login()): ?>
                    <ul class="nav" style="margin-right:0">
                        <?php if(is_array($top_menu['core_top_menu']) || $top_menu['core_top_menu'] instanceof \think\Collection || $top_menu['core_top_menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $top_menu['core_top_menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    	<li class="<?php echo htmlentities($vo['class']); ?>"><a href="<?php echo htmlentities($vo['url']); ?>" target="<?php echo htmlentities($vo['target']); ?>"><?php echo htmlentities($vo['title']); ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
</div>
      <!-- /头部 -->
      
  <div class="span9 page_message">
    <section id="contents"> <?php  if(is_array($nav) && count($nav)>1) {  ?>
<ul class="tab-nav nav">
  <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <li class="<?php echo htmlentities($vo['class']); ?>"><a href="<?php echo isset($vo['url']) ? $vo['url'] :''; ?>"><?php echo htmlentities($vo['title']); ?><span class="arrow fa fa-sort-up"></span></a></li>
  <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php  }  if(!empty($sub_nav)): ?>
<div class="sub-tab-nav">
       <ul class="sub_tab">
       <?php if(is_array($sub_nav) || $sub_nav instanceof \think\Collection || $sub_nav instanceof \think\Paginator): $i = 0; $__LIST__ = $sub_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li><a class="<?php echo htmlentities($vo['class']); ?>" href="<?php echo htmlentities($vo['url']); ?>"><?php echo htmlentities($vo['title']); ?><span class="arrow fa fa-sort-up"></span></a></li>
       <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
</div> 
<?php endif; if(!empty($normal_tips)): ?>
	<p class="normal_tips"><b class="fa fa-info-circle"></b> <?php echo $normal_tips; ?></p>
<?php endif; ?> 
      
      <!-- 数据列表 --> 
      <style type="text/css">
td {
	font-size: 14px;
}
#phone {
	position: relative;
	margin: 0 0;
	width: 400px;
	height: 698px;
	background: url(/static/base/images/preview_phone_short.jpg) no-repeat center 0;
}
#frame {
	position: absolute;
	left: 0;
	margin: 102px 0 0 43px;
	width: 320px;
	border: 1px solid #333;
	background: #666;
	height: 487px;
	width: 320px;
	overflow: hidden;
}
.wx_menu {
	display:inline-flex;
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	height: 50px;
	background: #fff;
}
.wx_menu .keyboard {
	float: left;
	width: 44px;
	height: 50px;
	background: url(/weixin/images/wx_menu_keyboard_icon.png) no-repeat;
	background-size: 100% 100%;
	border-right: 1px solid #CCC;
}
.wx_menu .menu {
	display: -webkit-box;
	height: 50px;
	float: left;
	width: 275px;
}
.wx_menu .menu>div {
	-webkit-box-flex: 1;
	display: block;
	line-height: 50px;
	color: #434343;
	text-align: center;
	border-right: 1px solid #ccc;
	position: relative;
}
.wx_menu .menu>div:last-child {
	border: none;
}
.wx_menu .menu>div img {
	width: 12px;
	vertical-align: -1px;
	margin-right: 2px;
}
.wx_menu .sub_menu {
	position: absolute;
	bottom: -358px;
	margin-left: 0;
	padding: 0 5px;
	border: 1px solid #ccc;
	border-radius: 5px;
	background: #fff;
	text-align: center;
	z-index: 10;
}
.m_a_i {
	position: relative;
	z-index: 100;
	background: #fff;
}
.wx_menu .sub_menu a {
	display: block;
	color: #434343;
	border-bottom: 1px solid #ddd;
	height: 40px;
	line-height: 40px;
	padding: 0 5px;
	white-space: nowrap
}
.wx_menu .sub_menu a:last-child {
	border: none;
}
.wx_menu .sub_menu em {
	position: absolute;
	width: 10px;
	height: 8px;
	bottom: -7px;
	left: 50%;
	margin-left: -5px;
	background: url(/weixin/images/arrow_down.png) no-repeat center bottom;
}
</style>
<div class="data-table" style="margin-top:40px; overflow:hidden">
  <div class="row">
  	<div class="col-sm-6 text-center">
  	  <div id="phone">
  	    <div id="frame">
  	      <div class="wx_menu"> <span class="keyboard"></span>
  	        <div class="menu">
  	          <?php if(is_array($list_data) || $list_data instanceof \think\Collection || $list_data instanceof \think\Paginator): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;if($data['pid'] == '0'): ?>
  	              <div class="m_a"  href="javascript:;">
  	                <div class="m_a_i"> <img src="/weixin/images/wx_menu_list_icon.png"/><?php echo htmlentities($data['title']); ?> </div>
  	                <div class="sub_menu">
  	                  <div class="sub_menu_inner">
  	                    <?php if(is_array($list_data) || $list_data instanceof \think\Collection || $list_data instanceof \think\Paginator): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data1): $mod = ($i % 2 );++$i;if($data1['pid'] == $data['id']): ?> <a href="#"><?php echo htmlentities($data1['title']); ?></a> <?php endif; ?>
  	                    <?php endforeach; endif; else: echo "" ;endif; ?>
  	                  </div>
  	                  <em></em> </div>
  	              </div>
  	            <?php endif; ?>
  	          <?php endforeach; endif; else: echo "" ;endif; ?>
  	        </div>
  	      </div>
  	    </div>
  	  </div>
  	  
  	</div>
  	
  	<div class="col-sm-6 table-striped">
  	  <table cellpadding="0" cellspacing="1">
  	    <!-- 表头 -->
  	    <thead>
  	      <tr>
  	        <th width="150"><a href="<?php echo U('add',['rule_id'=>$rule_id]); ?>">+添加菜单</a></th>
  	        <th>内容</th>
  	        <th width="100">操作</th>
  	      </tr>
  	    </thead>
  	    
  	    <!-- 列表 -->
  	    <tbody>
  	      <?php if(is_array($list_data) || $list_data instanceof \think\Collection || $list_data instanceof \think\Paginator): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
  	        <tr> 
  	          <td><input class="ids" type="hidden" value="<?php echo htmlentities((isset($data['id']) && ($data['id'] !== '')?$data['id']:0)); ?>" name="ids[]">
  	            <?php if($data['pid'] == '0'): ?> <strong><?php echo htmlentities($data['title']); ?></strong>
  	              <?php else: ?>
  	              &nbsp;&nbsp;&nbsp;&nbsp; ◆ <?php echo htmlentities($data['title']); ?> <?php endif; ?></td>
  	              <td><?php echo $data['content']; ?></td>
  	          <td><a href="<?php echo U('add',['id'=>$data['id'],'rule_id'=>$rule_id]); ?>">编辑</a> <a href="<?php echo U('del',array('id'=>$data['id'])); ?>">删除</a></td>
  	        </tr>
  	      <?php endforeach; endif; else: echo "" ;endif; ?>
  	    </tbody>
  	  </table>
  	</div>
  </div>

</div>
<div class="form-item form_bh" style="margin:20px;">
	<div class="offset-sm-1">
		<button class=" submit-btn btn btn-primary ajax-post confirm" type="button" target-form="ids" url="<?php echo U('send_menu',['rule_id'=>$rule_id]); ?>"><?php echo htmlentities((isset($submit_name) && ($submit_name !== '')?$submit_name:'发布')); ?></button>
	</div>
  
</div>
<script type="text/javascript">
$(function(){

	//初始化菜单样式
	$('.m_a').each(function(index, element) {
       var submenu = $(element).find('.sub_menu');
	   if(submenu.find('a').html()==undefined){
		  $(element).find('img').hide();
		  submenu.hide();
	   }else{
		   var mW = $(element).width();
		   var sW = submenu.width()+10+2;
		   submenu.css('margin-left',(mW-sW)/2);
	   }
    });
	$('.m_a').hover(function(){
		$(this).find('.sub_menu').animate({'bottom':58},300);
	},function(){
		$(this).find('.sub_menu').animate({'bottom':-458},300);
	})

})
</script> </section>
  </div>



      <!-- 底部 -->
      <div class="wrap bottom" style="background:#fff; border-top:#ddd;">
    <p class="copyright">本系统由<a href="https://www.weiphp.cn" target="_blank">WeiPHP</a>强力驱动</p>
</div>

<script type="text/javascript">

(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "__APP__", //当前项目地址
		"PUBLIC" : "", //项目公共目录地址
		"DEEP"   : "<?php echo config("pathinfo_depr"); ?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo config("URL_MODEL"); ?>", "<?php echo config("URL_CASE_INSENSITIVE"); ?>", "<?php echo config("URL_HTML_SUFFIX"); ?>"],
		"VAR"    : ["<?php echo config("VAR_MODULE"); ?>", "<?php echo config("VAR_CONTROLLER"); ?>", "<?php echo config("VAR_ACTION"); ?>"]
	}
})();
</script>

<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook("pageFooter", "widget"); ?>
<div style="display:none"><?php echo $tongji_code; ?></div>


    </div>
    



</div>

	<!-- /主体 -->

	
     <!-- 用于加载js代码 -->
    <div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
        
    </div>
  <!-- /底部 -->
  
  <script>
    // 判断一下侧边栏是否存在 
    $(function() {
      if(!$('.user-info-name').length > 0) {
        // 不存在
        $('.main_body').removeClass('admin-body')
      }
    })
  </script>
</body>
</html>
