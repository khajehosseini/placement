<?php

/**
 * This is the model class for table "{{upload}}".
 *
 * The followings are the available columns in table '{{upload}}':
 * @property integer $id
 * @property integer $user_code
 * @property integer $upload_type_code
 * @property string $filename
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property UserInformation $userCode
 * @property UploadType $uploadTypeCode
 */
class Upload extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{upload}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_code, upload_type_code', 'required'),
			array('user_code, upload_type_code', 'numerical', 'integerOnly'=>true),
			array('filename', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_code, upload_type_code, filename, create_date', 'safe', 'on'=>'search'),
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
			'userCode' => array(self::BELONGS_TO, 'UserInformation', 'user_code'),
			'uploadTypeCode' => array(self::BELONGS_TO, 'UploadType', 'upload_type_code'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_code' => 'User Code',
			'upload_type_code' => 'Upload Type Code',
			'filename' => 'Filename',
			'create_date' => 'Create Date',
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
		$criteria->compare('user_code',$this->user_code);
		$criteria->compare('upload_type_code',$this->upload_type_code);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Upload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
