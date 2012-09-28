<?php
/**
 * User: Игорь
 * Date: 28.09.12
 * To change this template use File | Settings | File Templates.
 */

class ImageHelper
{
    /*
     * Проверяем существование картинки если нет то выдает тефолтную картинку
     * @param string $imageUrl урл картинки
     * @param integer $size размер необходимой картинки
     * @pram string $className название класса, чтобы сохранять изменные варинаты в базе ( в талице обязательно должны быть свойства image_2 и image_3 )
     * @return bool $cout
     */
    static function getImageResize( $imageUrl, $size = null, $itemObject = null )
    {
        if( empty( $imageUrl ) )return false;
        if( !empty( $size ) )$size .= "_";

        if( !empty( $itemObject ) && is_object( $itemObject ) )
        {
            $image = "image".$size;

            // Если размер не указан то проверяем производилась ли проверка этого поля ранее
            // ( если поле image_2 заполненно то значит проверка уже проводилась )
            if( empty( $size ) && !empty( $itemObject->image_2 ) )return $imageUrl;

            // Если необходимый размер есть среди обработанных то просто выдаем;
            if( !empty( $itemObject->$image ) )return $itemObject->$image;
        }

        $fileName = basename( $imageUrl );
        $dirPath = dirname( $imageUrl );
        if( $size != "_"  )$outFile = $dirPath ."/".$size.$fileName;
                      else $outFile = $dirPath ."/".$fileName;

        if( file_exists( $imageUrl ) )
        {
            if( !empty( $className )  )
            {

            }
            return $imageUrl;
        }

        // Картинки по умочанию
        return Yii::app()->getTheme()->getBaseUrl()."/images/no-image.png";
    }
}