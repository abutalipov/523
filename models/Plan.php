<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property string $idplan
 * @property string $plansubject
 * @property string $hours
 * @property string $group_idgroup
 * @property string $subject_idsubject
 * @property string $subject_type_subject_typeid
 * @property string $semester_idsemester
 * @property string $employee_idemployee
 *
 * @property Semester $semesterIdsemester
 * @property Employee $employeeIdemployee
 * @property SubjectType $subjectTypeSubjectType
 * @property Group $groupIdgroup
 * @property Subject $subjectIdsubject
 * @property Shedule[] $shedules
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_idgroup', 'subject_idsubject', 'subject_type_subject_typeid', 'semester_idsemester', 'employee_idemployee'], 'required'],
            [['group_idgroup', 'subject_idsubject', 'subject_type_subject_typeid', 'semester_idsemester', 'employee_idemployee'], 'integer'],
            [['plansubject', 'hours'], 'string', 'max' => 45],
            [['semester_idsemester'], 'exist', 'skipOnError' => true, 'targetClass' => Semester::className(), 'targetAttribute' => ['semester_idsemester' => 'idsemester']],
            [['employee_idemployee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_idemployee' => 'idemployee']],
            [['subject_type_subject_typeid'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectType::className(), 'targetAttribute' => ['subject_type_subject_typeid' => 'idsubject_type']],
            [['group_idgroup'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_idgroup' => 'idgroup']],
            [['subject_idsubject'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_idsubject' => 'idsubject']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idplan' => 'Idplan',
            'plansubject' => 'Plansubject',
            'hours' => 'Hours',
            'group_idgroup' => 'Group Idgroup',
            'subject_idsubject' => 'Subject Idsubject',
            'subject_type_subject_typeid' => 'Subject Type Subject Typeid',
            'semester_idsemester' => 'Semester Idsemester',
            'employee_idemployee' => 'Employee Idemployee',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemesterIdsemester()
    {
        return $this->hasOne(Semester::className(), ['idsemester' => 'semester_idsemester']);
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
    public function getSubjectTypeSubjectType()
    {
        return $this->hasOne(SubjectType::className(), ['idsubject_type' => 'subject_type_subject_typeid']);
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
    public function getSubjectIdsubject()
    {
        return $this->hasOne(Subject::className(), ['idsubject' => 'subject_idsubject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShedules()
    {
        return $this->hasMany(Shedule::className(), ['plan_idplan' => 'idplan']);
    }
}
