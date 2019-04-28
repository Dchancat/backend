<?php /*a:7:{s:92:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/weixin/view/custom_menu/add.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/common.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/head.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/header.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/_nav.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/footer.html";i:1555383687;s:85:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/var.html";i:1555383687;}*/ ?>
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
    <div class="tab-content">
      <!-- 表单 -->
      <form id="form" action="<?php echo U('add'); ?>" method="post" class="form-horizontal form-center">
        <div class="form-group row cf toggle-pid">
          <label class="col-sm-2"> 一级菜单 </label>
          <div class="col-sm-8">
            <select name="pid" style="margin-left: 0">
              <option value="0">无 </option>
              <?php if(!(empty($pList) || (($pList instanceof \think\Collection || $pList instanceof \think\Paginator ) && $pList->isEmpty()))): if(is_array($pList) || $pList instanceof \think\Collection || $pList instanceof \think\Paginator): $i = 0; $__LIST__ = $pList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                  <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['title']); ?> </option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              <?php endif; ?>
            </select>
            <span class="form-text text-muted"> （如果是一级菜单，选择“无”即可） </span>
          </div>
        </div>
        <div class="form-group row cf toggle-title">
          <label class="col-sm-2"><span class="need_flag">*</span> 菜单名 </label>
          <div class="col-sm-8">
            <input class="text input-large" name="title" value="<?php echo initValue('title', $data); ?>" type="text">
          </div>
        </div>
        <div class="form-group row cf toggle-from">
          <label class="col-sm-2"> 菜单内容 <span class="form-text text-muted"> </span></label>
          <div class="col-sm-8">

            <div class="check-item">
              <input class="regular-radio choose_from" value="1" id="from_1" name="from"  checked="" type="radio">
              <label for="from_1"></label>
              发送素材内容 </div>              
            <div class="check-item">
              <input class="regular-radio choose_from" value="2" id="from_2" name="from"  type="radio">
              <label for="from_2"></label>
              跳转到网页 </div>
            <!-- <div class="check-item">
              <input class="regular-radio choose_from" value="4" id="from_4" name="from"  type="radio">
              <label for="from_4"></label>
              跳转到小程序 </div>   -->            
            <div class="check-item">
              <input class="regular-radio choose_from" value="3" id="from_3" name="from"  type="radio">
              <label for="from_3"></label>
              自定义事件 </div>
            <div class="check-item" id="top_show">
              <input class="regular-radio choose_from" value="0" id="from_0" name="from"  type="radio">
              <label for="from_0"></label>
              无事件的一级菜单 </div>              
          </div>
        </div>
        
        <!--发送内容-->
        <div id="content_1" style="display: none;">
          <div class="form-group row cf">
            <label class="col-sm-2"><span class="need_flag">*</span> 选择素材 <span class="form-text text-muted"> </span></label>
            <div class="col-sm-8"> <?php echo W('common/material/material', ['name'=>'material','value'=>initValue('material',$data),'extra'=>'']); ?> </div>
          </div>
        </div>
        <!--跳转URL-->
        <div id="content_2" style="display: none;">
          <div class="form-group row cf">
            <label class="col-sm-2"><span class="need_flag">*</span> 关联URL <span class="form-text text-muted"> </span></label>
            <div class="col-sm-8">
              <input class="text input-large" name="url" value="<?php echo initValue('url', $data); ?>" type="text">
            </div>
           <!--  <p class="normal_tips" style="margin:0">为了方便移植,可以用以下特殊字符代替常用地址参数：<br>
              [website]: ' . SITE_URL . '<br>
              [publicid]: ' . get_pbid_appinfo('', 'id') . '<br>
              [wpid]: ' . get_wpid() . '<br>
              用法例如：微网站：[website]/?s=/addon/WeiSite/Wap/index/publicid/[publicid]</p> -->
          </div>
        </div>
        
        <!--自定义-->
        <div id="content_3" style="display: none;">
          <div class="form-group row cf toggle-type">
            <label class="col-sm-2"><span class="need_flag">*</span> 事件类型 <span class="form-text text-muted"> </span></label>
            <div class="col-sm-8">
              <div class="check-item">
                <input class="regular-radio" value="click" name="type" id="type_click" type="radio">
                <label for="type_click"></label>
                点击推事件 </div>
              <!-- <div class="check-item">
                <input class="regular-radio" value="scancode_push" name="type" id="type_scancode_push" type="radio">
                <label for="type_scancode_push"></label>
                扫码推事件 </div>
              <div class="check-item">
                <input class="regular-radio" value="scancode_waitmsg" name="type" id="type_scancode_waitmsg" type="radio">
                <label for="type_scancode_waitmsg"></label>
                扫码带提示 </div>
              <div class="check-item">
                <input class="regular-radio" value="pic_sysphoto" name="type" id="type_pic_sysphoto" type="radio">
                <label for="type_pic_sysphoto"></label>
                弹出系统拍照发图 </div>
              <div class="check-item">
                <input class="regular-radio" value="pic_photo_or_album" name="type" id="type_pic_photo_or_album" type="radio">
                <label for="type_pic_photo_or_album"></label>
                弹出拍照或者相册发图 </div>
              <div class="check-item">
                <input class="regular-radio" value="pic_weixin" name="type" id="type_pic_weixin" type="radio">
                <label for="type_pic_weixin"></label>
                弹出微信相册发图器 </div>
              <div class="check-item">
                <input class="regular-radio" value="location_select" name="type" id="type_location_select" type="radio">
                <label for="type_location_select"></label>
                弹出地理位置选择器 </div> -->
            </div>
          </div>
          <div class="form-group row cf">
            <label class="col-sm-2"><span class="need_flag">*</span> 关联关键词 <span class="form-text text-muted">(菜单KEY值，用于消息接口推送，不超过128字节)</span></label>
            <div class="col-sm-8">
              <input class="text input-large" name="keyword" value="<?php echo initValue('keyword', $data); ?>" type="text">
            </div>
          </div>
        </div>
        <!--小程序-->
        <div id="content_4" style="display: none;">
          <div class="form-group row cf">
            <label class="col-sm-2"><span class="need_flag">*</span> 小程序的appid <span class="form-text text-muted"> </span></label>
            <div class="col-sm-8">
              <input class="text input-large" name="appid" value="<?php echo initValue('appid', $data); ?>" type="text">
            </div>
          </div>
          <div class="form-group row cf">
            <label class="col-sm-2"><span class="need_flag">*</span> 小程序的页面路径 <span class="form-text text-muted"> </span></label>
            <div class="col-sm-8">
              <input class="text input-large" name="pagepath" value="<?php echo initValue('pagepath', $data); ?>" type="text">
            </div>
          </div> 
          <div class="form-group row cf">
            <label class="col-sm-2"><span class="need_flag">*</span> 备用URL <span class="form-text text-muted">不支持小程序的老版本客户端将打开本url</span></label>
            <div class="col-sm-8">
              <input class="text input-large" name="appurl" value="<?php echo initValue('appurl', $data); ?>" type="text">
            </div>
            <p class="normal_tips" style="margin:0">为了方便移植,可以用以下特殊字符代替常用地址参数：<br>
              [website]: ' . SITE_URL . '<br>
              [publicid]: ' . get_pbid_appinfo('', 'id') . '<br>
              [wpid]: ' . get_wpid() . '<br>
              用法例如：微网站：[website]/?s=/addon/WeiSite/Wap/index/publicid/[publicid]</p>
          </div>                   
        </div>        
        
        <input class="text" name="rule_id" value="<?php echo I('rule_id',0); ?>" type="hidden">
        <input class="text" name="id" value="<?php echo I('id',0); ?>" type="hidden">
        <div class="row">
          <div class="offset-sm-2 col-sm-4">
            <button class="btn submit-btn ajax-post" type="submit" target-form="form-horizontal"><?php echo htmlentities((isset($submit_name) && ($submit_name !== '')?$submit_name:'确 定')); ?></button>
          </div>
        </div>
      </form>
    </div>
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

$(function(){
	<?php if(isset($data['pid'])) {  ?>
	$("select[name='pid']").val(<?php echo htmlentities($data['pid']); ?>)
	<?php  }  if(isset($data['from'])) {  ?>
	$("input[name='from'][value='<?php echo htmlentities($data['from']); ?>']").prop("checked",true)
	<?php  }  if(isset($data['type'])) {  ?>
	$("input[name='type'][value='<?php echo htmlentities($data['type']); ?>']").prop("checked",true)
	<?php  }  ?>
			
	$('.choose_from').click(function(){
		choose_from();
	});
	choose_from();
	
	$('select[name="pid"]').change(function(){
		choose_top();
	});
	choose_top();
});

function choose_from(){ 
	var from = $("input[name='from']:checked").val();
	console.log('from:'+from)
	$('#content_1').hide();
	$('#content_2').hide();
	$('#content_3').hide();
	$('#content_4').hide();
	$('#content_'+from).show();
}
function choose_top(){ 
	var pid = $('select[name="pid"]').val();

	if(pid==0){
		$("#top_show").show()
	}else{
		$("#top_show").hide()
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
