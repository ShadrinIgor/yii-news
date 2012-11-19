<?php

/**
 * This is the model class for table "cat_news_tags_relation".
   */
class CatNewsTagsRelation extends CCModel
{
    protected $id; // integer 
    protected $news_id; // integer 
    protected $tag_id; // integer 
    protected $name; // string 
    protected $del; // integer 

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
		return 'cat_news_tags_relation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, del', 'required'),
			array('del', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, news_id, tag_id, name, del', 'safe', 'on'=>'search'),
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
			'tag' => array(self::BELONGS_TO, 'CatNewsTags', 'tag_id'),
			'news' => array(self::BELONGS_TO, 'CatalogNews', 'news_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'news_id' => 'News',
			'tag_id' => 'Tag',
			'name' => 'Name',
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
		$criteria->compare('news_id',$this->news_id);
		$criteria->compare('tag_id',$this->tag_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('del',$this->del);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}