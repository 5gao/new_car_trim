<?php
use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告列表';
/*$this->params['breadcrumbs'][] = ['label' => '广告管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/

?>

<style type="text/css">

    .Load{
        display: none;
    }
    .cur{
        display: block;
    }
    #banner{
        position: absolute;
        height:600px;

    }
    #banner img{
        width:1050px;
        height:600px;

    }
    #banner_right, #banner_left{background:#00b3ee;width:50px;height:50px;line-height:50px;text-align:center;font-size:40px;color:#fff;position:absolute;top:45%;}
    #banner_left{left:-60px;}
    #banner_right{right:-60px;}

    #bannerbox:hover #banner_left{left:0px;opacity:1}
    #bannerbox:hover #banner_right{right:0px;opacity:1}

    #banner_dot{position:absolute;width:100%;text-align:center;z-index:999;bottom:60px;}
    #banner_dot a{display:inline-block;margin:0px 5px;height:12px;width:12px;line-height:1000px;overflow:hidden;background:url(../../static/img/index_229.png) no-repeat;}
    #banner_dot a.cur{background:url(../../static/img/index_228.png) no-repeat}




</style>
<div id="banner">
    <ul style="list-style-type:none">
        <li class="Load cur" style="z-index:99">
            <img src="../../static/img/banner2016.jpg" alt="">

        </li>
        <li class="Load">
            <img src="../../static/img/banner02.jpg" alt="">

        </li>
        <li class="Load">
            <img src="../../static/img/03.jpg" alt="">

        </li>
        <li class="Load">
            <img src="../../static/img/03.jpg" alt="">

        </li>
    </ul>
    <div id="banner_left"><</div>
    <div id="banner_right">></div>
    <div id="banner_dot"><a href="javascript:;" class="cur">1</a><a href="javascript:;">2</a><a href="javascript:;">3</a><a href="javascript:;">4</a></div>

</div>


<script type="text/javascript">


    $(function(){
        var boxli,boxleng,cur, boxbot;

        boxli = $("#banner li");
        boxbot = $("#banner_dot a");
        boxleng = boxli.length;
        var i = 0;
        setInterval(function(){

            if(i >= boxleng){
                i = 0;
            }
            banner_box(i);
            banner_dot(i);
            i += 1;

        },3000);
        $("#banner_left").click(function(){
            if(i >0){
                i--;
            }else{
                i = boxleng - 1;
            }

            banner_box(i);
            banner_dot(i);

        });
        $("#banner_right").click(function(){

            if(i < boxleng - 1){
                i++;
            }else{
                i = 0;
            }

            banner_box(i);
            banner_dot(i);

        });
        boxbot.click(function(){
            i = $(this).text() - 1;
            banner_box(i);
            banner_dot(i);

        });
        function banner_box(i){
            boxli.removeClass('cur').eq(i).addClass('cur');
        }
        function banner_dot(i){
            boxbot.removeClass('cur').eq(i).addClass('cur');
        }


    })
</script>


<!--轮播图-->
<script type="text/javascript" >
    $(function(){

        var i,left,right,box,boxli,boxleng,width,dot,first,last,IsAuto;

        i = 0;

        left = $(".Homeleft");

        right = $(".Homeright");

        box = $(".Homebanner ul");

        boxli = $(".Homebanner li");

        dotbox = $(".Homedot");

        dot = $(".Homedot").find("a");

        width = boxli.width();

        boxleng = boxli.length;

        box.css({width:width*(boxleng)})

        boxli.css({width:width});

        dot.eq(0).addClass("cur");

        boxli.eq(0).addClass("cur");

        boxli.each(function(index) {
            zindex = boxleng-(index+1);
            $(this).css({"z-index":zindex})
        });

        IsAuto = true;

        left.click(function(){
            if(box.is(":animated")){return}
            i--;
            if(i<0){i=boxleng-1};
            boxanimate();

        })

        right.click(function(){
            if(box.is(":animated")){return}
            i++;
            boxanimate();
        })

        function boxanimate(){
            if(i>boxleng-1){i=0}
            boxli.addClass("cur1");
            setTimeout(function(){
                boxli.removeClass("cur1");
                boxli.removeClass("cur").eq(i).addClass("cur");
                boxli.stop().animate({opacity:0,"z-index":"1"},500).eq(i).stop().animate({opacity:1,"z-index":boxleng},500);
                bannerdot(i)
            },400)
        }

        function bannerdot(i){
            if(i>boxleng-1){i=0}
            dot.removeClass("cur").eq(i).addClass("cur");
        }

        dot.click(function(){
            i = $(this).index();
            bannerdot(i);
            boxanimate(i);
        })

        setInterval(function(){
            if(IsAuto){
                i++;
                boxanimate();
                bannerdot(i)
            }
        },3000)

        box.hover(function(){
            IsAuto = false;
        },function(){
            IsAuto = true;
        })

        dotbox.hover(function(){
            IsAuto = false;
        },function(){
            IsAuto = true;
        })

        left.hover(function(){
            IsAuto = false;
        },function(){
            IsAuto = true;
        })

        right.hover(function(){
            IsAuto = false;
        },function(){
            IsAuto = true;
        })



    })
</script>

