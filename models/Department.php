<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $iddepartment
 * @property string $faculty_idfaculty
 * @property string $departmentname
 *
 * @property Faculty $facultyIdfaculty
 * @property Direction[] $directions
 * @property Emplondepart[] $emplondeparts
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['faculty_idfaculty'], 'required'],
            [['faculty_idfaculty'], 'integer'],
            [['departmentname'], 'string', 'max' => 150],
            [['faculty_idfaculty'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_idfaculty' => 'idfaculty']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddepartment' => 'Iddepartment',
            'faculty_idfaculty' => 'Faculty Idfaculty',
            'departmentname' => 'Departmentname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacultyIdfaculty()
    {
        return $this->hasOne(Faculty::className(), ['idfaculty' => 'faculty_idfaculty']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirections()
    {
        return $this->hasMany(Direction::className(), ['department_iddepartment' => 'iddepartment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmplondeparts()
    {
        return $this->hasMany(Emplondepart::className(), ['department_iddepartment' => 'iddepartment']);
    }
}
