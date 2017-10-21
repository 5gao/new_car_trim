<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AdvertForm;

/**
 * AdvertSearch represents the model behind the search form about `app\models\AdvertForm`.
 */
class AdvertSearch extends AdvertForm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'advert_user', 'advert_own', 'advert_place', 'advert_group', 'play_time', 'stop_time', 'pay_way', 'play_total', 'status', 'shelf_status', 'sort', 'created_time', 'updated_time'], 'integer'],
            [['name', 'img_url', 'link'], 'safe'],
            [['univalence'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AdvertForm::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'advert_user' => $this->advert_user,
            'advert_own' => $this->advert_own,
            'advert_place' => $this->advert_place,
            'advert_group' => $this->advert_group,
            'play_time' => $this->play_time,
            'stop_time' => $this->stop_time,
            'pay_way' => $this->pay_way,
            'play_total' => $this->play_total,
            'univalence' => $this->univalence,
            'status' => $this->status,
            'shelf_status' => $this->shelf_status,
            'sort' => $this->sort,
            'created_time' => $this->created_time,
            'updated_time' => $this->updated_time,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'img_url', $this->img_url])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
