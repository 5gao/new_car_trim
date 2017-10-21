<?php
namespace app\Controllers;
use app\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class ProductController extends Controller{
    public $enableCsrfValidation = false;
    /**
     * get ajax uploaded files.
     */
    public function actionGetAjax(){
        var_dump('-----------------');die;

        $model=new Attachment();//加载附件模型


        $tmpFile  = UploadedFile::getInstanceByName('image');//读取图像上传域,并使用系统上传组件上传
        $Directroy = Yii::$app->params['uploadPath'];//读取上传配置文件,我的配置是/uploads
        //创建文件存放路径
        $y     = date('Y');
        $m     = date('m');
        $d     = date('d');
        $Directroy = $Directroy."/";
        $pathd = $Directroy.$y."/".$m."/".$d."/";
        Tool::makedir(dirname(Yii::app()->BasePath).$pathd); //创建文件夹,此处一定要加上dirname(Yii::app()->BasePath)不然可能会出错;
        if(is_object($tmpFile) && get_class($tmpFile)==='CUploadedFile'){
            $filename        = time().rand(0,9);
            $ext          = $tmpFile->extensionName;//上传文件的扩展名
            if($ext=='jpg'||$ext=='gif'||$ext=='png'){
                $big          = $pathd . $filename . '_600.' . $ext; //310缩略图
                $small         = $pathd . $filename . '_310.' . $ext; //310缩略图
                $thumb         = $pathd . $filename . '_100.' . $ext; //100缩略图
                $model->zat_thumb    = $thumb; //缩略图
            }
            $uploadfile       = $pathd . $filename . '.' . $ext;   //保存的路径
            $model->zat_url     = $pathd . $filename . '.' . $ext;   //重新赋值
            $model->zat_file_name  = $filename . '.' . $ext;        //文件名称
            $model->zat_title    = $tmpFile->name;            //文件标题
            $model->zat_file_type  = $tmpFile->type;            //文件类型
            $model->zat_file_size  = $tmpFile->size;            //文件大小
            $model->zat_image    = 2;
            $model->zat_ip     = Yii::app()->request->userHostAddress; //上传IP
            //print_r($uploadfile);
        }
        if($model->save()){
            $tmpFile->saveAs(dirname(Yii::app()->BasePath).$uploadfile);//保存到服务器
            if($ext=='jpg'||$ext=='gif'||$ext=='png'){
                $img = Yii::app()->image->load(dirname(Yii::app()->BasePath).$uploadfile); //使用image-Kohana图像处理库扩展
                $img->resize(600,600)->quality(85);
                $img->save(dirname(Yii::app()->BasePath).$big);//生成600缩略图
                $img->resize(310,310)->quality(85);
                $img->save(dirname(Yii::app()->BasePath).$small);//生成310缩略图
                $img->resize(100,100)->quality(85);
                $img->save(dirname(Yii::app()->BasePath).$thumb);//生成100缩略图
            }
            if($ext=='jpg'||$ext=='gif'||$ext=='png'){
                $str = json_encode(
                    array(
                        'upfile'=>array(
                            'zat_id' => Yii::app()->db->getLastInsertID(), //取插ID
                            'file' => $uploadfile,//原图
                            'small' => $small,//310缩略图
                            'thumb' => $thumb,//100缩略图
                        )
                    )
                );
            }else{
                $str = json_encode(
                    array(
                        'upfile'=>array(
                            'zat_id' => Yii::app()->db->getLastInsertID(),
                            'file' => $uploadfile,
                        )
                    )
                );
            }
            echo $str;
        }
    }
}

