<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property string $idgroup
 * @property string $groupname
 * @property string $groupyear
 * @property string $groupresposible
 * @property string $direction_iddirection
 *
 * @property Direction $directionIddirection
 * @property Note[] $notes
 * @property Plan[] $plans
 * @property Student[] $students
 * @property Timetable[] $timetables
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['direction_iddirection'], 'required'],
            [['direction_iddirection'], 'integer'],
            [['groupname', 'groupyear', 'groupresposible'], 'string', 'max' => 45],
            [['direction_iddirection'], 'exist', 'skipOnError' => true, 'targetClass' => Direction::className(), 'targetAttribute' => ['direction_iddirection' => 'iddirection']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idgroup' => 'Idgroup',
            'groupname' => 'Groupname',
            'groupyear' => 'Groupyear',
            'groupresposible' => 'Groupresposible',
            'direction_iddirection' => 'Direction Iddirection',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirectionIddirection()
    {
        return $this->hasOne(Direction::className(), ['iddirection' => 'direction_iddirection']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::className(), ['group_idgroup' => 'idgroup']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['group_idgroup' => 'idgroup']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['group_idgroup' => 'idgroup']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(Timetable::className(), ['group_idgroup' => 'idgroup']);
    }
}
