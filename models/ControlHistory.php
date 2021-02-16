<?php

namespace app\modules\webcontrol\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
/**
 * This is the model class for table "control_history".
 *
 * @property integer $id
 * @property string $pclist
 * @property string $operation
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class ControlHistory extends \yii\db\ActiveRecord
{
    public function behaviors()
	{
		return [
			BlameableBehavior::className(),
			TimestampBehavior::className(),
		];
	}
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'control_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pclist', 'operation'], 'required'],
            [['pclist'], 'string'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['operation'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pclist' => 'รายการเครื่อง',
            'operation' => 'การทำงาน',
            'created_at' => 'สร้างเมื่อ',
            'created_by' => 'สร้างโดย',
            'updated_at' => 'อัพเดตเมื่อ',
            'updated_by' => 'อัพเดตโดย',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
