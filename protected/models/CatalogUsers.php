<?php

/**
 * This is the model class for table "catalog_users".
   */
class CatalogUsers extends CCModel
{
    protected $id; // integer 
    protected $col; // integer 
    protected $cid; // integer 
    protected $name; // string 
    protected $active; // integer 
    protected $dateadd; // string 
    protected $dateedit; // string 
    protected $pos; // integer 
    protected $metaData; // string 
    protected $user; // integer 
    protected $del; // integer 
    protected $id_lang; // integer 
    protected $password; // string 
    protected $u_name; // string 
    protected $u_surname; // string 
    protected $u_fatchname; // string 
    protected $email; // string 
    protected $country; // integer 
    protected $city; // integer 
    protected $type; // integer 
    protected $image; // string 

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
			array('name, password, u_name, u_surname, u_fatchname, email, country, city, type, image', 'required'),
			array('col, cid, active, pos, user, del, id_lang, country, city, type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>35),
			array('password, image', 'length', 'max'=>255),
			array('u_name, email', 'length', 'max'=>50),
			array('u_surname, u_fatchname', 'length', 'max'=>25),
			array('dateadd, dateedit, metaData', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, col, cid, name, active, dateadd, dateedit, pos, metaData, user, del, id_lang, password, u_name, u_surname, u_fatchname, email, country, city, type, image', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'col' => 'Col',
			'cid' => 'Cid',
			'name' => 'Name',
			'active' => 'Active',
			'dateadd' => 'Dateadd',
			'dateedit' => 'Dateedit',
			'pos' => 'Pos',
			'metaData' => 'Meta Data',
			'user' => 'User',
			'del' => 'Del',
			'id_lang' => 'Id Lang',
			'password' => 'Password',
			'u_name' => 'U Name',
			'u_surname' => 'U Surname',
			'u_fatchname' => 'U Fatchname',
			'email' => 'Email',
			'country' => 'Country',
			'city' => 'City',
			'type' => 'Type',
			'image' => 'Image',
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
		$criteria->compare('col',$this->col);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('dateadd',$this->dateadd,true);
		$criteria->compare('dateedit',$this->dateedit,true);
		$criteria->compare('pos',$this->pos);
		$criteria->compare('metaData',$this->metaData,true);
		$criteria->compare('user',$this->user);
		$criteria->compare('del',$this->del);
		$criteria->compare('id_lang',$this->id_lang);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('u_name',$this->u_name,true);
		$criteria->compare('u_surname',$this->u_surname,true);
		$criteria->compare('u_fatchname',$this->u_fatchname,true);
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