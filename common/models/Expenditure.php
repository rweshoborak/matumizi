<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "expenditure".
 *
 * @property int $exp_id
 * @property string $title
 * @property int $amount
 * @property string $created_at
 * @property string $updated_at
 */
class Expenditure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expenditure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'amount', 'created_at', 'updated_at'], 'required'],
            [['amount'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'exp_id' => 'Exp ID',
            'title' => 'Title',
            'amount' => 'Amount',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
