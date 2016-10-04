<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "owners".
 *
 * @property integer $id
 * @property string  $sale_date
 * @property string  $owner
 * @property string  $organization
 * @property string  $address
 */
class Owners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'owners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sale_date', 'owner', 'address'], 'required'],
            [['sale_date'], 'safe'],
            [['owner', 'organization'], 'string', 'max' => 150],
            [['address'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'           => Yii::t('app', 'ID'),
            'sale_date'    => Yii::t('app', 'Sale Date'),
            'owner'        => Yii::t('app', 'Owner'),
            'organization' => Yii::t('app', 'Organization'),
            'address'      => Yii::t('app', 'Address'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorses()
    {
        return $this->hasMany(Horses::className(), ['owner_id' => 'id']);
    }

    /**
     * @return Array
     */
    public static function getOwnersList()
    {
        return ArrayHelper::map(Owners::find()->select('id, owner')->all(), 'id', 'owner');

    }
}
