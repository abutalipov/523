<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Plan;

/**
 * PlanSearch represents the model behind the search form of `app\models\Plan`.
 */
class PlanSearch extends Plan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idplan', 'group_idgroup', 'subject_idsubject', 'subject_type_subject_typeid', 'semester_idsemester', 'employee_idemployee'], 'integer'],
            [['hours'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Plan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idplan' => $this->idplan,
            'group_idgroup' => $this->group_idgroup,
            'subject_idsubject' => $this->subject_idsubject,
            'subject_type_subject_typeid' => $this->subject_type_subject_typeid,
            'semester_idsemester' => $this->semester_idsemester,
            'employee_idemployee' => $this->employee_idemployee,
        ]);

        $query->andFilterWhere(['like', 'hours', $this->hours]);

        return $dataProvider;
    }
}
