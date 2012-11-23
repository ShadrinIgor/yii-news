<?php

/**
 * This is the model class for table "cat_news_tags".
   */
class CatNewsTags extends CCModel
{
    protected $id; // integer 
    protected $date; // string 
    protected $name; // string 
    protected $count_items; // integer 
    protected $tag_translate; // string 
    protected $cid_id; // string 
    protected $del; // integer 
    protected $checked; // integer 

/*
* Поля - связи
*/
    protected $catNewsTagsRelations; //  CatNewsTagsRelation


    public function attributeNames()
    {
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cat_news_tags';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tag_translate, cid_id', 'required'),
			array('count_items, del, checked', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>25),
			array('tag_translate', 'length', 'max'=>50),
			array('cid_id', 'length', 'max'=>150),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, name, count_items, tag_translate, cid_id, del, checked', 'safe', 'on'=>'search'),
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
			'catNewsTagsRelations' => array(self::HAS_MANY, 'CatNewsTagsRelation', 'tag_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Date',
			'name' => 'Name',
			'count_items' => 'Count Items',
			'tag_translate' => 'Tag Translate',
			'cid_id' => 'Cid',
			'del' => 'Del',
			'checked' => 'Checked',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('count_items',$this->count_items);
		$criteria->compare('tag_translate',$this->tag_translate,true);
		$criteria->compare('cid_id',$this->cid_id,true);
		$criteria->compare('del',$this->del);
		$criteria->compare('checked',$this->checked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}