<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_type".
 *
 * @property string $idsubject_type
 * @property string $subject_typename
 *
 * @property Plan[] $plans
 * @property Shedule[] $shedules
 * @property Timetable[] $timetables
 */
class SubjectType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsubject_type'], 'required'],
            [['idsubject_type'], 'integer'],
            [['subject_typename'], 'string', 'max' => 45],
            [['idsubject_type'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsubject_type' => 'Idsubject Type',
            'subject_typename' => 'Subject Typename',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['subject_type_subject_typeid' => 'idsubject_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShedules()
    {
        return $this->hasMany(Shedule::className(), ['subject_type_idsubject_type' => 'idsubject_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(Timetable::className(), ['subject_type_idsubject_type' => 'idsubject_type']);
    }
}
