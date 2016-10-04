<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "breeds".
 *
 * @property integer $id
 * @property string  $breed
 * @property string  $external_signs
 * @property string  $comments
 */
class Breeds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'breeds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['breed', 'external_signs', 'comments'], 'required'],
            [['external_signs', 'comments'], 'string'],
            [['breed'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'             => Yii::t('app', 'ID'),
            'breed'          => Yii::t('app', 'Breed'),
            'external_signs' => Yii::t('app', 'External Signs'),
            'comments'       => Yii::t('app', 'Comments'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorses()
    {
        return $this->hasMany(Horses::className(), ['breed_id' => 'id']);
    }

    /**
     * @return Array
     */
    public static function getBreedsList()
    {
        return ArrayHelper::map(Breeds::find()->select('id, breed')->all(), 'id', 'breed');
    }
}
