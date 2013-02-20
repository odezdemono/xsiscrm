<?php

/**
 * This is the model class for table "action".
 *
 * The followings are the available columns in table 'action':
 * @property integer $id
 * @property integer $user_id
 * @property string $project_id
 * @property string $action_type_id
 * @property string $start_date
 * @property string $end_date
 * @property string $note
 *
 * The followings are the available model relations:
 * @property ActionType $actionType
 * @property Users $user
 * @property Project $project
 */
class Action extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Action the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'action';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, user_id, project_id, action_type_id, start_date, end_date', 'required'),
			array('id, user_id', 'numerical', 'integerOnly'=>true),
			array('project_id, action_type_id', 'length', 'max'=>11),
			array('note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, project_id, action_type_id, start_date, end_date, note', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'actionType' => array(self::BELONGS_TO, 'ActionType', 'action_type_id'),
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'project_id' => 'Project',
			'action_type_id' => 'Action Type',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'note' => 'Note',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('action_type_id',$this->action_type_id,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}