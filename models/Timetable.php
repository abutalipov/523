<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "timetable".
 *
 * @property string $idtimetable
 * @property string $audience_idaudience
 * @property string $couples_idcouples
 * @property string $weekday_idweekday
 * @property string $subject_idsubject
 * @property string $employee_idemployee
 * @property string $group_idgroup
 * @property string $subject_type_idsubject_type
 *
 * @property Audience $audienceIdaudience
 * @property Subject $subjectIdsubject
 * @property Employee $employeeIdemployee
 * @property Group $groupIdgroup
 * @property SubjectType $subjectTypeIdsubjectType
 * @property Weekday $weekdayIdweekday
 * @property Pair $couplesIdcouples
 */
class Timetable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'timetable';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['audience_idaudience', 'couples_idcouples', 'weekday_idweekday', 'subject_idsubject', 'employee_idemployee', 'group_idgroup', 'subject_type_idsubject_type'], 'required'],
            [['audience_idaudience', 'couples_idcouples', 'weekday_idweekday', 'subject_idsubject', 'employee_idemployee', 'group_idgroup', 'subject_type_idsubject_type'], 'integer'],
            [['audience_idaudience'], 'exist', 'skipOnError' => true, 'targetClass' => Audience::className(), 'targetAttribute' => ['audience_idaudience' => 'idaudience']],
            [['subject_idsubject'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_idsubject' => 'idsubject']],
            [['employee_idemployee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_idemployee' => 'idemployee']],
            [['group_idgroup'], 'exist', 'skipOnError' => true, 'targetClass' => Group::className(), 'targetAttribute' => ['group_idgroup' => 'idgroup']],
            [['subject_type_idsubject_type'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectType::className(), 'targetAttribute' => ['subject_type_idsubject_type' => 'idsubject_type']],
            [['weekday_idweekday'], 'exist', 'skipOnError' => true, 'targetClass' => Weekday::className(), 'targetAttribute' => ['weekday_idweekday' => 'idweekday']],
            [['couples_idcouples'], 'exist', 'skipOnError' => true, 'targetClass' => Pair::className(), 'targetAttribute' => ['couples_idcouples' => 'idclass']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtimetable' => 'Idtimetable',
            'audience_idaudience' => 'Audience Idaudience',
            'couples_idcouples' => 'Couples Idcouples',
            'weekday_idweekday' => 'Weekday Idweekday',
            'subject_idsubject' => 'Subject Idsubject',
            'employee_idemployee' => 'Employee Idemployee',
            'group_idgroup' => 'Group Idgroup',
            'subject_type_idsubject_type' => 'Subject Type Idsubject Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAudienceIdaudience()
    {
        return $this->hasOne(Audience::className(), ['idaudience' => 'audience_idaudience']);
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
    public function getEmployeeIdemployee()
    {
        return $this->hasOne(Employee::className(), ['idemployee' => 'employee_idemployee']);
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
    public function getSubjectTypeIdsubjectType()
    {
        return $this->hasOne(SubjectType::className(), ['idsubject_type' => 'subject_type_idsubject_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeekdayIdweekday()
    {
        return $this->hasOne(Weekday::className(), ['idweekday' => 'weekday_idweekday']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCouplesIdcouples()
    {
        return $this->hasOne(Pair::className(), ['idclass' => 'couples_idcouples']);
    }
}
