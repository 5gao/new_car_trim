<?php

namespace app\models\_Model;

use Yii;

/**
 * This is the model class for table "a_device".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $mac
 * @property string $device_type
 * @property string $device_ver
 * @property integer $group
 * @property integer $status
 * @property string $remark
 * @property integer $created_time
 * @property integer $updated_time
 */
class ADevice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'a_device';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mac'], 'required'],
            [['id', 'user_id', 'group', 'status', 'created_time', 'updated_time'], 'integer'],
            [['name', 'remark'], 'string', 'max' => 255],
            [['mac', 'device_type', 'device_ver'], 'string', 'max' => 50],
//            [['img_url'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '代理商',
            'name' => '设备名',
            'mac' => 'Mac地址',
            'device_type' => '设备型号',
            'device_ver' => '设备版本',
            'group' => '设备分组',
            'status' => '状态',
            'remark' => '备注',
            'created_time' => "创建时间",
            'updated_time' => '修改时间',
        ];
    }
}
