<?php

/**
 * This is the model class for table "cat_relations".
   */
class CatRelations extends CCModel
{
    protected $id; // integer 
    protected $left_id; // integer 
    protected $right_id; // integer 
    protected $left_table; // string 
    protected $right_table; // string 

    public function attributeNames()
    {
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cat_relations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('left_id, right_id', 'numerical', 'integerOnly'=>true),
			array('left_table, right_table', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, left_id, right_id, left_table, right_table', 'safe', 'on'=>'search'),
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
			'left_id' => 'Left',
			'right_id' => 'Right',
			'left_table' => 'Left Table',
			'right_table' => 'Right Table',
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
		$criteria->compare('left_id',$this->left_id);
		$criteria->compare('right_id',$this->right_id);
		$criteria->compare('left_table',$this->left_table,true);
		$criteria->compare('right_table',$this->right_table,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}