<?php
/**
 * User: Игорь
 * Date: 21.09.12
 * Надстройка на стандартный CModel, для более удобной работы с базой
 */
 class CCModel extends CModel
{
     const BELONGS_TO='CBelongsToRelation'; // связь между А и В один-ко-многим, значит В принадлежит А
     const HAS_ONE='CHasOneRelation';       // то частный случай HAS_MANY, где А может иметь максимум одно В
     const HAS_MANY='CHasManyRelation';     // связь между таблицами А и В один-ко-многим, значит у А есть много В
     const MANY_MANY='CManyManyRelation';   // эта связь соответствует типу связи многие-ко-многим в БД

     /*
     * @desc Вытаскивает из базы список значений по параметрам
     * @param
     * @return array $arrayItemObect Возвращает массив объетов взятых из базе на основе переданных параметров
     */
     static function fetchAll( $conditions=null, array $params=array(), $orderBy='id', $orderType='ASC', $page=null, $perpage=null )
     {
         $nameCLass = get_called_class();
         $newObject = new $nameCLass;
         $arrayOffer = Yii::app()->db->createCommand()
            ->select('*')
            ->from( $newObject->tableName() )
            ->where( $conditions, $params )
            ->order( $orderBy.' '.$orderType )
            ->queryAll();

         $listOffer = array();
         for( $i=0;$i<sizeof( $arrayOffer );$i++ )
         {
            $newObject = new $nameCLass;
            $newObject  = $newObject->setAttributesFromArray( $arrayOffer[$i] );
            $listOffer[] = $newObject;
         }

         return $listOffer;
     }

    /*
    * @desc Вытаскивает из базы значение по ID
    * @param int $itemID Идентификатор записи в базе
    * @return object $itemObect объет созданный на основе давнных полученных с базы
    */
    static function fetch( $id=0 )
    {
        $nameCLass = get_called_class();
        $object =  new $nameCLass;
        $offer = Yii::app()->db->createCommand()
            ->select('*')
            ->from( $object->tableName() )
            ->where( 'id=:id ', array( "id" => (int)$id ) )
            ->queryRow();

        $object->setAttributesFromArray( $offer );

        return $object;
    }

    /*
    * @desc Устанавливаем значение из масива
    * @param array $arrayValue Масив присваеваемых значений
    * @return object $this Возвращает текущий объект
    */
    public function setAttributesFromArray( array $values )
    {
        foreach( $values as $key=>$value )
        {
            if( property_exists( $this, $key ) && !empty( $value ) )
                $this->$key = $value;
        }

        return $this;
    }

    /*
    * @desc Общий метод SET, а также подгрузка связе при обращении
    * @param string $field Название свойства
    * @return mixed $fieldValue Значение свойства
    */
    public function __get( $field )
    {
        if( !in_array( $field, $this->getRelationFields() ) )
            return $this->$field;
        {
            $relation = $this->getRelationByField( $field );
            if( !empty( $relation ) )
            {
                if( ( $relation[0] == self::HAS_ONE || $relation[0] == self::BELONGS_TO ) && !is_object( $this->$field ) ) //
                {
                    $this->$field = $relation[1]::fetch( $this->$field );
                }

                if( ( $relation[0] == self::HAS_MANY || $relation[0] == self::MANY_MANY ) && !is_object( $this->$field ) )
                {
                        // cat_relations
                    // Проверить существование связи
                    // Если существует то сформировать масив объетов
                    $leftCLass = get_called_class();
                    RelationHelper::getRelation( $leftCLass, $relation[1], "id", $this->$field );
                    $this->$field = $relation[1]::fetch( $this->$field );
                }

                return $this->$field;
            }
        }
    }

    /*
    * @desc Общий метод GET
    * @param string $field Название поля
    * @param string $value Значение которое надо положить в поле
    * @return
    */
    public function __set( $field, $value )
    {
        $this->$field = $value;
    }

    /*
    * @desc Вормирование масива полей которые имеют связи
    * @param
    * @return array
    */
    public function getRelationFields()
    {
        $listFields = array();
        foreach( $this->relations() as $value )
            $listFields[] = $value[2];

        return $listFields;
    }

    /*
    * @desc Возврощает описание одной связи по полю
    * @param string $fieldName Название поля которое имеет связь
    * @return array $relationArray Масив - описание одной связи
    */
    public function getRelationByField( $fieldName )
    {
        foreach( $this->relations() as $value )
            if( $value[2] == $fieldName )return $value;

        return false;
    }

    public function attributeNames()
    {}

    public function tableName()
    {}
}