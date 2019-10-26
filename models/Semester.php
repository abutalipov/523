<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semester".
 *
 * @property string $idsemester
 * @property string $semestername
 *
 * @property Plan[] $plans
 */
class Semester extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'semester';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semestername'], 'required'],
            [['semestername'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsemester' => 'Idsemester',
            'semestername' => 'Semestername',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['semester_idsemester' => 'idsemester']);
    }
}
