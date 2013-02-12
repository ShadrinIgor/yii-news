<?php

/**
 * This is the model class for table "catalog_users".
   */
class CatalogUsersRegistration extends CatalogUsers
{
 	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('name, password, password2, email, captcha', 'required'),
            array('password', 'compare', 'compareAttribute'=>'password2'),
            array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true, 'maxSize' => 1048576, 'wrongType'=>'Неправельный тип загружаемого файла', 'tooLarge'=>'Ограничение размера загрузки файла 2mb'),
            array( 'captcha', 'captcha' ),
            /*
             *   авторизованным пользователям код можно не вводить
                'allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),
             */

			array('cid, active, user, type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>35),
			array('password, image', 'length', 'max'=>255),
			array('surname, fatchname', 'length', 'max'=>25),
            array('email', 'email', 'checkMX'=>true ),
            array('email', 'check_exists_email'),
			array('name, password, email, dateadd, dateedit, password2', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cid, name, active, dateadd, dateedit, user, password, surname, fatchname, email, country, city, type, image', 'safe', 'on'=>'search'),
		);
	}
}