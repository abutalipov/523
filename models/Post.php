<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property string $idpost
 * @property string $name
 *
 * @property Emplondepart[] $emplondeparts
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpost' => 'Idpost',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmplondeparts()
    {
        return $this->hasMany(Emplondepart::className(), ['post_idpost' => 'idpost']);
    }
}
