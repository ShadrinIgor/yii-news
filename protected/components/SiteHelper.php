<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колоюок
 * Date: 27.09.12
 * Time: 1:20
 * To change this template use File | Settings | File Templates.
 */
class SiteHelper
{
    /*
     * Вывод связанный элементов таблицы, тим свящи HAS_MANY | MANY_MANY
     * @param RelationParamsClass $relationParams параметры связи
     * @param DBQueryParamsClass $QBQueryPrams Определяет в каком прядке, какие запис необходимы втаскивать
     * @return array $list Возвращает масив объектов
     */
    static function getRelation( RelationParamsClass $relationParams, DBQueryParamsClass $QBQueryPrams = null )
    {
        if( empty( $QBQueryPrams ) )$QBQueryPrams = new DBQueryParamsClass();

        $relationClass = $relationParams->getRightClass();
        $relationObj = new $relationClass;
        $relationTable = $relationObj->tableName();

//        $sql = "SELECT a.* FROM ".$relationTable." a, cat_relations b WHERE b.leftClass='".$relationParams->getLeftClass()."' AND b.rightClass='".$relationParams->getRightClass()."' AND b.leftId='".$relationParams->getLeftId()."' AND a.id = b.rightId LIMIT ".$QBQueryPrams->getLimit();

        $sqlDopWhere = ( $QBQueryPrams->getConditions() ) ? " ( ".$QBQueryPrams->getConditions()." ) AND " : "";
        $sqlOrder = ( $QBQueryPrams->getOrderBy()=="id" ) ? "a.id" : $QBQueryPrams->getOrderBy();

        $result = Yii::app()->db->createCommand( )
                    ->select( $QBQueryPrams->getFields() )
                    ->from( $relationTable." a, cat_relations b " )
                    ->where( $sqlDopWhere." ( b.leftClass='".$relationParams->getLeftClass()."' AND b.rightClass='".$relationParams->getRightClass()."' AND b.leftId='".$relationParams->getLeftId()."' AND a.id = b.rightId )", $QBQueryPrams->getParams() )
                    ->order( $sqlOrder.' '.$QBQueryPrams->getOrderType() )
                    ->limit( $QBQueryPrams->getLimit() )
                    ->queryAll();

        $list = array();
        if( is_array($result) && sizeof($result)>0 )
        {
            $obectClass = $relationParams->getRightClass();
            foreach( $result as $arrayValue )
            {
                $newObject =  new $obectClass;
                $newObject->setAttributesFromArray( $arrayValue );
                $list[] = $newObject;
            }
        }
        return $list;
    }

    /*
     * Обресайт текст по словам
     * @param text $text обрезаемый текст
     * @param int $count необходимое количество слов
     */
    static function getSubTextOnWorld( $text, $count )
    {
        $cout = substr( strip_tags( $text), 0, $count );
        $ar = explode( " ", $cout );
        $ar[ sizeof( $ar )-1 ] = "";
        $cout = implode( " ", $ar );

        if( strlen( $text )>$count )$cout.=" ...";
        return $cout;
    }

    /*
     * Вывод дату в заданном формате
     * @param string $date дата в формате YYYY-mm-dd
     * @param string $format формата даты
     */
    static function getDateOnFormat( $date, $format, $note = "" )
    {
        $classNme = get_called_class();
        $timeStamp = strtotime( $date );

        if( $timeStamp > 0 )
            return date( $format, $timeStamp );
        else
            trigger_error( "Не правельный формат переданной даты ( Класс: ".$classNme." | Дата: ".$date." ".$note.")", E_USER_NOTICE );

         return false;
    }
}
