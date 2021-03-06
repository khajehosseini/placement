<?php

/**
 * This is the model class for table "{{t_questions_testi}}".
 *
 * The followings are the available columns in table '{{t_questions_testi}}':
 * @property integer $id
 * @property integer $lesson_group_code
 * @property integer $choice_count
 * @property string $title
 * @property integer $answer
 * @property integer $question_type
 * @property integer $unit
 * @property double $time
 *
 * The followings are the available model relations:
 * @property TQuestionType $questionType
 * @property TLessonGroup $lessonGroupCode
 * @property TQuestionsTestiChoice[] $tQuestionsTestiChoices
 */
class TQuestionsTesti extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{t_questions_testi}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lesson_group_code, choice_count, title, answer, unit, time', 'required'),
			array('lesson_group_code, choice_count, answer, question_type, unit', 'numerical', 'integerOnly'=>true),
			array('time', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lesson_group_code, choice_count, title, answer, question_type, unit, time', 'safe', 'on'=>'search'),
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
			'questionType' => array(self::BELONGS_TO, 'TQuestionType', 'question_type'),
			'lessonGroupCode' => array(self::BELONGS_TO, 'TLessonGroup', 'lesson_group_code'),
			'tQuestionsTestiChoices' => array(self::HAS_MANY, 'TQuestionsTestiChoice', 'question_testi_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lesson_group_code' => 'گروه درسی',
			'choice_count' => 'تعداد گزینه ها',
			'title' => 'عنوان سوال',
			'answer' => 'جواب',
			'question_type' => 'نوع سوال',
			'unit' => 'بارم',
			'time' => 'زمان پسخگویی به سوال',
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
		$criteria->compare('lesson_group_code',$this->lesson_group_code);
		$criteria->compare('choice_count',$this->choice_count);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('answer',$this->answer);
		$criteria->compare('question_type',$this->question_type);
		$criteria->compare('unit',$this->unit);
		$criteria->compare('time',$this->time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TQuestionsTesti the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
