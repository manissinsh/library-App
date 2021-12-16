<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%librarys}}".
 *
 * @property int $id
 * @property string $name
 * @property int|null $opening_time
 * @property int|null $closing_time
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Librarys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%librarys}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['opening_time', 'closing_time'], 'string', 'max' => 11],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'opening_time' => 'Opening Time',
            'closing_time' => 'Closing Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\LibrarysQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LibrarysQuery(get_called_class());
    }
}
