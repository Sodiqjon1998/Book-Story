<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%contact}}".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property string|null $date
 * @property string $status
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contact}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'subject', 'message'], 'required'],
            [['message', 'status'], 'string'],
            [['date'], 'safe'],
            [['first_name', 'last_name', 'email', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'subject' => Yii::t('app', 'Subject'),
            'message' => Yii::t('app', 'Message'),
            'date' => Yii::t('app', 'Date'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
