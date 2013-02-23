<?php

/**
 * This is the model class for table "catalog_users".
   */
class CatalogUsers extends CCModel
{
    protected $id; // integer
    protected $cid; // integer 
    protected $name; // string 
    protected $active; // integer 
    protected $dateadd; // string 
    protected $dateedit; // string 
    protected $user; // integer 
    protected $password; // string 
    protected $surname; // string 
    protected $fatchname; // string 
    protected $email; // string 
    protected $country; // integer 
    protected $city; // integer 
    protected $type; // integer 
    protected $image; // string 
    protected $country_other; // string 
    protected $del; // integer 
    protected $secret_key; // string
    protected $last_visit; //integer

/*
* Поля - связи
*/
    protected $catalogUsersConfirms; //  CatalogUsersConfirm
    protected $notificationsItems; //  NotificationsItems


    public function attributeNames()
    {
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'catalog_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('name, password, email', 'required'),

			array('cid, active, user, type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>35),
			array('password, image', 'length', 'max'=>255),
			array('surname, fatchname', 'length', 'max'=>25),
            array('email', 'email' ),
            array('email', 'check_exists_email'),
            array('image', 'uploadImage'),
			array('name, password, email, dateadd, dateedit, type, active, last_visit', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('name, password, surname, fatchname, email, country, city, image', 'safe', 'on'=>'search'),
		);
	}

    public function check_exists_email($attribute,$params)
    {
        if( !$this->hasErrors() )
        {
            $conditions = "email=:email";
            $params = array( ":email"=> $this->email );
            if( $this->id >0 )
            {
                $conditions .= " AND id !=:id";
                $params = array_merge( $params, array( ":id"=>$this->id ) );
            }

            $dbCriterii = DBQueryParamsClass::CreateParams()
                ->setConditions( $conditions )
                ->setParams( $params );

            $exists = CatalogUsers::fetchAll( $dbCriterii );
            if( sizeof( $exists )>0 )$this->addErrors( array(  "0"=>"Email:".$this->email.", уже зарегистрирован в системе" ) );
        }
    }

    public function passwordHashMD5($attribute,$params)
    {
        if( !$this->hasErrors() )
        {
            $this->password = md5( $this->password ) ;
        }
    }

    public function uploadImage($attribute,$params)
    {
        if( !$this->hasErrors() && !empty( $this->image ) )
        {
            $ImageObj = CUploadedFile::getInstance($this,'image');
            $ImageObj->saveAs( SiteHelper::getImagePath( $this->tableName(), $this->id ) );
        }
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'country0' => array(self::BELONGS_TO, 'CatalogCountry', 'country'),
			'city0' => array(self::BELONGS_TO, 'CatalogCity', 'city'),
			'catalogUsersConfirms' => array(self::HAS_MANY, 'CatalogUsersConfirm', 'user_id'),
			'notificationsItems' => array(self::HAS_MANY, 'NotificationsItems', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cid' => 'Cid',
			'name' => 'Имя',
			'active' => 'Active',
			'dateadd' => 'Dateadd',
			'dateedit' => 'Dateedit',
			'user' => 'User',
			'password' => 'Пароль',
            'password2' => 'Подтверждение пароля',
			'surname' => 'Фамилия',
			'fatchname' => 'Отчество',
			'email' => 'Email',
			'country' => 'Страна',
			'city' => 'Город',
			'type' => 'Type',
			'image' => 'Фото',
            'country_other' => 'Другой город',
            'captcha' => 'Код с картинки',
            'secret_key' => 'Секретный ключ',
            'last_visit' => 'Дата последнего визита'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('dateadd',$this->dateadd,true);
		$criteria->compare('dateedit',$this->dateedit,true);
		$criteria->compare('user',$this->user);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('fatchname',$this->fatchname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('city',$this->city);
		$criteria->compare('type',$this->type);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('country_other',$this->country_other,true);
		$criteria->compare('del',$this->del);
		$criteria->compare('secret_key',$this->secret_key,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    // описываем событие onRegistration
    public function onRegistration($event)
    {
        if($this->hasEventHandler('onRegistration'))
            $this->raiseEvent('onRegistration', $event);
    }

    // описываем событие onRegistrationConfirm
    public function onRegistrationConfirm($event)
    {
        if($this->hasEventHandler('onRegistrationConfirm'))
            $this->raiseEvent('onRegistrationConfirm', $event);
    }

    public function onLogin( $event )
    {
        if($this->hasEventHandler('onLogin'))
            $this->raiseEvent('onLogin', $event);
    }
}