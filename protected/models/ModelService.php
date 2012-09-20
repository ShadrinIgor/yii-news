<?php

class ModelService
{
    var $tableName;
    var $modelName;

    public function __construct( $modelName )
    {
        try
        {
            $model = new $modelName();
            if( $model instanceof  CCModel )
            {
                $this->tableName = $model->tableName();
                $this->modelName = $modelName;
            }
            else
                throw new Exception('Неверное название класса модели, использованное для ModelService');
        }
        catch (ErrorException $e)
        {
            // обработка исключения работы с файлом
            echo $e->getMessage();
        }
}

    public function fetchAll(  )
    {
        $offer = Yii::app()->db->createCommand()
            ->select('*')
            ->from( $this->tableName )
//            ->where( 'offer_id=:tour_id AND place_id=:place_id', array( "tour_id" => $this->tourId, "place_id"=> $place[$i]["id"] ) )
//            ->order( 'id' )
            ->queryAll();
        return $offer;
    }

    public function fetchById( $id )
    {
        $offer = Yii::app()->db->createCommand()
            ->select('*')
            ->from( $this->tableName )
            ->where( 'id=:id ', array( "id" => (int)$id ) )
//            ->order( 'id' )
            ->queryAll();

        $modelName = $this->modelName;
        $newObject = new $modelName();
        $n = new CatalogNews();
        $n->setAttributes( $offer );
print_r( $n );

        return $offer;
    }
}
