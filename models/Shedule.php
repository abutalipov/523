<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shedule".
 *
 * @property string $idshedule
 * @property string $employee_idemployee
 * @property string $subject_type_idsubject_type
 * @property string $plan_idplan
 * @property string $subject_idsubject
 *
 * @property Employee $employeeIdemployee
 * @property SubjectType $subjectTypeIdsubjectType
 * @property Plan $planIdplan
 * @property Subject $subjectIdsubject
 */
class Shedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_idemployee', 'subject_type_idsubject_type', 'plan_idplan', 'subject_idsubject'], 'required'],
            [['employee_idemployee', 'subject_type_idsubject_type', 'plan_idplan', 'subject_idsubject'], 'integer'],
            [['employee_idemployee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_idemployee' => 'idemployee']],
            [['subject_type_idsubject_type'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectType::className(), 'targetAttribute' => ['subject_type_idsubject_type' => 'idsubject_type']],
            [['plan_idplan'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::className(), 'targetAttribute' => ['plan_idplan' => 'idplan']],
            [['subject_idsubject'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_idsubject' => 'idsubject']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idshedule' => 'Idshedule',
            'employee_idemployee' => 'Employee Idemployee',
            'subject_type_idsubject_type' => 'Subject Type Idsubject Type',
            'plan_idplan' => 'Plan Idplan',
            'subject_idsubject' => 'Subject Idsubject',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeIdemployee()
    {
        return $this->hasOne(Employee::className(), ['idemployee' => 'employee_idemployee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectTypeIdsubjectType()
    {
        return $this->hasOne(SubjectType::className(), ['idsubject_type' => 'subject_type_idsubject_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanIdplan()
    {
        return $this->hasOne(Plan::className(), ['idplan' => 'plan_idplan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectIdsubject()
    {
        return $this->hasOne(Subject::className(), ['idsubject' => 'subject_idsubject']);
    }
}
