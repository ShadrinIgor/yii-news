<?php

/**
 * This is the model class for table "catalog_users".
   */
class CatalogUsersAuth extends CatalogUsers
{
 	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('email, password', 'required'),
			array('password', 'length', 'max'=>255),
            array('email', 'check_exists_params'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
            array('name, password, surname, fatchname, email, country, city, image', 'safe'),
		);
	}

    public function check_exists_params($attribute,$params)
    {
        if( !$this->hasErrors() )
        {
/*            $user = CatalogUsers::findByAttributes(array("email"=>$this->email, "password"=>md5( $this->password )));
            if( empty($user) || sizeof( $user ) ==0 )$this->addErrors( array(  "0"=>"Вы ввели неверный EMAIL или ПАРОЛЬ" ) );
                else
                {*/
            $identity=new UserIdentity($this->email,$this->password);
            if($identity->authenticate())
                Yii::app()->user->login($identity);
            else
                $this->addErrors( array( "0"=>"Вы ввели неверный EMAIL или ПАРОЛЬ" ) );
//                }
        }
    }
}