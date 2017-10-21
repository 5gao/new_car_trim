$(function(){

    var	Url=GetoldUrl();
    isLogin();

    function isLogin(){
        $.ajax({
            url: Url+'r=system/is-login',
            type: 'GET',
            //url: sUrl,
            //type: 'POST',
            //data:{username:userId.val(),password:psswd},
            dataType: 'json',

            success: function(res) {

                if(res.resultcode == 000000){
                    var data = res.row;
                    var userInfo = data['userInfo'];
                    var nav = data['nav'];

                    //用户昵称
                    $('#nickname').html(userInfo.name);
                     var html = '';
                    //用户导航
                    for (var i=0; i<nav.length; i++) {

                        html += '<li><a href="?r=' + nav[i]["url"] + '&nav='+ nav[i]["resource_id"] +'"> <i class="fa fa-share"></i> <span>'+nav[i]["resource_name"]+'</span> <i class="fa fa-angle-left pull-right"></i> </a>';

                        var second_nav = nav[i]['nav_second'];
                        if(second_nav){
                            html +='<ul class="sidebar-submenu menu-open" style="display: block;">';


                            for (var j=0; j<second_nav.length; j++) {
                                var second_nav_info = second_nav[j];
                                html += '<li><a href="?r=' + second_nav_info["url"] + '"><i class="fa fa-circle-o"></i>';
                                html += second_nav_info['resource_name'];
                                html += '<i class="fa fa-angle-left pull-right"></i></a></li>';

                            }

                            html+='</ul>>';
                        }

                        html += '</li>';
                    }
                    $('#nav').html(html);
                    //console.log(html);
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
    function GetoldUrl(){
        //var oldUrl="http://api.wefi.com.cn/Homeadmin/web/?";
        var host =  window.location.host;

        //var oldUrl = "http://" + host + "/web/index.php?";
        var oldUrl = "http://" + host + "/web/?";
        return oldUrl;
    };


});