<?php

/**
 * ActivationMoblieForm class.
 * ActivationMoblie is the data structure for keeping
 * Activation Moblie form data. 
 */
class ActivationMoblieForm extends CFormModel
{
	public $username;
	public $moblie;
	public $activkeymoblie;


	/**
	 * Declares the validation rules.
	 * The rules state that username and moblie are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, moblie,activkeymoblie', 'required'),
			array('moblie', 'length'	,	'max'	=>	11	,	'min'	=>	11		,'message' => UserModule::t("Incorrect moblie (length 11 characters).")),
			array('moblie', 'numerical'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>UserModule::t("username"),
			'moblie'=>UserModule::t("moblie"),
			'activkeymoblie'=>UserModule::t("activkeymoblie"),
		);
	}

}
