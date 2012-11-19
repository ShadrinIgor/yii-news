<?php

/**
 * This is the model class for table "catalog_country".
   */
class CatalogCountry extends CCModel
{
    protected $id; // integer 
    protected $col; // integer 
    protected $cid; // integer 
    protected $name; // string 
    protected $path; // string 
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
    protected $news; // integer 
    protected $key_word; // string 
    protected $key_word2; // string 
    protected $name2; // string 

    public function attributeNames()
    {
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'catalog_country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('news, key_word, key_word2, name2', 'required'),
			array('col, cid, active, select, pos, user, del, lang_group, id_lang', 'numerical', 'integerOnly'=>true),
			array('name, path', 'length', 'max'=>25),
			array('key_word, key_word2, name2', 'length', 'max'=>50),
			array('dateadd, dateedit, metaData', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, col, cid, name, path, active, select, dateadd, dateedit, pos, metaData, user, del, lang_group, id_lang, news, key_word, key_word2, name2', 'safe', 'on'=>'search'),
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
			'news0' => array(self::BELONGS_TO, 'CatalogNews', 'news'),
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
			'news' => 'News',
			'key_word' => 'Key Word',
			'key_word2' => 'Key Word2',
			'name2' => 'Name2',
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
		$criteria->compare('news',$this->news);
		$criteria->compare('key_word',$this->key_word,true);
		$criteria->compare('key_word2',$this->key_word2,true);
		$criteria->compare('name2',$this->name2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}