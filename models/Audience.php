<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "audience".
 *
 * @property string $idaudience
 * @property string $campus_idcampus
 * @property string $audiencename
 *
 * @property Campus $campusIdcampus
 * @property Timetable[] $timetables
 */
class Audience extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'audience';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idaudience', 'campus_idcampus'], 'required'],
            [['idaudience', 'campus_idcampus'], 'integer'],
            [['audiencename'], 'string', 'max' => 45],
            [['idaudience'], 'unique'],
            [['campus_idcampus'], 'exist', 'skipOnError' => true, 'targetClass' => Campus::className(), 'targetAttribute' => ['campus_idcampus' => 'idcampus']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idaudience' => 'Idaudience',
            'campus_idcampus' => 'Campus Idcampus',
            'audiencename' => 'Audiencename',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampusIdcampus()
    {
        return $this->hasOne(Campus::className(), ['idcampus' => 'campus_idcampus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(Timetable::className(), ['audience_idaudience' => 'idaudience']);
    }
}
