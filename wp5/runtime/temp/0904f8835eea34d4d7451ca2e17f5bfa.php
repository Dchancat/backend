<?php /*a:7:{s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/weixin/view/message/add.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/common.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/head.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/header.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/_nav.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/footer.html";i:1555383687;s:85:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/var.html";i:1555383687;}*/ ?>
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
      
<style text='text/css'>
	.image_material{
	    border: 1px dashed #ddd;
	    width: 308px;
	    height: 196px;
	     background: #eee;
	    text-align: center;
	    color: #333;
	    display: block;
	    float: left;
		margin-left:10px;
	   display:none;
	   position:relative;
	}
	.image_material .select_image{line-height: 196px; display:block; height:200px;}
	.image_material .delete{ position:absolute; bottom:3px; left:3px; display:none}
	.appmsg_area{ position:relative;}
	.appmsg_area .delete{ position:absolute; bottom:10px; left:10px; z-index:1000; margin:10px;}
	.appmsg_area .select_video{  height: 240px;line-height: 240px;}
	.voice_wrap{ width:308px;}
	.video_wrap{ width:222px;}
	#video_area{ height:257px}
	.message_list form textarea, .message_list .appmsg_area {height: 205px}

	select{
	    margin:0;
	}
    .col-sm-1{
        min-width: 80px;
        padding-left: 0;
    }
    .form-group.row {
    	margin: 1rem 0;
    }
    .appmsg_area .select_appmsg {height: auto;}
</style>
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

      <div class="message_list" style="padding:10px;  text-align: left;color: #333;padding: 10px">
           <div class="msg_tab">
               <a class="txt current" href="javascript:;">文本消息</a>
                <a class="appmsg" href="javascript:;">图文消息</a>
                <a class="image" href="javascript:;">图片消息</a>
                <a class="voice" href="javascript:;">语音消息</a>
                <a class="video" href="javascript:;">视频消息</a>
            </div>
            <?php  isset($post_url) || $post_url = U('add?model='.$model['id'], $get_param); ?>
            <form id="form" action="<?php echo htmlentities($post_url); ?>" method="post" class="form-horizontal form-center">
                <input type="hidden" name="msg_type" value="text"/>
                <label class="textarea" style="position:relative; overflow:hidden; zoom:1;">
                	
                    <textarea name="content" placeholder="请输入要发送的文本"  id='message_text'></textarea>
                    <div style="display:none" class="appmsg_area" id="appmsg_area">
                        <input type="hidden" name="appmsg_id" value="0"/>
                        <a class="select_appmsg" href="javascript:;" onClick="$.WeiPHP.openSelectAppMsg('<?php echo U('material/Material/material_data',array('isAjax'=>'ajax','isRadio'=>1)); ?>',selectAppMsgCallback)">选择图文</a>
                        <div class="appmsg_wrap"></div>
                        <a class="delete" href="javascript:;" style="left: 310px;">删除</a>
                    </div>

                    <div style="display:none;margin:0 10px 10px 0; background:#ddd; padding:6px; width:930px;float:left" class="msg_image col-sm-8">
                    	<div class="uploadrow2" rel="image" title="点击修改图片" style="float:left; width:308px;">
                            <input type="file" id="upload_picture_image">
                            <input type="hidden" name="image" id="cover_id_image" value="0"/>
                            <div class="upload-img-box" style="display:none;">
                                <div class="upload-pre-item2"><img width="100" height="100" src=""/></div>
                            </div>
                        </div>
                        <div class='image_material' id='image_material'>
                            <input type="hidden" name="image_material" id="cover_id_image" value="0"/>
                            <a class="select_image" href="javascript:;"  onClick="$.WeiPHP.openSelectAppMsg('<?php echo U('material/Material/picture_data'); ?>',selectImageCallback,'选择图片素材')">从素材库选择图1</a>
                            <div class="image_wrap"></div>
                            <a class="delete" href="javascript:;" style="left: 15px;" >删除</a>
                         </div>
                    </div>

                     <div style="display:none" class="appmsg_area" id="voice_area">
                        <input type="hidden" name="voice_id" value="0"/>
                        <a class="select_appmsg" href="javascript:;" onClick="$.WeiPHP.openSelectAppMsg('<?php echo U('material/Material/voice_data'); ?>',selectVoiceCallback,'选择语音素材')">选择语音素材</a>
                        <div class="voice_wrap"></div>
                        <a class="delete" href="javascript:;" style="left: 310px;display: inline;">删除</a>
                    </div>
                      <div style="display:none" class="appmsg_area" id="video_area">
                        <input type="hidden" name="video_id" value="0"/>
                        <a class="select_appmsg select_video" href="javascript:;" onClick="$.WeiPHP.openSelectAppMsg('<?php echo U('material/Material/video_data'); ?>',selectVideoCallback,'选择视频素材')">选择视频素材</a>
                        <div class="video_wrap"></div>
                        <a class="delete" href="javascript:;"  style="left: 310px;">删除</a>
                    </div>
                 </label>
                 <a id="getText" class="txt_icon current" onClick="selectText();" style="cursor: pointer; color: #888;  border-radius: 5px; border: 1px solid #ccc;  padding: 5px 20px; background-color: #eee;">选择文本素材</a>

                 <div class="form-group row cf toggle-send_type">
                    <label class="col-sm-1"> 发送方式 </label>
                    <div class="col-sm-8">
                      <select name="send_type">
                        <option selected="" toggle-data="group_id@show,send_openids@hide" class="toggle-data" value="0">按用户组发送 </option>
                        <option toggle-data="group_id@hide,send_openids@show" class="toggle-data" value="1">指定OpenID发送 </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row cf toggle-group_id">
                        <label class="col-sm-1"> 群发对象 </label>
                        <div class="col-sm-8">
                          <div id="dynamic_select_group_id"></div>
                          <select name="group_id">
                            <option toggle-data="全部用户" class="toggle-data" value="0">全部用户</option>
                            <?php if(is_array($group_list) || $group_list instanceof \think\Collection || $group_list instanceof \think\Paginator): $i = 0; $__LIST__ = $group_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option toggle-data="" class="toggle-data" value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['title']); ?> </option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

                          </select>
                          <span class="form-text text-muted"> （全部用户或者某分组用户） </span>
                        </div>
                   </div>
                   <div class="form-group row cf toggle-send_openids" style="display: none;">
                       <div class="mt10 col-sm-1" style="padding-right: 0;margin-top: 0">指定的用户：<span id="send_openids" class="colorless"></span></div>
                      	           <br/>
                       <div class="col-sm-8">
                       <a class="border-btn" href="javascript:;" onClick="selectUser('send_openids')">选择指定的用户</a>
                       </div>
                       <br/>
                        <div style="display:none">
                            <label class="col-sm-1"> 要发送的OpenID </label>
                            <div class="col-sm-8">
                              <label class="textarea input-large">
                                <textarea name="send_openids"></textarea>
                              </label>
                              <span class="form-text text-muted"> （多个可用逗号或者换行分开，OpenID值可在微信用户的列表中找到） </span>
                            </div>
                        </div>
                   </div>

                  <div class="form-group row cf toggle-preview_openids">
                  		<div class="col-sm-1">预览人：<span id="preview_openids" class="colorless"></span></div>
                      	<div class="col-sm-8">
                      		<a class="border-btn" href="javascript:;" onClick="selectUser('preview_openids')">选择预览人</a>
                      	</div>
                        
                        <div style="display:none">
                            <label class="col-sm-1"> 预览人OPENID </label>
                            <div class="col-sm-8">
                              <label class="textarea input-large">
                                <textarea name="preview_openids" style="height:50px; min-height:50px;"></textarea>
                                <span class="form-text text-muted"> （选填，多个可用逗号或者换行分开，OpenID值可在微信用户的列表中找到） </span>
                              </label>
                            </div>
                        </div>
                   </div>
                  <div class="row">
                  	<div class="col-sm-10"><button onclick="preview()" class="border-btn submit-btn ajax-post mr-3" style="padding: 6px 30px;background-color: #0054a3;color: white;">预览</button>

                  		<button class="btn btn-primary ajax-post" id="submit1" type="button" target-form="form-horizontal">确认群发</button>
                  	</div>


                  </div>
            </form>
        </div>

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

	
    
  <link href="/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
   <?php if(config('COLOR_STYLE')=='blue_color') echo '
   <link href="/static/datetimepicker/css/datetimepicker_blue.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
    '; ?>
  <link href="/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/static/datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION; ?>" charset="UTF-8"></script>
  <script type="text/javascript">
  $('#submit1').click(function(){
		if(confirm("确定要群发消息？")){
			$(this).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
			$('#form').submit();
		}
	});

function preview(){
	if(confirm("确定要预览消息？")){
			var query = $('#form').serialize();
	  		$.post("<?php echo U('preview'); ?>",query,function(data){
			if (data.code==1) {
				  if (data.url) {
						updateAlert(data.msg + ' 页面即将自动跳转~','alert-success');
				  }else{
						updateAlert(data.msg ,'alert-success');
				  }
				  setTimeout(function(){
						if (data.url) {
							  location.href=data.url;
						}else{
							  location.reload();
						}
				  },1500);
			}else{
				  updateAlert(data.msg);
				  setTimeout(function(){
						if (data.url) {
							  location.href=data.url;
						}else{
							  $('#top-alert').find('button').click();
						}
				  },1500);
			}
	  	})
	}

}

$(function(){
	$('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:0,
        autoclose:true
    });
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });

	showTab();

	$('.toggle-data').each(function(){
		var data = $(this).attr('toggle-data');
		if(data=='') return true;

	     if($(this).is(":selected") || $(this).is(":checked")){
			 change_event(this)
		 }
	});

	$('select').change(function(){
		$('.toggle-data').each(function(){
			var data = $(this).attr('toggle-data');
			if(data=='') return true;

			 if($(this).is(":selected") || $(this).is(":checked")){
				 change_event(this)
			 }
		});
	});
});
$(function(){
	//初始化上传图片插件
	initUploadImg({width:308,height:200,callback:function(){
		$('.image_wrap').html('').hide();
		$('.select_image').show();
		$('.image_material .delete').hide();
		$('input[name="image_material"]').val(0);
	}});
	$('.uploadify-button').css('background-color','#ccc')
})
$('.msg_tab .txt').click(function(){
	//纯文本
	$(this).addClass('current').siblings().removeClass('current');
	$('input[name="msg_type"]').val('text');
	$('textarea[name="content"]').show().siblings().hide();
	$('#getText').show();
})
$('.msg_tab .appmsg').click(function(){
	//图文消息
	$(this).addClass('current').siblings().removeClass('current');
	$('input[name="msg_type"]').val('appmsg');
	$('#appmsg_area').show().siblings().hide();
	$('#getText').hide();
})
$('.msg_tab .image').click(function(){
	//图片消息
	$(this).addClass('current').siblings().removeClass('current');
	$('input[name="msg_type"]').val('image');
	$('.msg_image').show().siblings().hide();
	$('#getText').hide();
	$('#image_material').show();
})
$('.msg_tab .voice').click(function(){
	//图片消息
	$(this).addClass('current').siblings().removeClass('current');
	$('input[name="msg_type"]').val('voice');
	$('#voice_area').show().siblings().hide();
	$('#getText').hide();
	$('#image_material').hide();
})
$('.msg_tab .video').click(function(){
	//图片消息
	$(this).addClass('current').siblings().removeClass('current');
	$('input[name="msg_type"]').val('video');
	$('#video_area').show().siblings().hide();
	$('#getText').hide();
	$('#image_material').hide();
})

$('#appmsg_area .delete').click(function(){
	$('#appmsg_area .appmsg_wrap').html('').hide();
	$('#appmsg_area .select_appmsg').show();
	$('#appmsg_area .delete').hide();
	$('input[name="appmsg_id"]').val(0);
})
$('.image_material .delete').click(function(){
	$('.image_wrap').html('').hide();
	$('.select_image').show();
	$('.image_material .delete').hide();
	$('input[name="image_material"]').val(0);
})
$('#voice_area .delete').click(function(){
	$('#voice_area .voice_wrap').html('').hide();
	$('#voice_area .select_appmsg').show();
	$('#voice_area .delete').hide();
	$('input[name="voice"]').val(0);
})
$('#video_area .delete').click(function(){
	$('#video_area .video_wrap').html('').hide();
	$('#video_area .select_appmsg').show();
	$('#video_area .delete').hide();
	$('input[name="video"]').val(0);
})
function selectAppMsgCallback(_this){
	$('.appmsg_wrap').html($(_this).html()).show();
	$('#appmsg_area .select_appmsg').hide();
	$('#appmsg_area .delete').show();
	$('input[name="appmsg_id"]').val($(_this).data('group_id'));
	$.Dialog.close();
}
function selectImageCallback(_this){
	$('.image_wrap').html($(_this).html()).show();
	$('.select_image').hide();
	$('.image_material .delete').show();
	$('input[name="image_material"]').val($(_this).data('id'));
	$("input[name='image']").val(0);
	$('.upload-img-box').hide();
	$.Dialog.close();
}
function selectVoiceCallback(_this){
	$(_this).find('.icon_sound').attr('src',STATIC + '/base/images/icon_sound.png');
	$('.voice_wrap').html($(_this).html()).show();
	$('#voice_area .select_appmsg').hide();
	$('#voice_area .delete').show();
	$('input[name="voice_id"]').val($(_this).data('id'));
	$.Dialog.close();
}
function selectVideoCallback(_this){
	$('.video_wrap').html($(_this).html()).show();
	$('#video_area .select_appmsg').hide();
	$('#video_area .delete').show();
	$('input[name="video_id"]').val($(_this).data('id'));
	$.Dialog.close();
}
function selectText(){
	$.WeiPHP.openSelectLists("<?php echo U('material/Material/text_lists',array('isAjax'=>'ajax','isRadio'=>1)); ?>",1,'选择素材',function(data){
		if(data && data.length>0){
			for(var i=0;i<data.length;i++){
				var id=data[i]['id'];
				if(id){
					$.post("<?php echo U('material/Material/get_content_by_id'); ?>",{'id':id},function(d){
						$('#message_text').val(d);
					})
				}
			}
		}
	})
}
// function selectText(){
// 	$.WeiPHP.openSelectUsers("<?php echo U('material/Material/text_lists'); ?>",1,function(data){
// 		if(data && data.length>0){
// 			for(var i=0;i<data.length;i++){
// 				var id=data[i]['id'];
// 				if(id){
// 					$.post("<?php echo U('material/Material/get_content_by_id'); ?>",{'id':id},function(d){
// 						$('#message_text').text(d);
// 					})
// 				}
// 			}
// 		}
// 	})
// }
function selectUser(name){
	var seIds = $('textarea[name="'+name+'"]').val();
	var url = "<?php echo U ( 'weixin/UserCenter/lists',array('isAjax'=>'1','seIds'=>'xxx')); ?>";
	url = url.replace('xxx',seIds);
// 	url = url.replace('sss','1');
	$.WeiPHP.openSelectUsers(url,0,function(data){
		if(data && data.length>0){
			var idsArr  = new Array();
			var nameArr = new Array();
			for(var i=0;i<data.length;i++){
				idsArr.push(data[i].openid);
				nameArr.push(data[i].nickname);
			}
			$('textarea[name="'+name+'"]').val(idsArr.toString());
			$('#'+name).text(nameArr.toString());
		}else{
			$('textarea[name="'+name+'"]').val('');
			$('#'+name).text('');
		}
	})
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
