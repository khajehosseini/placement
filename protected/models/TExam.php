<?php

/**
 * This is the model class for table "{{t_exam}}".
 *
 * The followings are the available columns in table '{{t_exam}}':
 * @property integer $id
 * @property string $title
 * @property integer $lesson_group_code
 * @property integer $testi_conut
 * @property integer $tashrihi_count
 * @property integer $status
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property TLessonGroup $lessonGroupCode
 * @property TUserExam[] $tUserExams
 */
class TExam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{t_exam}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, lesson_group_code, testi_conut, tashrihi_count, create_date', 'required'),
			array('lesson_group_code, testi_conut, tashrihi_count, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, lesson_group_code, testi_conut, tashrihi_count, status, create_date', 'safe', 'on'=>'search'),
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
			'lessonGroupCode' => array(self::BELONGS_TO, 'TLessonGroup', 'lesson_group_code'),
			'tUserExams' => array(self::HAS_MANY, 'TUserExam', 'exam_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'عنوان آزمون',
			'lesson_group_code' => 'گروه درسی',
			'testi_conut' => 'تعداد تستی',
			'tashrihi_count' => 'تعداد تشریحی',
			'status' => ' 1 is active , 0 is inactive',
			'create_date' => 'تاریخ ایجاد',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('lesson_group_code',$this->lesson_group_code);
		$criteria->compare('testi_conut',$this->testi_conut);
		$criteria->compare('tashrihi_count',$this->tashrihi_count);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TExam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
