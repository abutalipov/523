<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weekday".
 *
 * @property string $idweekday
 * @property string $weekdayname
 *
 * @property Timetable[] $timetables
 */
class Weekday extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weekday';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idweekday'], 'required'],
            [['idweekday'], 'integer'],
            [['weekdayname'], 'string', 'max' => 45],
            [['idweekday'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idweekday' => 'Idweekday',
            'weekdayname' => 'Weekdayname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(Timetable::className(), ['weekday_idweekday' => 'idweekday']);
    }
}
