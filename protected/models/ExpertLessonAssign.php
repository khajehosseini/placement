<?php

/**
 * This is the model class for table "{{expert_lesson_assign}}".
 *
 * The followings are the available columns in table '{{expert_lesson_assign}}':
 * @property integer $id
 * @property integer $expert_code
 * @property integer $lesson_group_code
 *
 * The followings are the available model relations:
 * @property TLessonGroup $lessonGroupCode
 * @property Expert $expertCode
 */
class ExpertLessonAssign extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $expert_type; 
	public function tableName()
	{
		return '{{expert_lesson_assign}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('expert_code, lesson_group_code', 'required'),
			array('expert_code, lesson_group_code', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, expert_code, lesson_group_code', 'safe', 'on'=>'search'),
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
			'expertCode' => array(self::BELONGS_TO, 'Expert', 'expert_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'expert_code' => 'Expert Code',
			'lesson_group_code' => 'Lesson Group Code',
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
		$criteria->compare('expert_code',$this->expert_code);
		$criteria->compare('lesson_group_code',$this->lesson_group_code);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ExpertLessonAssign the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
