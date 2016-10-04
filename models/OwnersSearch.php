<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Owners;

/**
 * OwnersSearch represents the model behind the search form of `app\models\Owners`.
 */
class OwnersSearch extends Owners
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['sale_date', 'owner', 'organization', 'address'], 'safe'],
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
        $query = Owners::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider(
            [
                'query' => $query,
            ]
        );

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(
            [
                'id'        => $this->id,
                'sale_date' => $this->sale_date,
            ]
        );

        $query->andFilterWhere(['like', 'owner', $this->owner])
            ->andFilterWhere(['like', 'organization', $this->organization])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
