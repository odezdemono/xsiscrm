<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property string $id
 * @property string $name
 * @property string $address
 * @property string $industry_type_id
 * @property string $note
 * @property integer $active_status
 *
 * The followings are the available model relations:
 * @property Account[] $accounts
 * @property IndustryType $industryType
 * @property Project[] $projects
 */
class Company extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Company the static model class
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
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, industry_type_id', 'required'),
			//array('active_status', 'numerical', 'integerOnly'=>true),
			array('active_status', 'default', 'value'=>1, 'setOnEmpty'=>false,'on'=>'insert,update'),
			array('name', 'length', 'max'=>100),
			array('address', 'length', 'max'=>255),
			array('industry_type_id', 'length', 'max'=>11),
			array('note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, industry_type_id, note, active_status', 'safe', 'on'=>'search'),
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
			'accounts' => array(self::HAS_MANY, 'Account', 'company_id'),
			'industryType' => array(self::BELONGS_TO, 'IndustryType', 'industry_type_id'),
			'projects' => array(self::HAS_MANY, 'Project', 'company_id'),
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
			'address' => 'Address',
			'industry_type_id' => 'Industry Type',
			'note' => 'Note',
			'active_status' => 'Active Status',
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('industry_type_id',$this->industry_type_id,true);
		$criteria->compare('note',$this->note,true);
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
				'label'=>$model->name.' - '.$model->address,  // label for dropdown list
				'value'=>$model->name,  // value for input field
				'id'=>$model->id,       // return values from autocomplete
			);
		}
		return $suggest;
	}
	
}