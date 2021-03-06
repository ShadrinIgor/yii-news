<?php

/**
 * This is the model class for table "catalog_news".
   */
class CatalogNews extends CCModel
{
    protected $id; // integer 
    protected $col; // integer 
    protected $cid; // integer 
    protected $name; // string 
    protected $path; // string 
    protected $description; // string 
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
    protected $key_word; // string 
    protected $country; // integer 
    protected $image; // string 
    protected $cid_id; // integer 
    protected $date; // string 
    protected $time; // string 
    protected $tags; // string 
    protected $archive; // integer 
    protected $people; // integer 
    protected $tags_; // string 
    protected $image_2; // string 
    protected $image_3; // string 
    protected $source; // string 
    protected $video; // integer 
    protected $tags_checked; // integer 

/*
* Поля - связи
*/
    protected $list_tags; //  CatNewsTagsRelation

    public function attributeNames()
    {
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'catalog_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, key_word, country, cid_id, date, archive', 'required'),
			array('col, cid, active, select, pos, user, del, lang_group, id_lang, archive, video, tags_checked', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>150),
			array('path', 'length', 'max'=>25),
			array('key_word', 'length', 'max'=>250),
			array('image, image_2, image_3, source', 'length', 'max'=>255),
			array('time', 'length', 'max'=>10),
			array('dateadd, dateedit, metaData, tags, tags_', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, col, cid, name, path, description, active, select, dateadd, dateedit, pos, metaData, user, del, lang_group, id_lang, key_word, country, image, cid_id, date, time, tags, archive, people, tags_, image_2, image_3, source, video, tags_checked', 'safe', 'on'=>'search'),
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
			'list_tags' => array(self::HAS_MANY, 'CatNewsTagsRelation', 'news_id'),
			'cid0' => array(self::BELONGS_TO, 'CatalogCid', 'cid_id'),
			'country0' => array(self::BELONGS_TO, 'CatalogCountry', 'country'),
			'people0' => array(self::BELONGS_TO, 'CatalogPeople', 'people'),
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
			'key_word' => 'Key Word',
			'country' => 'Country',
			'image' => 'Image',
			'cid_id' => 'Cid',
			'date' => 'Date',
			'time' => 'Time',
			'tags' => 'Tags',
			'archive' => 'Archive',
			'people' => 'People',
			'tags_' => 'Tags',
			'image_2' => 'Image 2',
			'image_3' => 'Image 3',
			'source' => 'Source',
			'video' => 'Video',
			'tags_checked' => 'Tags Checked',
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
		$criteria->compare('key_word',$this->key_word,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('cid_id',$this->cid_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('archive',$this->archive);
		$criteria->compare('people',$this->people);
		$criteria->compare('tags_',$this->tags_,true);
		$criteria->compare('image_2',$this->image_2,true);
		$criteria->compare('image_3',$this->image_3,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('video',$this->video);
		$criteria->compare('tags_checked',$this->tags_checked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}