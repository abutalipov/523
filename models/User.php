<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $usercreate
 * @property string $userupdate
 * @property int $role_idrole
 * @property string $role
 *
 * @property Note[] $notes
 * @property Student[] $students
 * @property Role $roleIdrole
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['usercreate', 'userupdate'], 'safe'],
            [['role_idrole'], 'integer'],
            [['username', 'password', 'role'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['role_idrole'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_idrole' => 'idrole']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'usercreate' => 'Usercreate',
            'userupdate' => 'Userupdate',
            'role_idrole' => 'Role Idrole',
            'role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::className(), ['user_iduser' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['user_iduser' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleIdrole()
    {
        return $this->hasOne(Role::className(), ['idrole' => 'role_idrole']);
    }
}
