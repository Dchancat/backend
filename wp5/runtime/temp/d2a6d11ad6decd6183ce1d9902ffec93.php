<?php /*a:4:{s:85:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/home/view/user/login.html";i:1555383687;s:86:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/head.html";i:1555383687;s:88:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/footer.html";i:1555383687;s:85:"/www/wwwroot/hm.5lazy.cn/tpblog/tp5/backend/wp5/application/common/view/base/var.html";i:1555383687;}*/ ?>
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
<body id="login-admin">

  <!-- 主体 -->
    <div id="main-container" class="container" style="position:relative">
     

        <div class="no_side_main_body">
              <div class="top_content">
                  <div class="log_wrap">
                      <section class="login_box" style="width:520px;">
                  <?php  if(config('IS_QRCODE_LOGIN')){  ?>
                        <div class=login_code style="text-align: center;">
                            <p style="color: #0a8cd2">微信扫码登录</p>
                            <img style='width:200px;height:200px;margin:20px 0;' alt="扫码登录" src="<?php echo htmlentities($qrcode); ?>"><br>
                            <a href='javascript:;' onclick='one_login()'>帐号密码登录</a>
                          </div>
                  <?php  }  ?>
                          <form class="login-form" action="<?php echo U('login',['wpid'=>0]); ?>" method="post" style="display:<?php if(config('IS_QRCODE_LOGIN')) echo 'none'; ?> ">
                                  <div class="form_body" id="input_login" >
                                        <h6>欢迎使用WeiPHP系统</h6>
                                        <div class="input_panel">
                                          <div class="control-group">
                                              <label class="control-label" for="inputEmail">用户名</label>
                                            <div class="controls">
                                                <i class="fa fa-user"></i>
                                              <input type="text" id="inputEmail" class="span3" placeholder="请输入用户名"  ajaxurl="/user/checkUserNameUnique.html" errormsg="请填写1-16位用户名" nullmsg="请填写用户名" datatype="*1-16" value="" name="username">
                                            </div>
                                          </div>
                                          <div class="control-group">
                                              <label class="control-label" for="inputPassword">密码</label>

                                            <div class="controls">
                                                <i class="fa fa-key"></i>
                                              <input type="password" id="inputPassword"  class="span3" placeholder="请输入密码"  errormsg="密码为6-20位" nullmsg="请填写密码" datatype="*6-20" name="password">
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <div class="controls pl-2" style="padding: 0 !important;">
                                              <input class="align-middle" type="checkbox" id="remember" name="remember" value="1" style="height:14px;width:14px;margin-top:3px;margin-left:100px;"/><label class="ml-1 align-middle" for="remember" style="margin-bottom: 0;color:black;">下次自动登录</label>

                                                <?php  if(config('IS_QRCODE_LOGIN')){  ?>
                                                <a href='javascript:;' onclick='code_login()' style="position:absolute;top:2px;margin-left:100px;">扫码登录</a>
                                                <?php  }  ?>
                                            </div>
                                          </div>
                                          <?php if(config('WEB_SITE_VERIFY')) {  ?>
                                          <div class="control-group">
                                            <label class="control-label" for="inputPassword">验证码</label>
                                            <div class="controls">
                                               <span class="fa fa-keyboard-o"></span>
                                              <input type="text" id="verify" class="span3" placeholder="请输入验证码"  errormsg="请填写5位验证码" nullmsg="请填写验证码" datatype="*5-5" name="verify">
                                              <a href="javascript:;" class="reloadverify_a" style="right:0;">换一张?</a>
                                            </div>
                                          </div>

                                          <?php  }  ?>
                                       </div>
                                      <?php if(config('WEB_SITE_VERIFY')) {  ?>

                                      <div class="control-group">
                                        <label class="control-label"></label>
                                        <div class="controls" style="margin-top:10px">
                                            <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo captcha_src(); ?>" style="width:300px;cursor:pointer;">
                                        </div>
                                      </div>
                                      <?php  }  ?>

                                      <div class="control-group">
                                        <div class="controls">
                                          <button type="submit" class="btn btn-large">登 录</button>
                                         </div>
                                          <div class="controls Validform_checktip text-warning"></div>
                                      </div>
                                  </div>
                               </form>

                        </section>
                    </div>
                </div>
        </div>
    </div>

  <!-- /主体 -->

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



    
    
        <script type="text/javascript">
          var check_even;
          function check_login(){
            check_even = setInterval(function(){
              $.post(
                '<?php echo U("login"); ?>',{},
                function(res){
                    if(res.status==1){
                        window.location.href = res.url;
                    }else if(res.status==2){
                        clearTimeout(check_even);
                        $('.login_bind').show();
                        $('.login_ewm').hide();
                        $('#login_uid').val(res.login_uid);
                    }

                }
              );
            },3000);
          }
          <?php  if(config('IS_QRCODE_LOGIN')){  ?>
          check_login();
          <?php  }  ?>
          function code_login(){
            check_login();
            $('.login-form').hide();
            $('.login_code').show();
          }
          function one_login(){
            clearInterval(check_even);
            $('.login_code').hide();
            $('.login-form').show();
          }
            $(document)
              .ajaxStart(function(){
                $("button:submit").addClass("log-in").attr("disabled", true);
              })
              .ajaxStop(function(){
                $("button:submit").removeClass("log-in").attr("disabled", false);
              });


            $("form").submit(function(){
              var self = $(this);
              $.post(self.attr("action"), self.serialize(), success, "json");
              return false;

              function success(data){
                if(data.code){
                  window.location.href = data.url;
                } else {
                  self.find(".Validform_checktip").text(data.msg);
                  //刷新验证码
                  $(".reloadverify").click();
                }
              }
            });

          $(function(){
            var verifyimg = $(".verifyimg").attr("src");
                  $(".reloadverify,.reloadverify_a").click(function(){
                      if( verifyimg.indexOf('?')>0){
                          $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
                      }else{
                          $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                      }
                  });
            $('input').focus(function(){
              $(this).parent().find('.fa').css('color','#44b549');
              })
            $('input').blur(function(){
              $(this).parent().find('.fa').css('color','#aaa');
              })
          });

        </script>
     <!-- 用于加载js代码 -->
    <div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
        
    </div>    
  <!-- /底部 -->
</body>
</html>

