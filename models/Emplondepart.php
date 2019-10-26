<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emplondepart".
 *
 * @property string $id
 * @property string $employee_idemployee
 * @property int $department_iddepartment
 * @property string $post_idpost
 *
 * @property Department $departmentIddepartment
 * @property Post $postIdpost
 * @property Employee $employeeIdemployee
 */
class Emplondepart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emplondepart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_idemployee', 'department_iddepartment', 'post_idpost'], 'required'],
            [['employee_idemployee', 'department_iddepartment', 'post_idpost'], 'integer'],
            [['department_iddepartment'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_iddepartment' => 'iddepartment']],
            [['post_idpost'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_idpost' => 'idpost']],
            [['employee_idemployee'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_idemployee' => 'idemployee']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_idemployee' => 'Employee Idemployee',
            'department_iddepartment' => 'Department Iddepartment',
            'post_idpost' => 'Post Idpost',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartmentIddepartment()
    {
        return $this->hasOne(Department::className(), ['iddepartment' => 'department_iddepartment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostIdpost()
    {
        return $this->hasOne(Post::className(), ['idpost' => 'post_idpost']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployeeIdemployee()
    {
        return $this->hasOne(Employee::className(), ['idemployee' => 'employee_idemployee']);
    }
}
