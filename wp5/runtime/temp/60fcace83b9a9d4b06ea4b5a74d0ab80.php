<?php /*a:7:{s:102:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/material/view/material/material_lists.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/common.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/head.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/header.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/_nav.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/footer.html";i:1555383687;s:85:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/var.html";i:1555383687;}*/ ?>
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
      <div class="table-bar">
      	<div class="fl">
          <?php if(empty($model['extend']) || (($model['extend'] instanceof \think\Collection || $model['extend'] instanceof \think\Paginator ) && $model['extend']->isEmpty())): ?>
			<div class="tools">
				<?php if($add_button):  isset($add_url) || $add_url = U('add?model='.$model['id'], $get_param); ?><a class="btn" href="<?php echo htmlentities($add_url); ?>">新 增</a><?php endif; if(public_interface('material')) {  ?>
<!--                 <a class="btn" href="<?php echo U('syc_news_to_wechat'); ?>">一键上传素材到微信素材库</a> -->
				<a class="btn" href="javascript:;" onClick="$.WeiPHP.openSelectLists('<?php echo U('material/Material/material_data_choice',array('isAjax'=>1,'isRadio'=>0)); ?>',0,'选择图文素材',selectTextCallback,1)">选择图文上传到微信素材库</a>
                <a class="btn" href="<?php echo U('syc_news_from_wechat'); ?>">一键下载微信素材库到本地</a>
                 <?php  }  if(is_array($top_more_button) || $top_more_button instanceof \think\Collection || $top_more_button instanceof \think\Paginator): $i = 0; $__LIST__ = $top_more_button;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['is_buttion']): ?>
                <button class="btn <?php echo htmlentities($vo['class']); ?>" target-form="ids" url="<?php echo htmlentities($vo['url']); ?>"><?php echo htmlentities($vo['title']); ?></button>
                <?php else: ?>
                <a class="btn" href="<?php echo htmlentities($vo['url']); ?>"><?php echo htmlentities($vo['title']); ?></a>
                <?php endif; ?>
                &nbsp;
                <?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
          <?php endif; ?>
        </div>
        <div class="search-form fr cf">
          <div class="sleft">
            
            <?php empty($search_key) && isset($model['search_key']) && $search_key=$model['search_key'];empty($search_key) && $search_key='title';unset($get_param[$search_key]);!isset($placeholder)&&$placeholder='';  $search_url = U('material_lists', $get_param); ?>
            <input type="text" name="<?php echo htmlentities($search_key); ?>" class="search-input" value="<?php echo I($search_key); ?>" placeholder="请输入图文标题搜索">
            <a class="sch-btn" href="javascript:;" id="search" url="<?php echo htmlentities($search_url); ?>"><i class="btn-search"></i></a> </div>
        </div>
      </div>
      <!-- 数据列表 -->
      <div class="data-table">

        <div class="table-striped">
        	<ul class="material_list js-masonry"  data-masonry-options='{ "itemSelector": ".appmsg_li", "columWidth": 308 }'>
            <?php if(is_array($list_data) || $list_data instanceof \think\Collection || $list_data instanceof \think\Paginator): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(isset($vo['count']) && $vo['count']==1): ?>
            	<!-- 单图文 -->
                <li class="appmsg_li">
                	<div class="appmsg_item">
                        <h6 class="ellipsis"><?php echo htmlentities($vo['title']); ?></h6>
                        <p class="title"><?php echo htmlentities(time_format($vo['cTime'])); ?></p>
                        <div class="main_img">
                            <img src="<?php echo htmlentities(get_cover_url($vo['cover_id'])); ?>"/>
                        </div>
                        <p class="desc ellipsis"><?php echo htmlentities($vo['intro']); ?></p>
                    </div>
                    <div class="appmsg_action">
                    	<a href="<?php echo U('add_material', array('group_id'=>$vo['group_id'])); ?>">编辑</a>
                        <a href="<?php echo U('del_material_by_groupid', array('group_id'=>$vo['group_id'])); ?>" class="ajax-get">删除</a>
                    </div>
                </li>
                <?php else: ?>
                <!-- 多图文 -->
                <li class="appmsg_li">
                	<div class="appmsg_item">
                        <p class="title"><?php echo htmlentities(time_format($vo['cTime'])); ?></p>
                        <div class="main_img">
                            <img src="<?php echo htmlentities(get_cover_url($vo['cover_id'])); ?>"/>
                            <h6><?php echo htmlentities($vo['title']); ?></h6>
                        </div>
                        <p class="desc ellipsis"><?php echo htmlentities($vo['intro']); ?></p>
                    </div>
                    <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                    <div class="appmsg_sub_item">
                        <p class="title ellipsis"><?php echo htmlentities($vv['title']); ?></p>
                        <div class="main_img">
                            <img src="<?php echo htmlentities(get_cover_url($vv['cover_id'])); ?>"/>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <div class="appmsg_action">
                    	<a href="<?php echo U('add_material', array('group_id'=>$vo['group_id'])); ?>">编辑</a>
                        <a href="<?php echo U('del_material_by_groupid', array('group_id'=>$vo['group_id'])); ?>" class="ajax-get">删除</a>
                    </div>
                </li>
                <?php endif; ?>
            	<?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

        </div>
      </div>
      <div class="page"> <?php echo (isset($_page) && ($_page !== '')?$_page:''); ?> </div>
    </section>
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

	
    
  <script type="text/javascript">
  function selectTextCallback(_this) {
	  var url = "<?php echo U('choice_news_to_wechat'); ?>?is_jump=1&data="+JSON.stringify(_this);
	  window.open(url);  
// 	    $('.text_wrap').html(_this['content']).show();
// 	    $('.select_text').hide();
// 	    $('.showtext .delete').show();
// 	    $.Dialog.close();
// 	    setRes();
	}
$(function(){
	//搜索功能
    $("#search").click(function(){
        var url = $(this).attr('url');
        var str = $('.search-input').val()
        var query  = 'title='+str.replace(/(^\s*)|(\s*$)/g,"");
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
