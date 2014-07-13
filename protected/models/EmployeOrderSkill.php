<?php

/**
 * This is the model class for table "{{employe_order_skill}}".
 *
 * The followings are the available columns in table '{{employe_order_skill}}':
 * @property integer $employe_order_code
 * @property integer $employe_order_skill
 */
class EmployeOrderSkill extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{employe_order_skill}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employe_order_code, employe_order_skill', 'required'),
			array('employe_order_code, employe_order_skill', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('employe_order_code, employe_order_skill', 'safe', 'on'=>'search'),
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
			'Skills' => array(self::HAS_MANY, 'Skill', array('id'	=>	'employe_order_skill')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'employe_order_code' => 'Employe Order Code',
			'employe_order_skill' => 'Employe Order Skill',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('employe_order_code',$this->employe_order_code);
		$criteria->compare('employe_order_skill',$this->employe_order_skill);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EmployeOrderSkill the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
