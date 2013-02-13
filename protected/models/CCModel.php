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
     static function fetchAll( $QueryParams = null, array $relationsTable = array(), $indexNumber = "index" )
     {
         $nameCLass = get_called_class();
         $newObject = new $nameCLass;

         $tableAlias = self::getTableAlias( $newObject->tableName() );
         if( is_a( $QueryParams, "DBQueryParamsClass" )  )
         {
             if( empty( $QueryParams ) )$QueryParams = DBQueryParamsClass::CreateParams()->setConditions( $tableAlias.".del=0" );
                elseif( $QueryParams->getConditions()!="" ) $QueryParams->setConditions( $QueryParams->getConditions()." AND ".$tableAlias.".del=0 " );
                    else$QueryParams->setConditions( $tableAlias.".del=0 " );

             // Выставляем сортировку по умолчанию
             if( !$QueryParams->getLimit()  )$QueryParams->setOrderBy( $tableAlias.".id" );

             // Выставляем поля по умолчанию
             if( !$QueryParams->getFields() )$QueryParams->setFields( $tableAlias.".*" );

             // Определяем параметр WHERE
             if( $QueryParams->getWhere() )$dopWhere = $QueryParams->getWhere();
                                      else $dopWhere = $newObject->tableName()." as ".$tableAlias;

             // Определяем параметр WHERE
             if( $QueryParams->getFields() )$fields = $QueryParams->getFields();
                                       else $fields = "*";

             $arrayOffer = Yii::app()->db->cache( $QueryParams->getCache() )->createCommand()
                ->select( $fields )
                ->from( $dopWhere )
                ->where( $QueryParams->getConditions(), $QueryParams->getParams() )
                ->order( $QueryParams->getOrderBy() )
                ->limit( $QueryParams->getLimit() )
                ->offset( $QueryParams->getPage() )
                ->group( $QueryParams->getGroup() )
                ->queryAll();

/*             echo Yii::app()->db->cache( $QueryParams->getCache() )->createCommand()
                 ->select( $fields )
                 ->from( $dopWhere )
                 ->where( $QueryParams->getConditions(), $QueryParams->getParams() )
                 ->order( $QueryParams->getOrderBy() )
                 ->limit( $QueryParams->getLimit() )
                 ->offset( $QueryParams->getPage() )
                 ->group( $QueryParams->getGroup() )
                 ->getText();*/

         }
            elseif( is_a( $QueryParams, "CDbCriteria" )  )
             {
                 $builder = new \CDbCommandBuilder(\Yii::app()->db->getSchema());
                 $command = $builder->createFindCommand( $newObject->tableName(), $QueryParams);
                 $sql = $command->getText();

                 $arrayOffer = Yii::app()->db->createCommand( $sql )
                     ->queryAll();
             }
                 elseif( is_string( $QueryParams ) )
                 {
                     $arrayOffer = Yii::app()->db->cache( $QueryParams->getCache() )
                            ->createCommand( $QueryParams )
                            ->queryAll();;
                 }
                    else
                    {
                        $arrayOffer = Yii::app()->db->cache( 1000 )->createCommand()
                            ->from( $newObject->tableName() )
                            ->where( "del=:del", array( ":del"=>0 ) )
                            ->order( "name" )
                            ->queryAll();
                    }

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

     static function count( DBQueryParamsClass $QueryParams = null )
     {
         $nameCLass = get_called_class();
         $newObject = new $nameCLass;
         $tableAlias = self::getTableAlias( $newObject->tableName() );

         if( empty( $QueryParams ) )$QueryParams = DBQueryParamsClass::CreateParams()->setConditions( $tableAlias.".del=0" );
            elseif( $QueryParams->getConditions()!="" ) $QueryParams->setConditions( $QueryParams->getConditions()." AND ".$tableAlias.".del=0 " );
                else $QueryParams->setConditions( $tableAlias.".del=0 " );

         // Определяем параметр WHERE
         if( $QueryParams->getWhere() )$dopWhere = $QueryParams->getWhere();
                                  else $dopWhere = $newObject->tableName()." as ".$tableAlias;

         $count = Yii::app()->db->cache( $QueryParams->getCache() )->createCommand()
             ->select( "count(".$tableAlias.".id)" )
             ->from( $dopWhere )
             ->where( $QueryParams->getConditions(), $QueryParams->getParams() )
             ->order( $QueryParams->getOrderBy() )
//             ->limit( $QueryParams->getLimit() )
//             ->offset( $QueryParams->getPage() )
             ->queryScalar();

         return $count>0 ? $count : 0;
     }

     /*
     * @desc Вытаскивает из базы значение по ID
     * @param int $itemID Идентификатор записи в базе
     * @return object $itemObect объет созданный на основе давнных полученных с базы
     */
     static function fetchByKeyWord( $keyWord )
     {
         $nameCLass = get_called_class();
         $object =  new $nameCLass;
         if( !empty( $keyWord ) )
         {
             $offer = Yii::app()->db->createCommand()
                 ->select('*')
                 ->from( $object->tableName() )
                 ->where( 'key_word=:key_word AND del=0', array( ":key_word" => $keyWord ) )
                 ->queryRow();

             if( is_array( $offer ) )$object->setAttributesFromArray( $offer );
             else return false;
         }
         return $object;
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

            if( is_array( $offer ) )$object->setAttributesFromArray( $offer );
                else return false;
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

        if( !in_array( $field, $this->getRelationFields() ) && !is_array( $this->getRelationByKey( $field ) ) )
            return $this->$field;
        {
            $relation = $this->getRelationByField( $field );
            if( empty( $relation ) )$relation = $this->getRelationByKey( $field );

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
                    // Проверяем существует ли связт по этому полю ( такое может быть при связи многие ко многим в и текущей таблице полем для связи является ID )

                    if( !$this->relations( $field ) )
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
                        else
                    {
                        $this->$field = $relation[1]::fetchAll
                                        (
                                            DBQueryParamsClass::CreateParams()
                                                ->setConditions( $relation[2]."=:field_value" )
                                                ->setParams( array( ":field_value"=>$this->id ) )
                                                ->setOrderBy("name")
                                        );

                    }
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

        $sqlColumns = "";
        $sqlField = "";
        foreach( $this->getSafeAtributes() as $key => $value )
        {
            $value = trim( $value );
            if( $value=="id" )continue;
            if( !empty( $sqlField ) )$sqlField.=",";

            if( $this->id<0 )
            {
                if( in_array( $value, $this->getRelationFields() ) && is_object( $this->$value ) )
                         $sqlField .= "`".$value."`='".$this->$value->id."'";
                    else $sqlField .= "`".$value."`='".$this->$value."'";
            }
                else
            {
                if( !empty( $sqlColumns ) )$sqlColumns .= ",";

                $sqlColumns .= "`".trim( $value )."`";
                $sqlField .= "'".$this->$value."'";
            }
        }

        if( $this->id>0 )$sql = "UPDATE ".$this->tableName()." SET ".$sqlField." WHERE id='".$this->id."'";
                    else $sql = "INSERT INTO ".$this->tableName()."(".$sqlColumns.") VALUES( ".$sqlField.")";

        echo $sql;
        $coutUpdateItems = Yii::app()->db->createCommand( $sql )->execute();
        if( $coutUpdateItems == 0 )echo "<br/>Запрос не затронул не одной записи ( ".$sql." )";
    }

    public function update( array $fields = array() )
    {
        if( $this->validate() == false || !$this->id )return false;

        // TODO необходиммо подумать над сохранением сериазиваного масива в поле kesh у объекта, то обновлятять или ощищать kesh
        if( Yii::app()->db->createCommand()->update( $this->tableName(), $fields, "id=:id", array( ":id"=>$this->id ) ) )return true;
                    else return false;
    }

     private function getSafeAtributes()
     {
         foreach( $this->rules() as $key=>$value )
         {
             if( $value[1] == "safe" )
                 return explode( ",", $value[0] );
         }
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

     public function getRelationByKey( $fieldKey )
     {
         foreach( $this->relations() as $key=>$value )
             if( $key == $fieldKey )return $value;

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

     static function getTableAlias( $table )
     {
         return $table."_as";
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