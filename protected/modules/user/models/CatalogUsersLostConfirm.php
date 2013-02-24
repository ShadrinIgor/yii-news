<?php

/**
 * This is the model class for table "catalog_users".
   */
class CatalogUsersLostConfirm extends CatalogUsers
{
    protected $password2; // string

 	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('password, password2', 'required'),
            array('password', 'compare', 'compareAttribute'=>'password2'),
            array('password', 'check_passwords'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
            array('password, password2', 'safe'),
		);
	}

    public function check_passwords($attribute,$params)
    {
        if( !$this->hasErrors() )
        {
            $userList = CatalogUsers::findByAttributes( array( "email"=>$this->email ), 0 );

            if( !empty($userList) && sizeof( $userList )==1 )
            {
                // Если в базе уже сужествует запросы на востановление, до удаляем его
                $existConfirm = CatalogUsersConfirm::findByAttributes( array( "user_id"=>$userList[0]->id, "type"=>"lostpassword" ) );
                if( sizeof( $existConfirm )>0 )$existConfirm[0]->delete();

                if( $userList[0]->active == 0 )$error = "Ваш аккаунт не активировн";
            }
                else $error = "Вы ввели не существующий EMAIL";

            if( !empty( $error ) )
            {
                $this->addErrors( array( "0"=>$error ) );
            }
        }
    }

}