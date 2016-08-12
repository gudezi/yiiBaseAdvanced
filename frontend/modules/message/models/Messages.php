<?php

namespace frontend\modules\message\models;


use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property string $subject
 * @property string $body
 * @property string $is_read
 * @property string $deleted_by
 * @property string $created_at
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sender_id', 'receiver_id', 'created_at'], 'required'],
            [['sender_id', 'receiver_id'], 'integer'],
            [['body', 'is_read', 'deleted_by'], 'string'],
            [['created_at'], 'safe'],
            [['subject'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender_id' => 'Sender ID',
            'receiver_id' => 'Receiver ID',
            'subject' => 'Subject',
            'body' => 'Body',
            'is_read' => 'Is Read',
            'deleted_by' => 'Deleted By',
            'created_at' => 'Created At',
        ];
    }
    
   /*public function behaviors()
   {
      return [
         'timestamp' => [
         'class' => 'yii\behaviors\TimestampBehavior',
         'attributes' => [
            ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
            ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at']
            ],
         'value' => new Expression('NOW()'),
         ],
      ];
   }*/
}
