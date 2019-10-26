<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "note".
 *
 * @property string $idnote
 * @property string $body
 * @property string $group_idgroup
 * @property string $date
 * @property string $user_iduser
 *
 * @property Group $groupIdgroup
 * @property User $userIduser
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body', 'group_idgroup', 'date', 'user_iduser'], 'required'],
            [['body'], 'string'],
            [['group_idgroup', 'user_iduser'], 'integer'],
            [['date'], 'safe'],
            [['group_idgroup'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_idgroup' => 'idgroup']],
            [['user_iduser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_iduser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnote' => 'Idnote',
            'body' => 'Body',
            'group_idgroup' => 'Group Idgroup',
            'date' => 'Date',
            'user_iduser' => 'User Iduser',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupIdgroup()
    {
        return $this->hasOne(Group::className(), ['idgroup' => 'group_idgroup']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserIduser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_iduser']);
    }
}
