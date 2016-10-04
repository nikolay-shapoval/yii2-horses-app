<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Descriptions;

/**
 * DescriptionsSearch represents the model behind the search form of `app\models\Descriptions`.
 */
class DescriptionsSearch extends Descriptions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'horse_id'], 'integer'],
            [['head', 'neck', 'left_front', 'right_front', 'left_back', 'right_back', 'body', 'verification_date'], 'safe'],
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
        $query = Descriptions::find();

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

        $query->joinWith('horse');

        // grid filtering conditions
        $query->andFilterWhere(
            [
                'id'                => $this->id,
                'verification_date' => $this->verification_date,
            ]
        );

        $query->andFilterWhere(['like', 'head', $this->head])
            ->andFilterWhere(['like', 'neck', $this->neck])
            ->andFilterWhere(['like', 'left_front', $this->left_front])
            ->andFilterWhere(['like', 'right_front', $this->right_front])
            ->andFilterWhere(['like', 'left_back', $this->left_back])
            ->andFilterWhere(['like', 'right_back', $this->right_back])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'horses.name', $this->horse_id]);

        return $dataProvider;
    }
}
