<?php

namespace app\controllers;

use Yii;
//use Custom;
use yii\web\Controller;
use app\models\system;
//use app\models\LoginForm;
//use app\models\ContactForm;
//use app\models\TQUser;
//use app\models\TQUR;
//use app\models\TQRole;
//use app\models\TQRP;
//use app\models\TWGoods;
    /**
    * @登录验证
    */
class LoginController extends Controller
{
    public $enableCsrfValidation = false;

    /**
    * @登录页
    */
    public function actionLogin() {
        echo \Yii::$app->view->renderFile('@app/views/admin/login.php');die;
    }
    /**
    * @验证用户名密码
    */
    public function actionValidate() {

        $request = yii::$app->request;

        $username = $request->post('username');
        $password = $request->post('password');

        $model = new system();
        $isUser = $model->isUser($username);
        if(!$isUser){
            return $this->redirect(['system/error','error'=>"用户不存在或密码错误"]);
        }

        $salt = $isUser['salt'];

        $password = $model -> addSalt($password, $salt);
        $userInfo = $model -> login($username, $password);

        $data = [];
        if($userInfo){
            $data = $userInfo;
        }

        //var_dump($data);die;
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
        'name' => 'name',
        'value' => $data,
        'expire' => time() + 86400
        ]));
        $array['resultcode'] = '000000';
        $array['resultinfo'] = '登录成功';
        $array['row'] = $data;
        echo json_encode($array);
    }
    /**
    * @登录成功跳转首页
    */
    public function actionIndex(){
        $cookies= Yii::$app->request->cookies;
        if($cookies->has('name'))
        $cookieValue = $cookies->getValue('name');
        switch ($cookieValue['r_id'])
        {
        case 6://一级渠道商
            return $this->redirect(['admin/channeldetail']);
        break;
        
        case 7://二级渠道商
            return $this->redirect(['admin/channeldetail2']);
        break;
        
        case 8://三级渠道商
            return $this->redirect(['admin/channeldetail3']);
        case 1://超级管理员
            return $this->redirect(['admin/channellist']);
        break;
        
        default:
          
        }
    }
    /**
    * @清除cookie，退出
    */
    public function actionLoginOut() {
       yii::$app->response->cookies->remove('name');
       return $this->redirect(['system/login']);
    }


    /**
     * @添加用户
     */
    public function actionRegister()
    {

        $goods=TWGoods::find()->asArray()->all();
        //print_r($goods);exit;
        return $this->renderPartial('register',[
            'goods'=>$goods
        ]);
    }
}