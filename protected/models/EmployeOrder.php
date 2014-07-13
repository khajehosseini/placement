<?php

/**
 * This is the model class for table "{{employe_order}}".
 *
 * The followings are the available columns in table '{{employe_order}}':
 * @property integer $id
 * @property integer $karfarma_user_code
 * @property integer $job_code
 * @property string $expert_other
 * @property string $skill_other
 * @property integer $sex
 * @property string $memo
 * @property string $expire_date
 * @property string $create_date
 * @property string $modified_date
 * @property string $confirm_memo
 * @property integer $confirm_user_code
 * @property string $confirm_date
 *
 * The followings are the available model relations:
 * @property Jobs $jobCode
 * @property UserInformation $karfarmaUserCode
 * @property UserInformation $confirmUserCode
 * @property Expert[] $tblExperts
 * @property Skill[] $tblSkills
 */
class EmployeOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{employe_order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('job_code', 'required'),
			array('karfarma_user_code, job_code, sex, confirm_user_code', 'numerical', 'integerOnly'=>true),
			array('expert_other, skill_other, memo, expire_date, modified_date, confirm_memo, confirm_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, karfarma_user_code, job_code, expert_other, skill_other, sex, memo, expire_date, create_date, modified_date, confirm_memo, confirm_user_code, confirm_date', 'safe', 'on'=>'search'),
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
			'jobCode' => array(self::BELONGS_TO, 'Jobs', 'job_code'),
			'karfarmaUserCode' => array(self::BELONGS_TO, 'UserInformation', 'karfarma_user_code'),
			'confirmUserCode' => array(self::BELONGS_TO, 'UserInformation', 'confirm_user_code'),
			'tblExperts' => array(self::MANY_MANY, 'Expert', '{{employe_order_expert}}(employe_order_code, expert_code)'),
			'tblSkills' => array(self::MANY_MANY, 'Skill', '{{employe_order_skill}}(employe_order_code, employe_order_skill)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'karfarma_user_code' => 'Karfarma User Code',
			'job_code' => 'شغل مورد درخواست',
			'expert_other' => 'تخصص های دیگر',
			'skill_other' => 'مهارت های دیگر',
			'sex' => '0 is male , 1 is female , 2 is farghi nemikoneh',
			'memo' => 'توضیحات',
			'expire_date' => 'تاریخ پایان درخواست',
			'create_date' => 'Create Date',
			'modified_date' => 'Modified Date',
			'confirm_memo' => 'Confirm Memo',
			'confirm_user_code' => 'Confirm User Code',
			'confirm_date' => 'تاریخ تایید',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('karfarma_user_code',$this->karfarma_user_code);
		$criteria->compare('job_code',$this->job_code);
		$criteria->compare('expert_other',$this->expert_other,true);
		$criteria->compare('skill_other',$this->skill_other,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('memo',$this->memo,true);
		$criteria->compare('expire_date',$this->expire_date,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('confirm_memo',$this->confirm_memo,true);
		$criteria->compare('confirm_user_code',$this->confirm_user_code);
		$criteria->compare('confirm_date',$this->confirm_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EmployeOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
