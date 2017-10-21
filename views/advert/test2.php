<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告列表';
$this->params['breadcrumbs'][] = ['label' => '广告管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>



<!--        <div class="col-sm-9  col-md-10 col-md-offset-2 main">-->
            <ol class="breadcrumb">
                <li class="active">系统管理</li>
                <li class="active">账号管理</li>
                <li class="active">添加管理员</li>
            </ol>

            <form class="form-horizontal" method="post" action="<?php echo Url::toRoute(['advert/test']); ?>" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">管理员名称</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="请输入管理员名称">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company" class="col-sm-2 control-label">公司</label>
                    <div class="col-sm-10">
                        <input type="text" name="company" class="form-control" id="company" placeholder="请输入公司名称">
                    </div>
                </div>

                <div class="form-group">
                    <label for="img_url" class="col-sm-2 control-label">图片</label>
                    <div class="col-sm-10">
                        <input type="file" onchange="upload()"  name="img_url" class="form-control" id="file" >
                    </div>
                </div>

                <hr>
                <input id="fileupload" type="file" name="image" multiple>

                <!--<input type="file" name="pstimg" id="pstimg"/>
                <img src="" id="loc_img" />-->
                <input type="submit" name="提交">
            </form>

<!--        </div>-->


<script src="../../static/js/jquery-1.9.1.min.js"></script>
<script src="../../static/js/bootstrap-datetimepicker.js"></script>
<script src="../../static/js/sidebar-menu.js"></script>
<!--<script src="../../static/js/index.js"></script>-->
<!--<script src="../../static/js/jquery/jquery.ui.widget.js"></script>
<script src="../../static/js/jquery/jquery.iframe-transport.js"></script>
<script src="../../static/js/jquery/jquery.fileupload.js"></script>-->
<!--<script>
    $(function () {
        $('#fileupload').fileupload({

            dataType: 'json',
            url: GetoldUrl()+'r=product/get-ajax',
            success: function (json) {
                console.log(json);
                $('#MemType_zmt_pic').attr('value',json.upfile.file);
                $("#images").attr('src',json.upfile.file);
            }
        });
        function GetoldUrl(){
            //var oldUrl="http://api.wefi.com.cn/Homeadmin/web/?";
            var host =  window.location.host;

            //var oldUrl = "http://" + host + "/web/index.php?";
            var oldUrl = "http://" + host + "/web/?";
            return oldUrl;
        }
    });


</script>-->
<script>
    $.sidebarMenu($('.sidebar-menu'))
    $("#startTime").datetimepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        minView: "month",
        todayBtn: true
    });
    $("#endTime").datetimepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        minView: "month",
        todayBtn: true
    });
    $(function(){

    })
    function upload(){

        var windowURL = window.URL || window.webkitURL;
        var loadImg = windowURL.createObjectURL(document.getElementById('file').files[0]);
        //console.log(loadImg);

        $(".fileInputContainer").css("background-image","url"+"("+loadImg+")");

        var fileObj = document.getElementById("file").files[0]; // js 获取文件对象
        var FileController = GetoldUrl()+'r=advert/upload';           // 接收上传文件的后台地址
        //var FileController = "/api/file/update.do";           // 测试用   sdk
        // FormData 对象Ajax
        var form = new FormData();
        form.append("file", fileObj);
        var xhr = new XMLHttpRequest();
        if(!fileObj){
            return;
        }

        xhr.open("post", FileController, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && /^2\d{2}$/.test(xhr.status)) {
                var str = eval('(' + xhr.responseText + ')');//->接收后台返回的JSON格式的字符串的数据
                //console.log(str);
                if(parseInt(str.status) ==0){
                    alert('数据导入失败');
                }else if(parseInt(str.status) !=1){
                    alert('系统发生错误');
                }else {
                    console.log(str);

                    var img = str.data.url;
                    console.log(img);
                    $('#img').val(img);
                }

            }
        };
        xhr.onload = function () {

            // alert("上传完成!");

        };
//        xhr.upload.addEventListener("progress", progressFunction, false);
        xhr.send(form);

    }
    function GetoldUrl(){
        //var oldUrl="http://api.wefi.com.cn/Homeadmin/web/?";
        var host =  window.location.host;

        //var oldUrl="http://" + host + "/web/index.php?";
        var oldUrl="http://" + host + "/web/?";
        return oldUrl;
    }



</script>
