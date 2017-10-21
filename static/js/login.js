 $(function(){ 
 	if(isIE()){
 		alert("为了数据正常显示，建议您使用谷歌/火狐/搜狗等浏览器");
 	}
	var	Url=GetoldUrl();
     //console.log(Url);
        //Url +="index.php";
        // 登录验证  
        $(".loginBtn").click(function(){  
           // 做表单输入校验  
            var userId = $("#userId");  
            var password = $("#password");  
            var msg = "";             
            if ($.trim(userId.val()) == ""){  
                msg = "用户名不能为空！";  
                userId.focus();  
            }else if ($.trim(password.val()) == ""){  
                msg = "密码不能为空！";  
                password.focus();             
			}
            if (msg != ""){  
                $(".error").html(msg);  
            }else{
                //var psswd=$.md5(password.val());
                var psswd=password.val();

                var sUrl = Url+'r=login/validate';

                $.ajax({
                    //url: Url+'r=system/validate&username='+userId.val()+'&password='+psswd,
                    //type: 'GET',
                    url: sUrl,
                    type: 'POST',
                    data:{username:userId.val(),password:psswd},
                    dataType: 'json',

                    success: function(res) {
                        if(res.resultcode == 000000){
                        $(".error").html("登录成功，跳转中...");
                        //window.setInterval(function() {
                        window.location.href=Url+"r=system/index";
                        //},1000);
                        }else if(res.resultcode == '2E0001'){
                            $(".error").html("用户名不存在,请重新输入");
                        }else{
                            $(".error").html("用户名或密码输入有误,请重新输入");
                        }
                    },
                    error: function(er) {
                         $(".error").html(er);
                    }
   				});

            }  
              
        });            
        // 为document绑定onkeydown事件监听是否按了回车键  
        $(document).keydown(function(event){  
            if (event.keyCode === 13){ // 按了回车键  
                $(".loginBtn").trigger("click");  
            }  
        });  
    });  