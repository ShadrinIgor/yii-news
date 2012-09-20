<?php

/**
 * This is the model class for table "catalog_news".
 *
 * The followings are the available columns in table 'catalog_news':
 * @property integer $id
 * @property integer $col
 * @property integer $cid
 * @property string $name
 * @property string $path
 * @property string $description
 * @property integer $active
 * @property integer $select
 * @property string $dateadd
 * @property string $dateedit
 * @property integer $pos
 * @property string $metaData
 * @property integer $user
 * @property integer $del
 * @property integer $lang_group
 * @property integer $id_lang
 * @property string $key_word
 * @property integer $country
 * @property string $image
 * @property string $cid_id
 * @property string $date
 * @property string $time
 * @property string $tags
 * @property integer $archive
 * @property integer $people
 * @property string $tags_
 * @property string $image_2
 * @property string $image_3
 * @property string $source
 * @property integer $video
 * @property integer $tags_checked
 */
class CatalogNews extends CCModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CatalogNews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
			array('name, description, key_word, country, image, cid_id, date, time, tags, archive, people, tags_, image_2, image_3, source, video, tags_checked', 'required'),
			array('col, cid, active, select, pos, user, del, lang_group, id_lang, country, archive, people, video, tags_checked', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>150),
			array('path, cid_id', 'length', 'max'=>25),
			array('key_word', 'length', 'max'=>250),
			array('image, image_2, image_3, source', 'length', 'max'=>255),
			array('time', 'length', 'max'=>10),
			array('dateadd, dateedit, metaData', 'safe'),
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
		);
	}

    public function attributeNames()
    {

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
		$criteria->compare('cid_id',$this->cid_id,true);
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