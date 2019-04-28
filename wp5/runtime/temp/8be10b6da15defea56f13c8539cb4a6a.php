<?php /*a:6:{s:90:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/weixin/view/publics/lists.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/common.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/head.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/header.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/footer.html";i:1555383687;s:85:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/var.html";i:1555383687;}*/ ?>
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
      
<div class="wrap" style="clear:both; margin:30px auto;">
  <section class="tab-content" id="contents"> 
    <!-- 数据列表 -->
    <div style="overflow:hidden; zoom:1;">
      <h3 style=" float:left;margin-bottom:15px;"><img style="vertical-align:middle; height:30px" src="/weixin/images/weixin.png"/> 我的公众号</h3>
      <div style="margin:0 0 15px 0; float:right"> <a class="btn" href="<?php echo U('step_0'); ?>">+新增公众号</a> </div>
    </div>
    
    <div class="data-table" style="margin:0;"> <?php if(!(empty($list_data[0]) || (($list_data[0] instanceof \think\Collection || $list_data[0] instanceof \think\Paginator ) && $list_data[0]->isEmpty()))): ?>
      <div class="table-striped">
        <table cellspacing="1">
          <!-- 表头 -->
          <thead>
            <tr>
              <th width="8%">公众号ID</th>
              <th  width="32%">公众号名称</th>
              <th  width="15%">原始ID</th>
              <th  width="15%">AppID</th>
              <th  width="45%">操作</th>
            </tr>
          </thead>
          
          <!-- 列表 -->
          <tbody>
          <?php if(is_array($list_data[0]) || $list_data[0] instanceof \think\Collection || $list_data[0] instanceof \think\Paginator): $i = 0; $__LIST__ = $list_data[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
          
          <tr>
            <td><?php echo htmlentities((isset($data['id']) && ($data['id'] !== '')?$data['id']:0)); ?></td>
            <td><?php echo htmlentities($data['public_name']); ?></td>
            <td><?php echo htmlentities($data['public_id']); ?></td>
            <td><?php echo htmlentities($data['appid']); ?></td>
            <td><a href="<?php echo U('weixin/wecome/config',array('pbid'=>$data['id'])); ?>" target="_self">公众号基础功能</a>&nbsp;&nbsp;&nbsp;
              <a href="<?php echo U('weixin/Publics/payment_set',array('pbid'=>$data['id'])); ?>" target="_self">微信支付配置</a>&nbsp;&nbsp;&nbsp;
            <a href="<?php echo U('weixin/Publics/check_res',array('id'=>$data['id'],'pbid'=>$data['id'])); ?>" target="_self">自动检测</a>&nbsp;&nbsp;&nbsp;
              <?php if(!config('PUBLIC_BIND') || !$data['is_bind']) {  ?><a href="<?php echo U('step_0',array('id'=>$data['id'],'pbid'=>$data['id'])); ?>" target="_self">编辑</a>&nbsp;&nbsp;&nbsp;<?php  }  ?> <a href="javascript:;" onclick="do_del('<?php echo htmlentities((isset($data['id']) && ($data['id'] !== '')?$data['id']:0)); ?>','<?php echo htmlentities($data['public_name']); ?>')" ><?php if($data['is_bind'] == '1'): ?>取消绑定<?php else: ?>删除<?php endif; ?></a></td>
          </tr>
          <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          
        </table>
      </div>
      <?php else: ?>
      <div style="padding:100px; text-align:center;"><img style="vertical-align:middle;" src="/weixin/images/weixin.png"/> 你还没有创建公众号</div>
      <?php endif; ?> </div>
  </section>
  
  <section class="tab-content" id="contents"> 
    <!-- 数据列表 -->
    <div style="overflow:hidden; zoom:1;">
      <h3 style=" float:left;margin-bottom:15px;"><img style="vertical-align:middle; height:30px" src="/weixin/images/weixin.png"/> 我的小程序</h3>
      <div style="margin:0 0 15px 0; float:right"> <a class="btn" href="<?php echo U('step_miniapp_0'); ?>">+新增小程序</a> </div>
    </div>
    <div class="data-table" style="margin:0;"> <?php if(!(empty($list_data[1]) || (($list_data[1] instanceof \think\Collection || $list_data[1] instanceof \think\Paginator ) && $list_data[1]->isEmpty()))): ?>
      <div class="table-striped">
        <table cellspacing="1">
          <!-- 表头 -->
          <thead>
            <tr>
              <th width="8%">小程序ID</th>
              <th  width="32%">小程序名称</th>
              <th  width="15%">原始ID</th>
              <th  width="15%">AppID</th>
              
              <!--<th  width="10%">管理员数</th>-->
              <th  width="45%">操作</th>
            </tr>
          </thead>
          
          <!-- 列表 -->
          <tbody>
          
          <?php if(is_array($list_data[1]) || $list_data[1] instanceof \think\Collection || $list_data[1] instanceof \think\Paginator): $i = 0; $__LIST__ = $list_data[1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
          <tr>
            <td><?php echo htmlentities((isset($data['id']) && ($data['id'] !== '')?$data['id']:0)); ?></td>
            <td><?php echo htmlentities($data['public_name']); ?></td>
            <td><?php echo htmlentities($data['public_id']); ?></td>
            <td><?php echo htmlentities($data['appid']); ?></td>
            <td><a href="<?php echo U('weixin/publics/step_miniapp_1',array('pbid'=>$data['id'])); ?>" target="_self">小程序端配置</a>&nbsp;&nbsp;&nbsp;
              <a href="<?php echo U('weixin/Publics/payment_set',array('pbid'=>$data['id'])); ?>" target="_self">微信支付配置</a>&nbsp;&nbsp;&nbsp;
              <a href="<?php echo U('weixin/Publics/check_res',array('id'=>$data['id'],'pbid'=>$data['id'])); ?>" target="_self">自动检测</a>&nbsp;&nbsp;&nbsp;
              <?php if(!config('PUBLIC_BIND') || !$data['is_bind']) {  ?><a href="<?php echo U('step_miniapp_0',array('id'=>$data['id'],'pbid'=>$data['id'])); ?>" target="_self">编辑</a>&nbsp;&nbsp;&nbsp;<?php  }  ?> <a href="javascript:;" onclick="do_del('<?php echo htmlentities((isset($data['id']) && ($data['id'] !== '')?$data['id']:0)); ?>','<?php echo htmlentities($data['public_name']); ?>')" ><?php if($data['is_bind'] == '1'): ?>取消绑定<?php else: ?>删除<?php endif; ?></a></td>
          </tr>
          <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          
        </table>
      </div>
      <?php else: ?>
      <div style="padding:100px; text-align:center;"><img style="vertical-align:middle;" src="/weixin/images/weixin.png"/> 你还没有创建小程序</div>
      <?php endif; ?> </div>
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
//搜索功能
function do_del(id,name){
	var msg='您确定要 取消绑定 以下公众号吗？  '+name;
	if(confirm(msg)){
		var url="<?php echo U('del'); ?>";
// 		alert(url);
		$.post(url,{'id':id},function(){
			location.reload();
		});
	}
}
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
