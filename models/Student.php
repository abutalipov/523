<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property string $idstudents
 * @property string $group_idgroup
 * @property string $user_iduser
 * @property string $studentsurname
 * @property string $studentname
 * @property string $studentpatronimyc
 *
 * @property Group $groupIdgroup
 * @property User $userIduser
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_idgroup', 'user_iduser'], 'required'],
            [['group_idgroup', 'user_iduser'], 'integer'],
            [['studentsurname', 'studentname', 'studentpatronimyc'], 'string', 'max' => 45],
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
            'idstudents' => 'Idstudents',
            'group_idgroup' => 'Group Idgroup',
            'user_iduser' => 'User Iduser',
            'studentsurname' => 'Studentsurname',
            'studentname' => 'Studentname',
            'studentpatronimyc' => 'Studentpatronimyc',
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
