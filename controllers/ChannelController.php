<?php

namespace app\controllers;

use app\models\EntryForm;
use app\models\system;
use Yii;
//use Custom;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ChannelController extends PowerController
{
//    public $enableCsrfValidation = false;

    public function actionIndex()
    {

        $data = [];
        return $this->renderPartial('index',[
            'data'=>$data
        ]);
    }

    /**
     * @description 用户列表
     * @return string
     */
    public function actionChannelList()
    {

        /*$data =[
            ['id'=>1,'name'=>'5告','company'=>'智享','username'=>'5告','contact'=>'5告','phone'=>'13595553393','email'=>'123557@qq.com','address'=>'北京市朝阳区','created_time'=>'2017-06-12'],
            ['id'=>2,'name'=>'5告1','company'=>'智享','username'=>'5告','contact'=>'5告','phone'=>'13595553393','email'=>'123557@qq.com','address'=>'北京市朝阳区','created_time'=>'2017-06-12'],
            ['id'=>1,'name'=>'5告2','company'=>'智享','username'=>'5告','contact'=>'5告','phone'=>'13595553393','email'=>'123557@qq.com','address'=>'北京市朝阳区','created_time'=>'2017-06-12']
        ];*/
        $data = [];
        //$params = [':username' => trim($username)];
        //var_dump($params);die;
        $result = Yii::$app->db->createCommand('SELECT id,name,company,username,contact,phone,email,address,FROM_UNIXTIME(created_time) AS created_time FROM a_user ')
            ->queryAll();

        if($result){
            $data = $result;
        }

        //var_dump($data);die;
        return $this->renderPartial('channelList',[
            'data'=>$data
        ]);
    }
    /**
     * @description 普通渠道列表
     * @return string
     */
    public function actionChannelCommonList()
    {

        $data = [];
        //$params = [':username' => trim($username)];
        //var_dump($params);die;
        $result = Yii::$app->db->createCommand('SELECT id,name,company,username,contact,phone,email,address,FROM_UNIXTIME(created_time) AS created_time FROM a_user ')
            ->queryAll();

        if($result){
            $data = $result;
        }

        //var_dump($data);die;
        return $this->renderPartial('channelCommon',[
            'data'=>$data
        ]);
    }
    public function actionChannelAdd()
    {
        //var_dump('2345464656');die;
        return $this->renderPartial('channelAdd');
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
    public function actioncChannelDataAdd()
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
     * @description string 用户编辑
     * @return string
     *
     */
    public function actionChannelEdit()
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
    public function actionChannelDesc()
    {
        $data = [];
        return $this->renderPartial('userEdit',[
            'data'=>$data
        ]);
    }

}