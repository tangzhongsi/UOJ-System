<?php
	requirePHPLib('form');
	
	$forgot_form = new UOJForm('forgot');
	$forgot_form->addInput('username', 'text', '学号', '',
		function($username, &$vdata) {
			if (!validateUsername($username)) {
				return '学号不合法';
			}
			$vdata['user'] = queryUser($username);
			if (!$vdata['user']) {
				return '该用户不存在';
			}
			return '';
		},
		null
	);
	$forgot_form->handle = function(&$vdata) {
		$user = $vdata['user'];
		$password = $user["password"];
		
		$oj_name = UOJConfig::$data['profile']['oj-name'];
		$oj_name_short = UOJConfig::$data['profile']['oj-name-short'];
		$sufs = base64url_encode($user['username'] . "." . md5($user['username'] . "+" . $password));
		$url = HTML::url("/reset-password", array('params' => array('p' => $sufs)));
		$html = <<<EOD
<base target="_blank" />

<p>{$user['username']}您好，</p>
<p>您刚刚启用了{$oj_name_short}密码找回功能，请进入下面的链接重设您的密码：</p>
<p><a href="$url">$url</a></p>
<p>{$oj_name}</p>

<style type="text/css">
body{font-size:14px;font-family:arial,verdana,sans-serif;line-height:1.666;padding:0;margin:0;overflow:auto;white-space:normal;word-wrap:break-word;min-height:100px}
pre {white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word}
</style>
EOD;
		
		$mailer = UOJMail::noreply();
		$mailer->addAddress($user['email'], $user['username']);
		$mailer->Subject = $oj_name_short."密码找回";
		$mailer->msgHTML($html);
		if (!$mailer->send()) {  
			error_log($mailer->ErrorInfo);
			becomeMsgPage('<div class="text-center"><h2>'.$mailer->ErrorInfo. '<span class="glyphicon glyphicon-remove"></span></h2></div>');
		} else {
			becomeMsgPage('<div class="text-center" style="padding-top: 50px;"><h2>邮件已发送至 '.$user['username'].'@zju.edu.cn <span class="glyphicon glyphicon-ok"></span></h2></div>');
		}
	};
	$forgot_form->submit_button_config['align'] = 'offset';
	
	$forgot_form->runAtServer();
?>
<?php echoUOJPageHeader('找回密码') ?>
<h2 class="page-header">找回密码</h2>
<!-- <h4>请输入需要找回密码的学号：</h4> -->
<?php $forgot_form->printHTML(); ?>
<?php echoUOJPageFooter() ?>
