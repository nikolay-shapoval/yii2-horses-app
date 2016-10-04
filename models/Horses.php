<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "horses".
 *
 * @property integer $id
 * @property integer $owner_id
 * @property integer $breed_id
 * @property string  $name
 * @property string  $sex
 * @property string  $colour
 * @property string  $birthday
 * @property string  $father
 * @property string  $mother
 */
class Horses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'breed_id', 'name', 'sex', 'colour', 'birthday', 'father', 'mother'], 'required'],
            [['owner_id', 'breed_id'], 'integer'],
            [['birthday'], 'safe'],
            [['name', 'father', 'mother'], 'string', 'max' => 100],
            [['sex'], 'string', 'max' => 10],
            [['colour'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'       => Yii::t('app', 'ID'),
            'owner_id' => Yii::t('app', 'Owner'),
            'breed_id' => Yii::t('app', 'Breed'),
            'name'     => Yii::t('app', 'Name'),
            'sex'      => Yii::t('app', 'Sex'),
            'colour'   => Yii::t('app', 'Colour'),
            'birthday' => Yii::t('app', 'Birthday'),
            'father'   => Yii::t('app', 'Father'),
            'mother'   => Yii::t('app', 'Mother'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescriptions()
    {
        return $this->hasMany(Description::className(), ['horse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBreed()
    {
        return $this->hasOne(Breeds::className(), ['id' => 'breed_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Owners::className(), ['id' => 'owner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPasports()
    {
        return $this->hasMany(Pasport::className(), ['horse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromers()
    {
        return $this->hasMany(Promers::className(), ['horse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVaccinations()
    {
        return $this->hasMany(Vaccination::className(), ['horse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkingCapacities()
    {
        return $this->hasMany(WorkingCapacity::className(), ['horse_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getHorsesList()
    {
        return ArrayHelper::map(Horses::find()->select('id, name')->all(), 'id', 'name');
    }

    /**
     * @return array
     */
    public function getSexs()
    {
        return ['male' => Yii::t('app', 'Male'), 'female' => Yii::t('app', 'Female'),];
    }
}
