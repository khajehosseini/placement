<?php

/**
 * This is the model class for table "{{user_skill}}".
 *
 * The followings are the available columns in table '{{user_skill}}':
 * @property integer $user_code
 * @property integer $skill_code
 */
class UserSkill extends CActiveRecord
{
	public $skill_type_code;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user_skill}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_code, skill_code', 'required'),
			array('user_code, skill_code', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_code, skill_code', 'safe', 'on'=>'search'),
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
			'userSkill' => array(self::BELONGS_TO, 'Skill', 'skill_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_code' => 'User Code',
			'skill_code' => 'Skill Code',
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

		$criteria->compare('user_code',$this->user_code);
		$criteria->compare('skill_code',$this->skill_code);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserSkill the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
