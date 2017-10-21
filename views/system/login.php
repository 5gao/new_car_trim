<!DOCTYPE html>
<html>
	<head>
		<base href="../static/">
		<meta charset="utf-8" />
		<title>酷刻视频广告系统登录</title>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div class="toolbar">
			<h1 class="logo"><a href="index.html"></a></h1>
		</div>
		<div class="login-wrap">
			<div class="left-tit">
				<h2>酷刻视频广告系统</h2>
				<p>版本号：v  1.0.0.0</p>				
			</div>
			<div class="login-form">
				<p class="error"></p>
				<p>					
					<input class="ipt" id="userId" type="text" placeholder="请输入用户名或邮箱" value="">
					<span class="icon icon_1"></span>
				</p>
				<p>					
					<input class="ipt" id="password" type="password" placeholder="请输入密码" value="">
					<span class="icon icon_2"></span>
				</p>					
				<!--<div class="login-num">
					<p><input class="ipt" id="code" type="text" placeholder="请输入验证码" value=""></p>
					<span class="img-num"><img src="images/yzm.jpg" alt="点击换一张"  title="看不清楚，换一张" ></span>
				</div>-->
				<div class="login-state">
					<label class="fl"><input type="checkbox" ><span>记住密码</span></label>
				<!--	<label class="fr"><input type="checkbox" ><span>自动登录</span></label>-->
				</div>
				<!--登录按钮-->
				<div class="login-btn">
					<a class="loginBtn" href="javascript:;" >登录</a>    <!--href="index.html"-->  
				</div>
			</div>			
		</div>		
	</body>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jQuery.md5.js"></script>
	<script src="js/base.js"></script>
	<script src="js/login.js"></script>
	
</html>
