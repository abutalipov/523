<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "campus".
 *
 * @property string $idcampus
 * @property string $campusaddres
 * @property string $campusname
 *
 * @property Audience[] $audiences
 */
class Campus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'campus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['campusaddres', 'campusname'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcampus' => 'Idcampus',
            'campusaddres' => 'Campusaddres',
            'campusname' => 'Campusname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAudiences()
    {
        return $this->hasMany(Audience::className(), ['campus_idcampus' => 'idcampus']);
    }
}
