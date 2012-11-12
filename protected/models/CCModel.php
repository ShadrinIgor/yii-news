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
     * @param DBQueryParamsClass $QueryParams
     * @param array $relationsTable Список связанных таблиц которые необходимо подгрузить сразу
     * @return array $arrayItemObject Возвращает массив объетов взятых из базе на основе переданных параметров
     * @return mixed $indexNumber По кокому принципу выставлять порядковые номера, по умолчанию INDEX выставляет от 0,1,2. Если указать ID то в качестве индексов будут выставленны ID записей
     */
     static function fetchAll( DBQueryParamsClass $QueryParams = null, array $relationsTable = array(), $indexNumber = "index" )
     {
         if( empty( $QueryParams ) || !$QueryParams->getConditions() )$QueryParams = DBQueryParamsClass::CreateParams()->setConditions( "del=0" );
                               else $QueryParams->setConditions( $QueryParams->getConditions()." AND del=0 " );

         $nameCLass = get_called_class();
         $newObject = new $nameCLass;

         $arrayOffer = Yii::app()->db->createCommand()
            ->select( $QueryParams->getFields() )
            ->from( $newObject->tableName() )
            ->where( $QueryParams->getConditions(), $QueryParams->getParams() )
            ->order( $QueryParams->getOrderBy() )
            ->limit( $QueryParams->getLimit() )
            ->queryAll();

         if( !empty( $relationsTable ) )
         {
            foreach( $relationsTable as $relationTable )
            {
                $relationClass = str_replace(array(' ','_'), '', ucwords( preg_replace('/[^a-z]/', ' ', strtolower($relationTable)) ));
                $relationData = $newObject->getRelationByClass( $relationClass );
                if( !empty( $relationData ) && class_exists( $relationData[1] ) )
                {
                    $listRelationItems[ $relationData[1] ] =  $relationData[1]::fetchAll( DBQueryParamsClass::CreateParams()->setLimit("-1"), array(), "id");
                }
            }
         }

         $listOffer = array();
         for( $i=0;$i<sizeof( $arrayOffer );$i++ )
         {
            if( $arrayOffer[$i]["id"] == 0 )continue;
            $newObject = new $nameCLass;
            $newObject  = $newObject->setAttributesFromArray( $arrayOffer[$i] );

             // Подставляем связи если указан параметр $relationsTable ( работает только со связми ONE_TO_ONE )
             foreach( $relationsTable as $relationTable )
             {
                 $relationClass = str_replace(array(' ','_'), '', ucwords( preg_replace('/[^a-z]/', ' ', strtolower($relationTable)) ));
                 $relationData = $newObject->getRelationByClass( $relationClass );
                 if( !empty( $relationData ) )
                 {
                     $relationId = $arrayOffer[$i][ $relationData[2] ];
                     if( !empty($listRelationItems[ $relationData[1] ][ $relationId ]  ) )$newObject->$relationData[2] = $listRelationItems[ $relationData[1] ][ $relationId ];
                 }
             }

            if( $indexNumber == "id" )$listOffer[ $newObject->id  ] = $newObject;
                                 else $listOffer[ ] = $newObject;

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
        if( (int)$id>0 )
        {
            $offer = Yii::app()->db->createCommand()
                ->select('*')
                ->from( $object->tableName() )
                ->where( 'id=:id AND del=0', array( "id" => (int)$id ) )
                ->queryRow();

            $object->setAttributesFromArray( $offer );
        }
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
        static $arrayHasOneRelation;

        if( !in_array( $field, $this->getRelationFields() ) )
            return $this->$field;
        {
            $relation = $this->getRelationByField( $field );
            if( !empty( $relation ) )
            {
                if( ( $relation[0] == self::HAS_ONE || $relation[0] == self::BELONGS_TO ) && !is_object( $this->$field ) ) //
                {
                    $key = $field."_".$this->$field;
                    if( empty( $arrayHasOneRelation[ $key ] ) )
                    {
                        $this->$field = $relation[1]::fetch( $this->$field );
                        $arrayHasOneRelation[ $key ] = $this->$field;
                    }
                        else
                            $this->$field = $arrayHasOneRelation[ $key ];
                }

                if( ( $relation[0] == self::HAS_MANY || $relation[0] == self::MANY_MANY ) && !is_array( $this->$field ) )
                {
                    $leftCLass = get_called_class();
                    $relationParams = RelationParamsClass::CreateParams()
                                            ->setLeftClass( $leftCLass )
                                            ->setRightClass( $relation[1] )
                                            ->setLeftField( $field )
                                            ->setLeftId( $this->id );

                    $DBQueryParams = DBQueryParamsClass::CreateParams()
                                            ->setOrderBy( "a.name" )
                                            ->setOrderType( "ASC" );

                    $this->$field = SiteHelper::getRelation( $relationParams, $DBQueryParams );
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
    * @desc Делает сохранение в базу текущей модели
    * @param
    * @return bool $result возвражает результат операции TRUE или FALSE
    */
    public function save()
    {
        // TODO надо будет еще сделать рекурсивыное сохранение т.е. чтобы он шол по всем связям проверял
        // если значение нету то проверял валидацию связанной записи и сохранял

        // TODO если есть сохранение сериазиваного масива в поле kesh у объекта, то обновлятять или ощищать kesh
        if( $this->validate() == false )return false;

        $sqlField = "";
        foreach( $this->attributeLabels() as $key => $value )
        {
            if( $key=="id" )continue;
            if( !empty( $sqlField ) )$sqlField.=",";

            if( in_array( $key, $this->getRelationFields() ) && is_object( $this->$key ) )
                     $sqlField .= "`".$key."`='".$this->$key->id."'";
                else $sqlField .= "`".$key."`='".$this->$key."'";
        }

        $sql = "UPDATE ".$this->tableName()." SET ".$sqlField." WHERE id='".$this->id."'";
        Yii::app()->db->createCommand( $sql )->execute();
    }

    public function update( array $fields = array() )
    {
        if( $this->validate() == false || !$this->id )return false;

        // TODO необходиммо подумать над сохранением сериазиваного масива в поле kesh у объекта, то обновлятять или ощищать kesh
        if( Yii::app()->db->createCommand()->update( $this->tableName(), $fields, "id=:id", array( ":id"=>$this->id ) ) )return true;
                    else return false;
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

     /*
    * @desc Возврощает описание одной связи по полю
    * @param string $fieldName Название поля которое имеет связь
    * @return array $relationArray Масив - описание одной связи
    */
     public function getRelationByClass( $className )
     {
         foreach( $this->relations() as $value )
             if( $value[1] == $className )return $value;

         return false;
     }

    /*
    * @desc Увеличивает количество просмотров поле col
    * @param
    * @return bool $result статус действия
    */
    public function setColView()
    {
        if( property_exists( $this, "col" ) )
            return $this->update( array( "col"=>$this->col+1 ) );

        return false;
    }

    public function getImages()
    {
        return ImageHelper::getImages( $this );
    }

    public function attributeNames()
    {}

    public function tableName()
    {}
}