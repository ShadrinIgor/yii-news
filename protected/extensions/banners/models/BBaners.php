<?php

/**
 * This is the model class for table "b_baners".
   */
class BBaners extends CCModel
{
    protected $id; // integer 
    protected $name; // string 
    protected $image; // string 
    protected $href; // string 
    protected $cid; // integer 
    protected $key; // string 
    protected $default; // integer 
    protected $page; // integer 
    protected $type; // integer 
    protected $width; // integer 
    protected $height; // integer 
    protected $through; // string 
    protected $count_show; // integer 
    protected $inner_page; // integer 
    protected $email; // string 
    protected $start_date; // string 
    protected $finish_date; // string 
    protected $finish_count_show; // integer 
    protected $active; // integer 

    public function attributeNames()
    {
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'b_baners';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('key', 'required'),
			array('default, page, width, height, count_show, inner_page, finish_count_show, active', 'numerical', 'integerOnly'=>true),
			array('name, image, href, email', 'length', 'max'=>50),
			array('key, through', 'length', 'max'=>25),
			array('start_date, finish_date', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, image, href, cid, key, default, page, type, width, height, through, count_show, inner_page, email, start_date, finish_date, finish_count_show, active', 'safe', 'on'=>'search'),
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
			'c' => array(self::BELONGS_TO, 'BCategory', 'cid'),
			'type0' => array(self::BELONGS_TO, 'BKeys', 'type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'image' => 'Image',
			'href' => 'Href',
			'cid' => 'Cid',
			'key' => 'Key',
			'default' => 'Default',
			'page' => 'Page',
			'type' => 'Type',
			'width' => 'Width',
			'height' => 'Height',
			'through' => 'Through',
			'count_show' => 'Count Show',
			'inner_page' => 'Inner Page',
			'email' => 'Email',
			'start_date' => 'Start Date',
			'finish_date' => 'Finish Date',
			'finish_count_show' => 'Finish Count Show',
			'active' => 'Active',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('href',$this->href,true);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('default',$this->default);
		$criteria->compare('page',$this->page);
		$criteria->compare('type',$this->type);
		$criteria->compare('width',$this->width);
		$criteria->compare('height',$this->height);
		$criteria->compare('through',$this->through,true);
		$criteria->compare('count_show',$this->count_show);
		$criteria->compare('inner_page',$this->inner_page);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('finish_date',$this->finish_date,true);
		$criteria->compare('finish_count_show',$this->finish_count_show);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}