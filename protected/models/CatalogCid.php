<?php

/**
 * This is the model class for table "catalog_cid".
 *
 * The followings are the available columns in table 'catalog_cid':
 *
 * The followings are the available model relations:
 * @property CatalogNews[] $catalogNews
 */
class CatalogCid extends CCModel
{
    private $id; // integer 
    private $col; // integer 
    private $cid; // integer 
    private $name; // string 
    private $path; // string 
    private $active; // integer 
    private $select; // integer 
    private $dateadd; // string 
    private $dateedit; // string 
    private $pos; // integer 
    private $metaData; // string 
    private $user; // integer 
    private $del; // integer 
    private $lang_group; // integer 
    private $id_lang; // integer 
    private $owner; // string 
    private $key_word; // string 
    private $link; // string 
    private $show_in_menu; // string 

    public function __get( $field )
    {
        if( !empty( $this->$field ) )return $this->$field;
    }

    public function __set( $field, $value )
    {
        $this->$field = $value;
    }

    public function getCidId()
    {
        return CatalogNews::fetch( $this->cid_id );
    }

    public function attributeNames()
    {
    }

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CatalogCid the static model class
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
		return 'catalog_cid';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, owner, key_word, link, show_in_menu', 'required'),
			array('col, cid, active, select, pos, user, del, lang_group, id_lang', 'numerical', 'integerOnly'=>true),
			array('name, key_word', 'length', 'max'=>50),
			array('path, owner', 'length', 'max'=>25),
			array('link', 'length', 'max'=>255),
			array('show_in_menu', 'length', 'max'=>1),
			array('dateadd, dateedit, metaData', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, col, cid, name, path, active, select, dateadd, dateedit, pos, metaData, user, del, lang_group, id_lang, owner, key_word, link, show_in_menu', 'safe', 'on'=>'search'),
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
			'catalogNews' => array(self::HAS_MANY, 'CatalogNews', 'cid_id'),
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
			'owner' => 'Owner',
			'key_word' => 'Key Word',
			'link' => 'Link',
			'show_in_menu' => 'Show In Menu',
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
		$criteria->compare('owner',$this->owner,true);
		$criteria->compare('key_word',$this->key_word,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('show_in_menu',$this->show_in_menu,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}