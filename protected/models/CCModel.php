<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колоюок
 * Date: 21.09.12
 * Time: 1:38
 * To change this template use File | Settings | File Templates.
 */
 class CCModel extends CModel
{
     static function fetchAll()
     {
         $nameCLass = get_called_class();
         $object =  new $nameCLass;
         $offer = Yii::app()->db->createCommand()
             ->select('*')
             ->from( $object->tableName() )
//            ->where( 'offer_id=:tour_id AND place_id=:place_id', array( "tour_id" => $this->tourId, "place_id"=> $place[$i]["id"] ) )
//            ->order( 'id' )
             ->queryAll();
         return $offer;
     }

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
        //print_r( $object );
        return $object;
    }

    public function setAttributesFromArray( array $values )
    {
        foreach( $values as $key=>$value )
        {
            if( property_exists( $this, $key ) && !empty( $value ) )
                $this->$key = $value;
        }

        return $this;
    }

    public function attributeNames()
    {}

    public function tableName()
    {}
}