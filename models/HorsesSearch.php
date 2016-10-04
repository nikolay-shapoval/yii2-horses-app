<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HorsesSearch represents the model behind the search form of `app\models\Horses`.
 */
class HorsesSearch extends Horses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'sex', 'colour', 'birthday', 'father', 'mother', 'owner_id', 'breed_id'], 'safe'],
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
        $query = Horses::find();

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

        $query->joinWith('breed')
            ->joinWith('owner');

        $query->andFilterWhere(
            [
                'horses.id' => $this->id,
                'birthday'  => $this->birthday,
                'sex'       => $this->sex,
            ]
        );

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'colour', $this->colour])
            ->andFilterWhere(['like', 'father', $this->father])
            ->andFilterWhere(['like', 'mother', $this->mother])
            ->andFilterWhere(['like', 'owners.owner', $this->owner_id])
            ->andFilterWhere(['like', 'breeds.breed', $this->breed_id]);

        return $dataProvider;
    }
}
