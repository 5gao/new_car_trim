<?php

namespace app\models\_model;

use Yii;

/**
 * This is the model class for table "a_advert".
 *
 * @property integer $id
 * @property string $name
 * @property integer $advert_user
 * @property integer $advert_own
 * @property integer $advert_place
 * @property integer $advert_group
 * @property string $img_url
 * @property string $link
 * @property integer $play_time
 * @property integer $stop_time
 * @property integer $pay_way
 * @property integer $play_total
 * @property double $univalence
 * @property integer $status
 * @property integer $shelf_status
 * @property integer $sort
 * @property integer $created_time
 * @property integer $updated_time
 */
class AAdvert extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'a_advert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'advert_user'], 'required','message'=>'设备名不能为空'],
            [['advert_user', 'advert_own', 'advert_place', 'advert_group', 'play_time', 'stop_time', 'pay_way', 'play_total', 'status', 'shelf_status', 'sort', 'created_time', 'updated_time'], 'integer'],
            [['univalence'], 'number'],
            [['name'], 'string', 'max' => 50],
            [['img_url', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                 => 'ID',
            'name'               => '广 告 名 称',
            'advert_user'       => '广告管理人',
            'advert_own'        => '广   告   主',
            'advert_place'      => '广告投放地',
            'advert_group'      => '广 告 分 组',
            'img_url'            => '广 告 图 片',
            'link'               => '广 告 链 接',
            'play_time'          => '持 续 时 间',
            'stop_time'          => '禁 用 时 间',
            'pay_way'            => '支 付 方 式',
            'play_total'         => '播 放 总 量',
            'univalence'         => '单         价',
            'status'              => '状         态',
            'shelf_status'       => '上下架状态',
            'sort'                => '排       序',
            'created_time'       => '创 建 时 间',
            'updated_time'       => '修 改 时 间',
        ];
    }
}
