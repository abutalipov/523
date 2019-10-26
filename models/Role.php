<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $idrole
 * @property string $rolename
 *
 * @property User[] $users
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idrole'], 'required'],
            [['idrole'], 'integer'],
            [['rolename'], 'string', 'max' => 45],
            [['idrole'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idrole' => 'Idrole',
            'rolename' => 'Rolename',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['role_idrole' => 'idrole']);
    }
}
