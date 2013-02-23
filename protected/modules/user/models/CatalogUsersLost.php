<?php

/**
 * This is the model class for table "catalog_users".
   */
class CatalogUsersLost extends CatalogUsers
{
 	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('email', 'required'),
            array('email', 'check_exists_params'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
            array('email', 'safe'),
		);
	}

    public function check_exists_params($attribute,$params)
    {
        if( !$this->hasErrors() )
        {
            $userList = CatalogUsers::findByAttributes( array( "email"=>$this->email ) );
            if( !empty($userList) && sizeof( $userList )==1 )
            {
                if( $userList[0]->active == 0 )$error = "Ваш аккаунт не активировн";
            }
                $error = "Вы ввели не существующий EMAIL";

            if( !empty( $error ) )
            {
                $this->addErrors( array( "0"=>$error ) );
            }
        }
    }

}