<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property string $id
 * @property string $name
 * @property string $note
 * @property string $company_id
 * @property string $project_type_id
 * @property integer $reference_type_id
 * @property string $estimate_budget
 * @property integer $activive_status
 *
 * The followings are the available model relations:
 * @property Action[] $actions
 * @property ProjectType $projectType
 * @property Company $company
 * @property ProjectStatus[] $projectStatuses
 * @property Technology[] $technologys
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, company_id, project_type_id, reference_type_id, estimate_budget', 'required'),
			array('reference_type_id', 'numerical', 'integerOnly'=>true),
			array('active_status', 'default', 'value'=>1, 'setOnEmpty'=>false,'on'=>'insert,update'),
			array('name', 'length', 'max'=>255),
			array('company_id, project_type_id', 'length', 'max'=>11),
			array('company_id', 'length', 'max'=>100),
			array('estimate_budget', 'length', 'max'=>20),
			array('note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, note, company_id, project_type_id, reference_type_id, estimate_budget, activive_status', 'safe', 'on'=>'search'),
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
			'actions' => array(self::HAS_MANY, 'Action', 'project_id'),
			'projectType' => array(self::BELONGS_TO, 'ProjectType', 'project_type_id'),
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'projectStatuses' => array(self::HAS_MANY, 'ProjectStatus', 'project_id'),
			'technologys' => array(self::MANY_MANY, 'Technology', 'project_technology(project_id, technology_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'note' => 'Note',
			'company_id' => 'Company',
			'project_type_id' => 'Project Type',
			'reference_type_id' => 'Reference Type',
			'estimate_budget' => 'Estimate Budget',
			'active_status' => 'Activive Status',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('project_type_id',$this->project_type_id,true);
		$criteria->compare('reference_type_id',$this->reference_type_id);
		$criteria->compare('estimate_budget',$this->estimate_budget,true);
		$criteria->compare('active_status',$this->active_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function suggest($keyword,$limit=20)
	{
		$models=$this->findAll(array(
			'condition'=>'name LIKE :keyword',
			'order'=>'name',
			'limit'=>$limit,
			'params'=>array(':keyword'=>"%$keyword%")
		));
		$suggest=array();
		foreach($models as $model) {
			$suggest[] = array(
				'label'=>$model->name,  // label for dropdown list
				'value'=>$model->name,  // value for input field
				'id'=>$model->id,       // return values from autocomplete
			);
		}
		return $suggest;
	}
}