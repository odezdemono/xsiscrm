<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $source_id
 * @property string $account_type_id
 * @property string $company_id
 * @property integer $active_status
 *
 * The followings are the available model relations:
 * @property Company $company
 * @property AccountType $accountType
 */
class Account extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Account the static model class
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
		return 'account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, source_id, account_type_id, company_id', 'required'),
			//array('source_id, active_status', 'numerical', 'integerOnly'=>true),
			array('source_id', 'numerical', 'integerOnly'=>true),
			array('active_status', 'default', 'value'=>1, 'setOnEmpty'=>false,'on'=>'insert,update'),
			array('first_name, last_name', 'length', 'max'=>100),
			array('account_type_id, company_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, source_id, account_type_id, company_id, active_status', 'safe', 'on'=>'search'),
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
			'company' => array(self::BELONGS_TO, 'Company', 'company_id'),
			'accountType' => array(self::BELONGS_TO, 'AccountType', 'account_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'source_id' => 'Source',
			'account_type_id' => 'Account Type',
			'company_id' => 'Company',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('source_id',$this->source_id);
		$criteria->compare('account_type_id',$this->account_type_id,true);
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('active_status',$this->active_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}