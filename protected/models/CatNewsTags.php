<?php

/**
 * This is the model class for table "cat_news_tags".
   */
class CatNewsTags extends CCModel
{
    protected $id; // integer 
    protected $date; // string 
    protected $tag; // string 
    protected $count_items; // integer 
    protected $tag_translate; // string 
    protected $cid_id; // string 

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
			array('count_items', 'numerical', 'integerOnly'=>true),
			array('tag', 'length', 'max'=>25),
			array('tag_translate', 'length', 'max'=>50),
			array('cid_id', 'length', 'max'=>150),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, tag, count_items, tag_translate, cid_id', 'safe', 'on'=>'search'),
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
			'tag' => 'Tag',
			'count_items' => 'Count Items',
			'tag_translate' => 'Tag Translate',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('tag',$this->tag,true);
		$criteria->compare('count_items',$this->count_items);
		$criteria->compare('tag_translate',$this->tag_translate,true);
		$criteria->compare('cid_id',$this->cid_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}