<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property string $idemployee
 * @property string $name
 * @property string $employeename
 * @property string $employeepatronimyc
 * @property string $user_iduser
 *
 * @property Emplondepart[] $emplondeparts
 * @property Plan[] $plans
 * @property Shedule[] $shedules
 * @property Timetable[] $timetables
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_iduser'], 'required'],
            [['user_iduser'], 'integer'],
            [['name', 'employeename', 'employeepatronimyc'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idemployee' => 'Idemployee',
            'name' => 'Name',
            'employeename' => 'Employeename',
            'employeepatronimyc' => 'Employeepatronimyc',
            'user_iduser' => 'User Iduser',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmplondeparts()
    {
        return $this->hasMany(Emplondepart::className(), ['employee_idemployee' => 'idemployee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['employee_idemployee' => 'idemployee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShedules()
    {
        return $this->hasMany(Shedule::className(), ['employee_idemployee' => 'idemployee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(Timetable::className(), ['employee_idemployee' => 'idemployee']);
    }
}
