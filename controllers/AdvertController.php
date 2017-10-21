<?php

namespace app\controllers;

use Yii;
use app\models\AdvertForm;
use app\models\AdvertSearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * AdvertController implements the CRUD actions for AdvertForm model.
 */
class AdvertController extends PowerController
{
    public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AdvertForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $nav_data = [];
        $nav_id = Yii::$app->request->get('nav');
        if($nav_id){
            $nav_data = $this->getSecondNav($nav_id);
        }

        $_nav = '';

        $searchModel = new AdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'nav_data' => $nav_data,
            '_nav' => $_nav,
        ]);
    }

    /**
     * Displays a single AdvertForm model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AdvertForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $data = [];
        $model = new AdvertForm();

        $data = Yii::$app->request->post();

        $post_data = $data['AdvertForm'];

        $post_data['advert_group'] = implode('-', $post_data['advert_group']);
        $post_data['advert_user'] = 1;

        $data['AdvertForm'] = $post_data;
        var_dump($data);
        $load = $model->load($data);
        $save = $model->save();

        var_dump(UploadedFile::getInstance($model, 'img_url'));
        $models = new UploadForm();

        $models->imageFile = UploadedFile::getInstance($model, 'img_url');
        var_dump($models->imageFile);
        $models->upload();
        var_dump('11111111111111111111');
        var_dump($load);
        var_dump($save);
        die;
        if ($model->load($data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionTest(){
        $data = Yii::$app->request->post();
        $model = new AdvertForm();
        if($data){
            var_dump($data);
            var_dump($_FILES['img_url']);
            $file = $_FILES;
            var_dump($file);
            var_dump('-------------');
            var_dump(UploadedFile::getInstanceByName('img_url'));

            $models= new UploadForm();

            var_dump(UploadedFile::getInstance($model, 'img_url'));
            $models->imageFile= UploadedFile::getInstanceByName('img_url');
            $models->upload();

            $models->imageFile = $_FILES['img_url'];
            $models->upload();

            die;
        }
        return $this->render('test',['model'=>$model]);
    }
    public function actionTest2(){

        $model = new AdvertForm();

        return $this->render('test2',['model'=>$model]);
    }

    /**
     * Updates an existing AdvertForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AdvertForm model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AdvertForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdvertForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdvertForm::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpload()
    {
        var_dump($_FILES);
        var_dump($_FILES['file']['tmp_name']);
        var_dump(empty($_FILES['file']['tmp_name']));
        //die;
        if (!empty($_FILES['file']['tmp_name'])) {
            //echo json_encode(array('file_infor' => dirname(__FILE__)));exit;
            //$dirs = dirname(__FILE__);
            /* 设定上传目录 */
            //var_dump('--------------------------------');
            //$uploads_dir = getcwd() . 'imguploads';
            $uploads_dir = Yii::$app->params['uploadPath'];

            $uploads_dir = str_replace("\\","/",$uploads_dir);
            //var_dump($uploads_dir);die;
//            chdir($uploads_dir);//转换新地址为当前目录,测试完关闭，不然无法正常上传
//            getcwd()  //打印出新目录的绝对地址
            /* 检测上传目录是否存在 */
            if (!is_dir($uploads_dir) || !is_writeable($uploads_dir)) {
                if (!mkdir($uploads_dir, 0777)) {
                    echo json_encode(array('file_infor' => "mkdir error"));
                    exit;
                }
            }
            /* 设置允许上传文件的类型 */
            $allow_type = array("image/jpg", "image/jpeg", "image/png", "image/pjpeg", "image/gif", "image/bmp", "image/x-png");
            $get_img_type = $_FILES['file']['type'];
            if (!in_array($get_img_type, $allow_type)) {
                echo json_encode(array('file_infor' => "图片格式不对，请重新上传!"));
                exit;
            }
            /* 设置文件名为"日期_文件名" */
            date_default_timezone_set('PRC');
            $newName = date("YmdHis") . "_" . $_FILES['file']['name'];
            //$img_path = 'advertImg'. '/' . $newName;
            $path = $uploads_dir . '/' . $newName;
            /* 移动上传文件到指定文件夹 */
            $state = move_uploaded_file($_FILES['file']['tmp_name'], $path);
            $imgsrc = 'img/uploads/' . $newName;
            if ($state) {
                $message = "文件上传成功!";
                $message .= "文件名：" . $newName . "";
                $message .= "大小：" . ( round($_FILES['file']['size'] / 1024, 2) ) . " KB";
            } else {
                /* 处理错误信息 */
                switch ($_FILES['file']['error']) {
                    case 1 : $message = "上传文件大小超出 php.ini:upload_max_filesize 限制";break;
                    case 2 : $message = "上传文件大小超出 MAX_FILE_SIZE 限制";break;
                    case 3 : $message = "文件仅被部分上传";break;
                    case 4 : $message = "没有文件被上传";break;
                    case 5 : $message = "找不到临时文件夹";break;
                    case 6 : $message = "文件写入失败";break;
                }
            }
            echo json_encode(array('file_infor' => $message, 'imgsrc' => $imgsrc));
            exit;
        } else {
            echo json_encode(array('file_infor' => 'false'));
        }
    }
}
