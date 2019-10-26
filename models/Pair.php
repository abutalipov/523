<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pair".
 *
 * @property string $idclass
 * @property string $classstart
 * @property string $classend
 *
 * @property Timetable[] $timetables
 */
class Pair extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classstart', 'classend'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idclass' => 'Idclass',
            'classstart' => 'Classstart',
            'classend' => 'Classend',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimetables()
    {
        return $this->hasMany(Timetable::className(), ['couples_idcouples' => 'idclass']);
    }
}
