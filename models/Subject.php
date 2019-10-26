<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property string $idsubject
 * @property string $Name
 *
 * @property Plan[] $plans
 * @property Shedule[] $shedules
 * @property Timetable[] $timetables
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsubject' => 'Idsubject',
            'Name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['subject_idsubject' => 'idsubject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShedules()
    {
        return $this->hasMany(Shedule::className(), ['subject_idsubject' => 'idsubject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(Timetable::className(), ['subject_idsubject' => 'idsubject']);
    }
}
