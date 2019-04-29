<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//require '../vendor/autoload.php';

function mailto($to,$title,$content)
{
    $mail = new PHPMailer(true);
    try{
	$mail->SMTPDebug = 0;
	$mail->isSMTP();
	$mail->Host= 'smtp.163.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'dchancat@163.com';
	$mail->Password = 'Chancat885208';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->CharSet = 'utf-8';

	//Recipients
	$mail->setFrom('dchancat@163.com','dchancat');
	$mail->addAddress($to);

	//Content
	$mail->isHTML(true);
	$mail->Subject = $title;
	$mail->Body = $content;
	
	return $mail->send();

    }catch(Exception $e){
	exception($mail->ErrorInfo());
    }
}

//把span替换成a
function replace($data)
{
    return str_replace('span','a',$data);
}

//把字符串转换为数组
function strtoArray($data)
{
    return explode('|',$data);
}
