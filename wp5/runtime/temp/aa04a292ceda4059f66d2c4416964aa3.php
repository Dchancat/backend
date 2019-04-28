<?php /*a:7:{s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/config.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/common.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/head.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/header.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/_nav.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/footer.html";i:1555383687;s:85:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/var.html";i:1555383687;}*/ ?>
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
    <section id="contents">
        <?php  if(is_array($nav) && count($nav)>1) {  ?>
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
            
            <form action="<?php echo U('config'); ?>" class="form-horizontal" method="post">
                <?php if(empty($custom_config) || (($custom_config instanceof \think\Collection || $custom_config instanceof \think\Paginator ) && $custom_config->isEmpty())): if(is_array($fields) || $fields instanceof \think\Collection || $fields instanceof \think\Paginator): if( count($fields)==0 ) : echo "" ;else: foreach($fields as $o_key=>$form): ?>
                <div class="form-group row">
                    <?php if($form['type']!='hidden'): ?>
                    <label class="col-sm-2 col-form-label">
                        <?php echo htmlentities((isset($form['title']) && ($form['title'] !== '')?$form['title']:'')); if(isset($form['tip'])): ?>
                         <?php endif; ?>
                    </label>
                    <?php endif; switch($form['type']): case "text": ?>
                    <div class="col-sm-8">
                        <input type="text" name="<?php echo htmlentities($o_key); ?>" class="text input-large" value="<?php echo htmlentities($form['value']); ?>">
                        <?php if(!(empty($form['remark']) || (($form['remark'] instanceof \think\Collection || $form['remark'] instanceof \think\Paginator ) && $form['remark']->isEmpty()))): ?><span class="form-text text-muted">（<?php echo htmlentities($form['remark']); ?>）</span><?php endif; ?>
                    </div>
                    <?php break; case "password": ?>
                    <div class="col-sm-8">
                        <input type="password" name="<?php echo htmlentities($o_key); ?>" class="text input-large" value="<?php echo htmlentities($form['value']); ?>">
                        <?php if(!(empty($form['remark']) || (($form['remark'] instanceof \think\Collection || $form['remark'] instanceof \think\Paginator ) && $form['remark']->isEmpty()))): ?><span class="form-text text-muted">（<?php echo htmlentities($form['remark']); ?>）</span><?php endif; ?>
                    </div>
                    <?php break; case "hidden": ?>
                    <input type="hidden" name="<?php echo htmlentities($o_key); ?>" value="<?php echo htmlentities($form['value']); ?>"> <?php break; case "radio": ?>
                    <div class="col-sm-8">
                        <?php if(is_array($form['options']) || $form['options'] instanceof \think\Collection || $form['options'] instanceof \think\Paginator): if( count($form['options'])==0 ) : echo "" ;else: foreach($form['options'] as $opt_k=>$opt): ?>
                        <label class="radio">
                            <input type="radio" name="<?php echo htmlentities($o_key); ?>" value="<?php echo htmlentities($opt_k); ?>" <?php if($form['value'] == $opt_k): ?> checked<?php endif; ?>><?php echo htmlentities($opt); ?>
                        </label>
                        <?php endforeach; endif; else: echo "" ;endif; if(!(empty($form['remark']) || (($form['remark'] instanceof \think\Collection || $form['remark'] instanceof \think\Paginator ) && $form['remark']->isEmpty()))): ?><span class="form-text text-muted">（<?php echo htmlentities($form['remark']); ?>）</span><?php endif; ?>
                    </div>
                    <?php break; case "checkbox": ?>
                    <div class="col-sm-8">
                        <?php if(is_array($form['options']) || $form['options'] instanceof \think\Collection || $form['options'] instanceof \think\Paginator): if( count($form['options'])==0 ) : echo "" ;else: foreach($form['options'] as $opt_k=>$opt): ?>
                        <label class="checkbox">
                            <?php  is_null($form["value"]) && $form["value"] = [];  ?>
                            <input type="checkbox" name="<?php echo htmlentities($o_key); ?>[]" value="<?php echo htmlentities($opt_k); ?>" <?php if(in_array(($opt_k), is_array($form['value'])?$form['value']:explode(',',$form['value']))): ?> checked<?php endif; ?>><?php echo htmlentities($opt); ?>
                        </label>
                        <?php endforeach; endif; else: echo "" ;endif; if(!(empty($form['remark']) || (($form['remark'] instanceof \think\Collection || $form['remark'] instanceof \think\Paginator ) && $form['remark']->isEmpty()))): ?><span class="form-text text-muted">（<?php echo htmlentities($form['remark']); ?>）</span><?php endif; ?>
                    </div>
                    <?php break; case "select": ?>
                    <div class="col-sm-8">
                        <select name="<?php echo htmlentities($o_key); ?>">
                            <?php if(is_array($form['options']) || $form['options'] instanceof \think\Collection || $form['options'] instanceof \think\Paginator): if( count($form['options'])==0 ) : echo "" ;else: foreach($form['options'] as $opt_k=>$opt): ?>
                            <option value="<?php echo htmlentities($opt_k); ?>" <?php if($form['value'] == $opt_k): ?> selected<?php endif; ?>><?php echo htmlentities($opt); ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <?php if(!(empty($form['remark']) || (($form['remark'] instanceof \think\Collection || $form['remark'] instanceof \think\Paginator ) && $form['remark']->isEmpty()))): ?><span class="form-text text-muted">（<?php echo htmlentities($form['remark']); ?>）</span><?php endif; ?>
                    </div>
                    <?php break; case "material": ?>
                    <div id="material_<?php echo htmlentities($o_key); ?>"></div>
                    <!-- W('common/material/material', array('name'=>$o_key,'value'=>$form['value'],'extra'=>$field['extra'])-->
                    <?php echo W('common/material/material', array('name'=>$o_key,'value'=>$form['value'],'extra'=>isset($field['extra'])?$field['extra']:'')); break; case "editor": ?>
                    <label class="textarea">
                        <textarea name="<?php echo htmlentities($o_key); ?>"><?php echo htmlentities($form['value']); ?></textarea>
                        <?php echo W('common/editor/adminArticleEdit', array('name'=>$o_key,'value'=>$form['value'],'extra'=>isset($field['extra'])?$field['extra']:'')); ?>
                    </label>
                    <?php break; case "textarea": ?>
                    <div class="col-sm-8">
                        <label class="textarea input-large">
                            <textarea name="<?php echo htmlentities($o_key); ?>"><?php echo htmlentities($form['value']); ?></textarea>
                        </label>
                        <?php if(!(empty($form['remark']) || (($form['remark'] instanceof \think\Collection || $form['remark'] instanceof \think\Paginator ) && $form['remark']->isEmpty()))): ?><span class="form-text text-muted">（<?php echo htmlentities($form['remark']); ?>）</span><?php endif; ?>
                    </div>
                    <?php break; case "picture": ?>
                    <div class="col-sm-8">
                        <div class="uploadrow2" data-max="1" title="点击修改图片" rel="<?php echo htmlentities($o_key); ?>">
                            <input type="file" id="upload_picture_<?php echo htmlentities($o_key); ?>">
                            <input type="hidden" name="<?php echo htmlentities($o_key); ?>" id="cover_id_<?php echo htmlentities($o_key); ?>" value="<?php echo htmlentities($form['value']); ?>" />
                            <div class="upload-img-box">
                                <?php if(!(empty($form['value']) || (($form['value'] instanceof \think\Collection || $form['value'] instanceof \think\Paginator ) && $form['value']->isEmpty()))): ?>
                                <div class="upload-pre-item2"><img width="100" height="100" src="<?php echo htmlentities(get_cover_url($form['value'])); ?>" /></div>
                                <em class="edit_img_icon">&nbsp;</em> <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php break; case "file": ?>
                    <div class="col-sm-8 upload_file">
                        <input type="file" id="upload_file_<?php echo htmlentities($o_key); ?>">
                        <input type="hidden" name="<?php echo htmlentities($o_key); ?>" value="<?php echo htmlentities($form['value']); ?>" />
                        <div class="upload-img-box">
                            <?php if(isset($form['value'])): ?>
                            <div class="upload-pre-file"><span class="upload_icon_all"></span> <?php echo htmlentities(get_table_field($form['value'],'id','name','File')); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <script type="text/javascript">
                    //上传图片
                    /* 初始化上传插件 */
                    $("#upload_file_<?php echo htmlentities($o_key); ?>").uploadify({
                        "height": 30,
                        "swf": "/static/uploadify/uploadify.swf",
                        "fileObjName": "download",
                        "buttonText": "上传附件",
                        "uploader": "<?php echo U('home/File/upload',array('session_id'=>session_id())); ?>",
                        "width": 120,
                        'removeTimeout': 1,
                        "onUploadSuccess": uploadFile { $o_key }
                    });

                    function uploadFile { $o_key }(file, data) {
                        var data = $.parseJSON(data);
                        // 									console.log(data);
                        if (data.code) {
                            var name = "<?php echo htmlentities($o_key); ?>";
                            $("input[name='" + name + "']").val(data.id);
                            $("input[name='" + name + "']").parent().find('.upload-img-box').html(
                                "<div class=\"upload-pre-file\"><span class=\"upload_icon_all\"></span>" + data.name + "</div>"
                            );
                        } else {
                            updateAlert(data.msg);
                            setTimeout(function() {
                                $('#top-alert').find('button').click();
                                $(this).removeClass('disabled').prop('disabled', false);
                            }, 1500);
                        }
                    }
                    </script>
                    <?php break; ?> <?php endswitch; ?>
                    
                </div>
                <?php endforeach; endif; else: echo "" ;endif; else: if(isset($custom_config)): ?> <?php echo htmlentities($custom_config); ?> <?php endif; ?> <?php endif; ?>
                <div class="row">
                    <div class="offset-sm-2 col-sm-4" style="padding-left: 0">
                        <button type="submit" class="btn submit-btn ajax-post" target-form="form-horizontal" >确 定</button>
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

	
    
<script type="text/javascript" charset="utf-8">
$(function() {
    //初始化上传图片插件
    initUploadImg();
    initUploadFile();
    //支持tab
    showTab();
})
function playSound(id,obj){
    var audio = document.getElementById(id);
    if(audio.paused){
        audio.play();
        $(obj).find('img').attr('src','/static/base/images/icon_sound_play.gif');
        audio.addEventListener('ended', function () {
// 			alert('over');
            $(obj).find('img').attr('src','/static/base/images/icon_sound.png');
        }, false);
        return;
    }else{
        audio.pause();
        $(obj).find('img').attr('src','/static/base/images/icon_sound.png');
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
