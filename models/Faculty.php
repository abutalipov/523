<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faculty".
 *
 * @property string $idfaculty
 * @property string $facultyname
 * @property string $facultyshortname
 *
 * @property Department[] $departments
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idfaculty'], 'required'],
            [['idfaculty'], 'integer'],
            [['facultyname'], 'string', 'max' => 150],
            [['facultyshortname'], 'string', 'max' => 45],
            [['idfaculty'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idfaculty' => 'Idfaculty',
            'facultyname' => 'Facultyname',
            'facultyshortname' => 'Facultyshortname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['faculty_idfaculty' => 'idfaculty']);
    }
}
