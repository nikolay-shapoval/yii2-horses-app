<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promers".
 *
 * @property integer $id
 * @property string  $date
 * @property integer $horse_id
 * @property integer $height
 * @property integer $slanting_length
 * @property integer $breast_girth
 * @property integer $mouth_grasp
 */
class Promers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'horse_id', 'height', 'slanting_length', 'breast_girth', 'mouth_grasp'], 'required'],
            [['date'], 'safe'],
            [['horse_id', 'height', 'slanting_length', 'breast_girth', 'mouth_grasp'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => Yii::t('app', 'ID'),
            'date'            => Yii::t('app', 'Date'),
            'horse_id'        => Yii::t('app', 'Horse'),
            'height'          => Yii::t('app', 'Height'),
            'slanting_length' => Yii::t('app', 'Slanting Length'),
            'breast_girth'    => Yii::t('app', 'Breast Girth'),
            'mouth_grasp'     => Yii::t('app', 'Mouth Grasp'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorse()
    {
        return $this->hasOne(Horses::className(), ['id' => 'horse_id']);
    }
}
