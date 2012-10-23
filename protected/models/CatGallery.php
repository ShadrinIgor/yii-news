<?php

/**
 * This is the model class for table "cat_gallery".
   */
class CatGallery extends CCModel
{
    protected $id; // integer 
    protected $image; // string 
    protected $image_2; // string 
    protected $image_3; // string 
    protected $name_table; // string 
    protected $item_id; // integer 
    protected $link; // string 
    protected $title; // string 
    protected $flash; // integer 
    protected $del; // integer 

    public function attributeNames()
    {
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cat_gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('image, name_table, item_id', 'required'),
			array('item_id, flash, del', 'numerical', 'integerOnly'=>true),
			array('image, image_2, image_3, name_table, link, title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, image, image_2, image_3, name_table, item_id, link, title, flash, del', 'safe', 'on'=>'search'),
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
			'image' => 'Image',
			'image_2' => 'Image 2',
			'image_3' => 'Image 3',
			'name_table' => 'Name Table',
			'item_id' => 'Item',
			'link' => 'Link',
			'title' => 'Title',
			'flash' => 'Flash',
			'del' => 'Del',
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
		$criteria->compare('image',$this->image,true);
		$criteria->compare('image_2',$this->image_2,true);
		$criteria->compare('image_3',$this->image_3,true);
		$criteria->compare('name_table',$this->name_table,true);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('flash',$this->flash);
		$criteria->compare('del',$this->del);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}