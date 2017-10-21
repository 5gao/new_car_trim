<?php

namespace app\controllers;

use app\models\EntryForm;
use app\models\system;
use Yii;
use Custom;
//use app\models\System;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UploadForm;
use yii\web\UploadedFile;

class SystemController extends PowerController
{
//    public $enableCsrfValidation = false;

    public function actionIndex()
    {

        $data =[
            ['id'=>1222,'name'=>'2132','company'=>'34343','username'=>'343','contact'=>'3434534','phone'=>'13595553393','email'=>'4646546','address'=>'3432432','created_time'=>'3424'],

        ];
        return $this->render('index',[
            'data'=>$data
        ]);
    }

    /**
     * @description 用户列表
     * @return string
     */
    public function actionUserList()
    {

        $data = [];
        $sql = 'SELECT id,name,company,username,contact,phone,email,address,FROM_UNIXTIME(created_time) AS created_time FROM a_user ';
        $result = Yii::$app->db->createCommand($sql)
            ->queryAll();

        if($result){
            $data = $result;
        }

        return $this->renderPartial('userlist',[
            'data'=>$data
        ]);
    }
    public function actionUserAdd()
    {

        return $this->renderPartial('userAdd');
    }
    /**
     * @错误信息
     */
    public function actionError($error){
        echo \Yii::$app->view->renderFile('@app/views/system/error.php',['error' =>$error]);die;
    }

    /**
     * @description  string 用户添加
     * @return bool
     * @throws \yii\db\Exception
     */
    public function actionUserDataAdd()
    {

        $request = yii::$app->request;
        $data = $request->post();

        $password = isset($data['password']) ? $data['password'] : '';
        $re_password = isset($data['re_password']) ? $data['re_password'] : '';
        $username = isset($data['username']) ? trim($data['username']) : '';
        $time = time();

        if(!$password || !$re_password){
            return $this->redirect(['system/error','error'=>"账号密码不能为空,请重新输入"]);
        }else if(trim($password) != trim($re_password)){
            return $this->redirect(['system/error','error'=>"密码不一致,请重新输入"]);
        }

        if(!$username){
            return $this->redirect(['system/error','error'=>"账号密码不能为空,请重新输入"]);
        }

        $model = new system();
        //查看用户是否存在
        $isAddUser = $model->isAddUser($username);

        if($isAddUser){
            return $this->redirect(['system/error','error'=>"账号已存在！"]);
        }
        //密码加密
        $salt = md5($time);
        $password = $model->addSalt($password,$salt);
        if(!$password) {
            return $this->redirect(['system/error','error'=>"密码不正确"]);
        }

        $insert = Yii::$app->db->createCommand()->insert('a_user', [
            'username'     => $username,
            'name'          => $username,
            'password'     => $password,
            'salt'          => $salt,
            'contact'       => isset($data['contact']) ? trim($data['contact']) : '',
            'agent_name'   => isset($data['name']) ? trim($data['name']) : '',
            'phone'         => isset($data['phone']) ? trim($data['phone']) : '',
            'email'         => isset($data['email']) ? trim($data['email']) : '',
            'company'       => isset($data['company']) ? trim($data['company']) : '',
            'address'       => isset($data['address']) ? trim($data['address']) : '',
            'created_time' => $time,
            'updated_time' => $time,
        ])->execute();

        if ($insert) {
            return $this->redirect(['system/user-list']);
        }else{
            return $this->redirect(['system/user-add']);
        }

    }
    /**
     * @判断是否登录
     */
    public function actionIsLogin() {


        $cookies= Yii::$app->request->cookies;
        if(!$cookies->has('name')) {

            $this->actionLoginout();
        }
        $userInfo = $cookies->getValue('name');
        $model = new system();

        $nav = $model->nav($userInfo['role']);

        $data = [];
        $data['userInfo'] = $userInfo;
        $data['nav'] = $nav;

        $array['resultcode'] = '000000';
        $array['resultinfo'] = '用户已登录';
        $array['row'] = $data;

        echo json_encode($array);
    }

    /**
     * @description string 用户编辑
     * @return string
     *
     */
    public function actionUserEdit()
    {
        $data = [];
        return $this->renderPartial('userEdit',[
            'data'=>$data
        ]);
    }

    /**
     * @descripion string 用户详情
     * @return string
     */
    public function actionUserDesc()
    {
        $data = [];
        return $this->renderPartial('userEdit',[
            'data'=>$data
        ]);
    }
    public function actionResourceList()
    {

        $data =[
            ['id'=>1,'name'=>'5告','company'=>'智享','username'=>'5告','contact'=>'5告','phone'=>'13595553393','email'=>'123557@qq.com','address'=>'北京市朝阳区','created_time'=>'2017-06-12'],
            ['id'=>2,'name'=>'5告1','company'=>'智享','username'=>'5告','contact'=>'5告','phone'=>'13595553393','email'=>'123557@qq.com','address'=>'北京市朝阳区','created_time'=>'2017-06-12'],
            ['id'=>1,'name'=>'5告2','company'=>'智享','username'=>'5告','contact'=>'5告','phone'=>'13595553393','email'=>'123557@qq.com','address'=>'北京市朝阳区','created_time'=>'2017-06-12']
        ];

        return $this->renderPartial('userList',[
            'data'=>$data
        ]);
    }

    /**
     * 登录
     * @return string
     */
    public function actionLogin()
    {
        return $this->renderPartial('login');
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            var_dump(Yii::$app->request->post());
            var_dump(UploadedFile::getInstance($model, 'imageFile'));
            //die;
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            var_dump($model->imageFile);
            if ($model->upload()) {
                // 文件上传成功
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
    public function actionUpd()
    {
        return $this->renderPartial('upload');
    }
}