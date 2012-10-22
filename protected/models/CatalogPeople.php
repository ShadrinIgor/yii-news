<?php

/**
 * This is the model class for table "catalog_people".
   */
class CatalogPeople extends CCModel
{
    protected $id; // integer 
    protected $col; // integer 
    protected $cid; // integer 
    protected $name; // string 
    protected $path; // string 
    protected $description; // string 
    protected $image; // string 
    protected $active; // integer 
    protected $select; // integer 
    protected $dateadd; // string 
    protected $dateedit; // string 
    protected $pos; // integer 
    protected $metaData; // string 
    protected $user; // integer 
    protected $del; // integer 
    protected $lang_group; // integer 
    protected $id_lang; // integer 
    protected $www; // string 
    protected $key_word; // string 
    protected $country; // string 
    protected $cid_id; // string 

    public function attributeNames()
    {
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'catalog_people';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, www, key_word, country, cid_id', 'required'),
			array('col, cid, active, select, pos, user, del, lang_group, id_lang', 'numerical', 'integerOnly'=>true),
			array('name, image', 'length', 'max'=>255),
			array('path, country, cid_id', 'length', 'max'=>25),
			array('www', 'length', 'max'=>50),
			array('key_word', 'length', 'max'=>150),
			array('description, dateadd, dateedit, metaData', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, col, cid, name, path, description, image, active, select, dateadd, dateedit, pos, metaData, user, del, lang_group, id_lang, www, key_word, country, cid_id', 'safe', 'on'=>'search'),
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
			'catalogNews' => array(self::HAS_MANY, 'CatalogNews', 'people'),
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
			'path' => 'Path',
			'description' => 'Description',
			'image' => 'Image',
			'active' => 'Active',
			'select' => 'Select',
			'dateadd' => 'Dateadd',
			'dateedit' => 'Dateedit',
			'pos' => 'Pos',
			'metaData' => 'Meta Data',
			'user' => 'User',
			'del' => 'Del',
			'lang_group' => 'Lang Group',
			'id_lang' => 'Id Lang',
			'www' => 'Www',
			'key_word' => 'Key Word',
			'country' => 'Country',
			'cid_id' => 'Cid',
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
		$criteria->compare('path',$this->path,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('select',$this->select);
		$criteria->compare('dateadd',$this->dateadd,true);
		$criteria->compare('dateedit',$this->dateedit,true);
		$criteria->compare('pos',$this->pos);
		$criteria->compare('metaData',$this->metaData,true);
		$criteria->compare('user',$this->user);
		$criteria->compare('del',$this->del);
		$criteria->compare('lang_group',$this->lang_group);
		$criteria->compare('id_lang',$this->id_lang);
		$criteria->compare('www',$this->www,true);
		$criteria->compare('key_word',$this->key_word,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('cid_id',$this->cid_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}