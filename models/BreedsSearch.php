<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Breeds;

/**
 * BreedsSearch represents the model behind the search form about `app\models\Breeds`.
 */
class BreedsSearch extends Breeds
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['breed', 'external_signs', 'comments'], 'safe'],
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
        $query = Breeds::find();

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

        $query->andFilterWhere(
            [
                'id' => $this->id,
            ]
        );

        $query->andFilterWhere(['like', 'breed', $this->breed])
            ->andFilterWhere(['like', 'external_signs', $this->external_signs])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
