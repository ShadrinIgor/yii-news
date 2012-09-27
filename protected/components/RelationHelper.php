<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колоюок
 * Date: 27.09.12
 * Time: 1:20
 * To change this template use File | Settings | File Templates.
 */
class RelationHelper
{
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
}
