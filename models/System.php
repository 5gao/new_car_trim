<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property integer $population
 */
class system extends \yii\db\ActiveRecord
{
    /**
     * @description string 加密
     * @param $password
     * @param $salt
     * @return bool|string
     */
    public function addSalt($password, $salt)
    {
        if($salt == null){
            return false;
        }
        if($password == ''|| $password == null){
            return false;
        }
        $password  = md5(trim($password));
        $salt = strrev($salt);

        $new_password = substr($password,0,16).$salt.substr($password, 16,32);
        return md5($new_password);
    }

    /**
     * 判断注册用户是否一致
     * @param $username
     * @return bool|string
     */
    public function isAddUser($username)
    {
        if($username == null || !$username){
            return false;
        }
        $params = [':username' => trim($username)];
        //var_dump($params);die;
        $result = Yii::$app->db->createCommand('SELECT * FROM a_user WHERE username=:username')
            ->bindValues($params)
            ->queryOne();

        if($result){
            return $result;
        }
        return false;

    }

    /**
     * 判断用户是否存在
     * @param $username
     * @return bool|string
     */
    public function isUser($username)
    {
        if($username == null || !$username){
            return false;
        }
        $params = [':username' => trim($username), ':status' => 1];
        $result = Yii::$app->db->createCommand('SELECT * FROM a_user WHERE username=:username AND status = :status')
            ->bindValues($params)
            ->queryOne();
        if($result){
            return $result;
        }
        return false;
    }

    public function login($username, $password)
    {
        if(!$username || !$password){
            return false;
        }

        $params = [];
        $params[':username'] = trim($username);
        $params[':password'] = $password;
        $params[':status'] = 1;
        $sql = 'SELECT id, username, role, company, name, phone ';
        $sql .= ' FROM a_user WHERE username = :username AND password = :password AND status = :status';
        $command = Yii::$app->db->createCommand($sql);
        $result = $command->bindValues($params)->queryOne();
        if ($result) {
            return $result;
        }
        return false;
    }

    /**
     * description 获取用户导航
     * @param $id
     * @return array
     */
    public function nav($role_id)
    {
        $return = [];
        //$cookies= Yii::$app->request->cookies;
        $session = Yii::$app->session;
        //$timem = $session->getTimeout();

        $nav_id = 'nav_'.$role_id;
        $session->remove($nav_id);
        if ($session->has($nav_id)) {
            $return = $session->get($nav_id);

        }else{
            $nav = $this->getNav($role_id);

            if ($nav) {
                //加入cookie
                //$into_cookies = Yii::$app->response->cookies;

                $session->set($nav_id, $nav);
                /*$into_cookies->add(new \yii\web\Cookie([
                    'name' => $nav_id,
                    'value' => $nav,
                    'expire' => time() + 86400
                ]));*/
                $return = $nav;

            }
        }
        return $return;

    }
    //获取资源导航
    public function getNav($role_id){
        $return = [];
        //获取用户资源
        $data = $this->getRoleResource($role_id);
        //处理导航数据
        //获取一级导航
        $nav_first = $this->disposeNav($data);
        //获取二级导航

        if (!empty($nav_first)) {

            foreach ($nav_first as $key => $val) {
                if($val['resource_id'] == 300){//是系统设置时再有二级导航
                    $nav_second = $this->disposeNav($data, $val['resource_id']);
                    if ($nav_second) {
                        $val['nav_second'] = $nav_second;
                    }
                }else{
                    $val['nav_second'] = '';
                }

                $return[] = $val;
            }
        }

        return $return;
    }

    /**
     * description 处理导航数据
     * @param $data
     * @param int $type
     * @return array
     */
    public function disposeNav($data, $type=1)
    {
        $return = [];
        $sort = [];
        foreach ($data as $key => $val) {
            if ($val['parent_id'] == $type) {
                $return[] = $val;
                $sort[] = $val['sort'];
            }
        }
        if (!empty($return)) {
            //排序
            array_multisort($sort,SORT_ASC, $return);
        }

        return $return;
    }


    /**
     * description 获取用户资源
     * @param $role_id
     * @return array
     */
    public function getRoleResource($role_id)
    {
        $return = [];
        $sql = ' SELECT ro.name as role_name,re.id as resource_id, re.name as resource_name, re.level, re.resource_alias, re.parent_id, re.url, re.sort ';
        $sql .= ' FROM a_rule ru ';
        $sql .= ' LEFT JOIN a_role ro ON ro.role_id = ru.role_id ';
        $sql .= ' LEFT JOIN a_resource re ON re.id = ru.resource_id ';
        $sql .= ' WHERE re.status = 1 AND ru.status = 1 AND ru.role_id = :role_id AND re.display = 1 AND re.is_resource = 1 ';
        $data = Yii::$app->db->createCommand($sql)
            ->bindValue(':role_id', $role_id)
            ->queryAll();
        if($data){
            $return = $data;
        }
        return $return;
    }

}
