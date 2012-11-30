<?php

/**
 * This is the model class for table "catalog_pages".
   */
class CatalogPages extends CCModel
{
    protected $id; // integer 
    protected $col; // integer 
    protected $name; // string 
    protected $description; // string 
    protected $active; // integer 
    protected $dateadd; // string 
    protected $dateedit; // string 
    protected $pos; // integer 
    protected $metaData; // string 
    protected $del; // integer 
    protected $lang_group; // integer 
    protected $id_lang; // integer 
    protected $key_word; // string 

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
		return 'catalog_pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, key_word', 'required'),
			array('col, active, pos, del, lang_group, id_lang', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>25),
			array('key_word', 'length', 'max'=>255),
			array('description, dateadd, dateedit, metaData', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, col, name, description, active, dateadd, dateedit, pos, metaData, del, lang_group, id_lang, key_word', 'safe', 'on'=>'search'),
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
			'col' => 'Col',
			'name' => 'Name',
			'description' => 'Description',
			'active' => 'Active',
			'dateadd' => 'Dateadd',
			'dateedit' => 'Dateedit',
			'pos' => 'Pos',
			'metaData' => 'Meta Data',
			'del' => 'Del',
			'lang_group' => 'Lang Group',
			'id_lang' => 'Id Lang',
			'key_word' => 'Key Word',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('dateadd',$this->dateadd,true);
		$criteria->compare('dateedit',$this->dateedit,true);
		$criteria->compare('pos',$this->pos);
		$criteria->compare('metaData',$this->metaData,true);
		$criteria->compare('del',$this->del);
		$criteria->compare('lang_group',$this->lang_group);
		$criteria->compare('id_lang',$this->id_lang);
		$criteria->compare('key_word',$this->key_word,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}