<?php

namespace app\controllers;

use Yii;
use Custom;
use yii\web\Controller;
//use app\models\TQUser;
//use app\models\TQUR;
//use app\models\TQRole;
//use app\models\TQRP;

class PowerController extends Controller
{
    public function init(){
        $request = yii::$app->request;
        $name = $request->get('name');

        $r = $request->get('r');
        $cookies= Yii::$app->request->cookies;
        if(!$cookies->has('name')) {

            $this->actionLoginout();
        }
        $cookieValue = $cookies->getValue('name');

        /*$r_id=$cookieValue['r_id'];//获取职位id
        $connection  = Yii::$app->db;
        //$sql="select t_q_power.p_url from t_q_r_p inner join t_q_power on t_q_r_p.p_id=t_q_power.p_id where t_q_r_p.r_id = $r_id";
        $sql="SELECT * FROM a_user WHERE username=:username AND status = :status";

        $command = $connection->createCommand($sql);
        $posts = $command->queryAll();
        $power = array_column($posts, 'p_url');//合并拥有职位权限

        if ( !in_array($r, $power)) {
            $this->actionNoskip();
        }*/
    }
    //检测未登录,需重新登录
    public function actionLoginout(){
        echo \Yii::$app->view->renderFile('@app/views/system/login.php');die;
    }
    //角色不拥有操作权限
    public function actionNoskip(){
       echo \Yii::$app->view->renderFile('@app/views/admin/forbidden.php');die;
    }

    /**
     * 获取二级导航
     * @param $id
     * @return array
     */
    public function getSecondNav($id)
    {
        //获取用户信息
        $cookies= Yii::$app->request->cookies;
        if(!$cookies->has('name')) {

            $this->actionLoginout();
        }
        $userInfo = $cookies->getValue('name');

        $return = [];
        $sql = ' SELECT ro.name as role_name,re.id as resource_id, re.name as resource_name, re.level, re.resource_alias, re.parent_id, re.url, re.sort ';
        $sql .= ' FROM a_rule ru ';
        $sql .= ' LEFT JOIN a_role ro ON ro.role_id = ru.role_id ';
        $sql .= ' LEFT JOIN a_resource re ON re.id = ru.resource_id ';
        $sql .= ' WHERE re.status = 1 AND ru.status = 1 AND re.parent_id = :parent_id AND ru.role_id = :role_id AND re.display = 1 AND re.is_resource = 1 ';
        $sql .= ' ORDER BY re.sort ';
        $params = [];
        $params[':parent_id'] = $id;
        $params[':role_id'] = $userInfo['role'];
        $data = Yii::$app->db->createCommand($sql)
            ->bindValues($params)
            ->queryAll();
        if($data){
            $return = $data;
        }
        return $return;
    }
}