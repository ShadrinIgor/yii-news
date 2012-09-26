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
    static function getRelation( $leftClass, $rightClass, $leftField, $rightField="id", $leftId=0, $rightId=0 )
    {
        $relationObj = new $rightClass;
        $relationTable = $relationObj->tableName();

        echo $sql = "SELECT a.* FROM ".$relationTable." a, cat_relations b WHERE b.leftClass='".$leftClass."' AND b.rightClass='".$rightClass."' AND b.leftId='".$leftId."' AND a.".$leftField." = b.id";
//        Yii::app()->db->creatCommand( "SELECT * FROM ".$relationArray." a cat_relations" );

    }
}
