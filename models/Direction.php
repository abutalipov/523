<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "direction".
 *
 * @property string $iddirection
 * @property int $department_iddepartment
 * @property string $directioncode
 * @property string $directionname
 * @property string $directionshortname
 *
 * @property Department $departmentIddepartment
 * @property Group[] $groups
 */
class Direction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'direction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddirection', 'department_iddepartment'], 'required'],
            [['iddirection', 'department_iddepartment'], 'integer'],
            [['directioncode', 'directionshortname'], 'string', 'max' => 45],
            [['directionname'], 'string', 'max' => 150],
            [['iddirection'], 'unique'],
            [['department_iddepartment'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_iddepartment' => 'iddepartment']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddirection' => 'Iddirection',
            'department_iddepartment' => 'Department Iddepartment',
            'directioncode' => 'Directioncode',
            'directionname' => 'Directionname',
            'directionshortname' => 'Directionshortname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentIddepartment()
    {
        return $this->hasOne(Department::className(), ['iddepartment' => 'department_iddepartment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['direction_iddirection' => 'iddirection']);
    }
}
