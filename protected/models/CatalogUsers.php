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
    protected $password2; // string
    protected $surname; // string 
    protected $fatchname; // string 
    protected $email; // string 
    protected $country; // integer 
    protected $city; // integer 
    protected $type; // integer 
    protected $image; // string
    protected $country_other; //string
    protected $captcha; //string

/*
* Поля - связи
*/


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
            array('surname', 'required'), //для регистрации
            array('password', 'compare', 'compareAttribute'=>'password2', 'on'=>'register'),          //для регистрации

			array('cid, active, user, type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>35),
			array('password, image', 'length', 'max'=>255),
			array('surname, fatchname', 'length', 'max'=>25),
            array('email', 'email' ),
            array('email', 'check_exists_email'),
			array('name, password, email, dateadd, dateedit, password2', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cid, name, active, dateadd, dateedit, user, password, surname, fatchname, email, country, city, type, image', 'safe', 'on'=>'search'),
		);
	}

    public function check_exists_email($attribute,$params)
    {
        $this->addErrors( array(  "0"=>"Полный пипец".$this->email ) );
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}