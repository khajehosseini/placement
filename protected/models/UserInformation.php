<?php

/**
 * This is the model class for table "{{user_information}}".
 *
 * The followings are the available columns in table '{{user_information}}':
 * @property integer $id
 * @property string $birth_date
 * @property integer $sex
 * @property string $email
 * @property string $meli_num
 * @property integer $marrie_status
 * @property string $photo
 * @property string $address
 * @property integer $state_code
 * @property integer $city_code
 * @property string $zone
 * @property string $telephone
 * @property integer $personnel_count
 * @property string $act_history
 * @property string $act_type
 * @property integer $education_code
 * @property string $elementary_name
 * @property string $low_school_name
 * @property string $high_school_name
 * @property string $university_name
 * @property integer $certification_num
 * @property string $certification_date
 * @property string $resume_act
 * @property string $favorite
 * @property string $expert_other
 * @property string $skill_other
 * @property integer $religion_code
 * @property integer $religion_other
 * @property integer $confirm
 * @property string $reason
 * @property integer $confirm_user_code
 * @property integer $payment_status
 *
 * The followings are the available model relations:
 * @property EmployeOrder[] $employeOrders
 * @property EmployeOrder[] $employeOrders1
 * @property EmploymentLog[] $employmentLogs
 * @property EmploymentLog[] $employmentLogs1
 * @property Upload[] $uploads
 * @property Expert[] $tblExperts
 * @property State $stateCode
 * @property City $cityCode
 * @property Education $educationCode
 * @property Religion $religionCode
 * @property UserInformation $confirmUserCode
 * @property UserInformation[] $userInformations
 * @property Skill[] $tblSkills
 * @property Workhouse[] $workhouses
 */
class UserInformation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user_information}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required' ,'on'=>'leveltwo'),
			array('id, sex, marrie_status, state_code, city_code, personnel_count, education_code, certification_num, religion_code, religion_other, confirm, confirm_user_code, payment_status', 'numerical', 'integerOnly'=>true),
			array('email, photo, zone, telephone, act_history, act_type, elementary_name, low_school_name, high_school_name, university_name', 'length', 'max'=>255),
			array('meli_num', 'length', 'max'=>10),
			array('birth_date, address, certification_date, resume_act, favorite, expert_other, skill_other, reason', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, birth_date, sex, email, meli_num, marrie_status, photo, address, state_code, city_code, zone, telephone, personnel_count, act_history, act_type, education_code, elementary_name, low_school_name, high_school_name, university_name, certification_num, certification_date, resume_act, favorite, expert_other, skill_other, religion_code, religion_other, confirm, reason, confirm_user_code, payment_status', 'safe', 'on'=>'search'),
			array('sex, marrie_status, state_code, city_code, religion_code,  religion_other, zone, telephone, meli_num, birth_date' , 'safe','on'=>'levelone'),
			array('personnel_count, act_history,act_type' , 'safe','on'=>'leveltwo'),
			array('education_code, elementary_name, high_school_name, university_name' , 'safe','on'=>'levelthree'),
			array('resume_act, favorite' , 'safe','on'=>'levelseven'),
			
		
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
			'employeOrders' => array(self::HAS_MANY, 'EmployeOrder', 'karfarma_user_code'),
			'employeOrders1' => array(self::HAS_MANY, 'EmployeOrder', 'confirm_user_code'),
			'employmentLogs' => array(self::HAS_MANY, 'EmploymentLog', 'karjo_user_code'),
			'employmentLogs1' => array(self::HAS_MANY, 'EmploymentLog', 'karfarma_user_code'),
			'uploads' => array(self::HAS_MANY, 'Upload', 'user_code'),
			'tblExperts' => array(self::MANY_MANY, 'Expert', '{{user_expert}}(user_code, expert_code)'),
			'stateCode' => array(self::BELONGS_TO, 'State', 'state_code'),
			'cityCode' => array(self::BELONGS_TO, 'City', 'city_code'),
			'educationCode' => array(self::BELONGS_TO, 'Education', 'education_code'),
			'religionCode' => array(self::BELONGS_TO, 'Religion', 'religion_code'),
			'confirmUserCode' => array(self::BELONGS_TO, 'UserInformation', 'confirm_user_code'),
			'userInformations' => array(self::HAS_MANY, 'UserInformation', 'confirm_user_code'),
			'tblSkills' => array(self::MANY_MANY, 'Skill', '{{user_skill}}(user_code, skill_code)'),
			'workhouses' => array(self::HAS_MANY, 'Workhouse', 'user_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'شمارۀ عضویت',
			'birth_date' => 'تاریخ تولد',
			'sex' => '0 is male , 1 is female',
			'email' => 'Email',
			'meli_num' => 'شماره ملی',
			'marrie_status' => '0 is Unmarried , 1 is Married  وضعیت تاهل',
			'photo' => 'تصویر پرسنلی',
			'address' => 'Address',
			'state_code' => 'استان',
			'city_code' => 'شهر',
			'zone' => 'منطقه',
			'telephone' => 'تلفن ثابت بیشتر یکی با کاما یا خط تیره جدا می شود',
			'personnel_count' => 'تعداد پرسنل',
			'act_history' => 'سابقه فعالیت',
			'act_type' => 'نوع فعالیت',
			'education_code' => 'تحصیلات',
			'elementary_name' => 'نام  مدرسه دبستان',
			'low_school_name' => 'نام مدرسه راهنمایی',
			'high_school_name' => 'نام دبیرستان',
			'university_name' => 'نام دانشگاه',
			'certification_num' => 'شماره گواهی',
			'certification_date' => 'Certification Date',
			'resume_act' => 'رزومه فعالیتها',
			'favorite' => 'علایق',
			'expert_other' => 'تخصص های دیگر',
			'skill_other' => 'مهارت های دیگر',
			'religion_code' => 'Religion Code',
			'religion_other' => 'کیش و آیین دیگر',
			'confirm' => '0 is confirm , 1 is nonconfirm',
			'reason' => 'Reason',
			'confirm_user_code' => 'Confirm User Code',
			'payment_status' => '0 is pole nadeh , 1 is pole dadeh',
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
		$criteria->compare('birth_date',$this->birth_date,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('meli_num',$this->meli_num,true);
		$criteria->compare('marrie_status',$this->marrie_status);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('state_code',$this->state_code);
		$criteria->compare('city_code',$this->city_code);
		$criteria->compare('zone',$this->zone,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('personnel_count',$this->personnel_count);
		$criteria->compare('act_history',$this->act_history,true);
		$criteria->compare('act_type',$this->act_type,true);
		$criteria->compare('education_code',$this->education_code);
		$criteria->compare('elementary_name',$this->elementary_name,true);
		$criteria->compare('low_school_name',$this->low_school_name,true);
		$criteria->compare('high_school_name',$this->high_school_name,true);
		$criteria->compare('university_name',$this->university_name,true);
		$criteria->compare('certification_num',$this->certification_num);
		$criteria->compare('certification_date',$this->certification_date,true);
		$criteria->compare('resume_act',$this->resume_act,true);
		$criteria->compare('favorite',$this->favorite,true);
		$criteria->compare('expert_other',$this->expert_other,true);
		$criteria->compare('skill_other',$this->skill_other,true);
		$criteria->compare('religion_code',$this->religion_code);
		$criteria->compare('religion_other',$this->religion_other);
		$criteria->compare('confirm',$this->confirm);
		$criteria->compare('reason',$this->reason,true);
		$criteria->compare('confirm_user_code',$this->confirm_user_code);
		$criteria->compare('payment_status',$this->payment_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserInformation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
