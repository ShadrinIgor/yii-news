<?php

abstract class CCModel extends CModel
{
    public function fetchAll(  )
    {
        $offer = Yii::app()->db->createCommand()
            ->select('*')
            ->from( $this->tableName() )
//            ->where( 'offer_id=:tour_id AND place_id=:place_id', array( "tour_id" => $this->tourId, "place_id"=> $place[$i]["id"] ) )
//            ->order( 'id' )
            ->queryAll();

        return $offer;
    }

    public function fetchById( $id )
    {
        $offer = Yii::app()->db->createCommand()
            ->select('*')
            ->from( $this->tableName() )
            ->where( 'id=:id ', array( "id" => (int)$id ) )
//            ->order( 'id' )
            ->queryAll();

        return $offer;
    }

    public function tableName()
    {
        return '';
    }
}
