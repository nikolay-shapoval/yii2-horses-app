<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "descriptions".
 *
 * @property integer $id
 * @property integer $horse_id
 * @property string  $head
 * @property string  $neck
 * @property string  $left_front
 * @property string  $right_front
 * @property string  $left_back
 * @property string  $right_back
 * @property string  $body
 * @property string  $verification_date
 */
class Descriptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'descriptions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['horse_id', 'head', 'neck', 'left_front', 'right_front', 'left_back', 'right_back', 'body'], 'required'],
            [['horse_id'], 'integer'],
            [['verification_date'], 'safe'],
            [['head', 'neck', 'left_front', 'right_front', 'left_back', 'right_back', 'body'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                => Yii::t('app', 'ID'),
            'horse_id'          => Yii::t('app', 'Horse'),
            'head'              => Yii::t('app', 'Head'),
            'neck'              => Yii::t('app', 'Neck'),
            'left_front'        => Yii::t('app', 'Left Front'),
            'right_front'       => Yii::t('app', 'Right Front'),
            'left_back'         => Yii::t('app', 'Left Back'),
            'right_back'        => Yii::t('app', 'Right Back'),
            'body'              => Yii::t('app', 'Body'),
            'verification_date' => Yii::t('app', 'Verification Date'),
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
