<?php
/**
 * User: Игорь
 * Date: 28.09.12
 * To change this template use File | Settings | File Templates.
 */

class ImageHelper
{
    /*
     * Проверяет сушествование необходимой картинк в нужном размере, если нет то создает
     * @param string $imageFile путь до файла
     * @param int $size размер необходимой картинки ( варинаты : 1, 2, 3 )
     * @param CCmodel $itemObject объект текущей записи
     */
    static function getImage( $imageFile = null, $size = 1, CCmodel $itemObject = null )
    {
        $error = false;
        $size = $size>0 ? (int)$size : 1;
        if( empty( $imageFile ) )$error = true;

        $dirName = dirname( $imageFile );
        $fileName = basename( $imageFile );

        if( $size == 1 )
        {
            $propertyName = "image";
            $imageSizeFile = $imageFile;
        }
        else
        {
            $propertyName = "image_".$size;
            $imageSizeFile = $dirName."/".$size."_".$fileName;
        }

        if( $itemObject == null || !property_exists( $itemObject, $propertyName ) )return $imageSizeFile;
            else
        {
            // 1. Проверяем указана ли в катологе уже отптимизированные капии картинки, если да то просто их отдаем
            // 2. Иначе: Проверяем существут ли в действительности файл если дл то
            // создаем 2 картинки меньшего размера и сохраняем их пути в базе для этой записи

            // Если данное свойство у объекта существует и оно не пусто то выдаем его содержимое
            if( $itemObject->$propertyName != "" ) return $itemObject->$propertyName;

            if( !file_exists( $imageFile ) )
            {
                $result = $itemObject->update( array( "image"=>"" ) );
                $error = true;
            }

            if( !$error )
            {
                $tableName = $itemObject->tableName();
                $imageParams = Yii::app()->params["images"][ $tableName ];
                // Если параметры картинки для данной таблицы не созданно то не проводить оптимизацию
                if( is_array( $imageParams ) && sizeof( $imageParams ) > 0 )
                {
                    // Надо проверить еслии вызаваентся не 1 картнки, а 2 или 3 и её нету
                    // то читаем то атоптации картинкок небыло и запускаем адоптация в цикле( количество равно количесвту свойств этого каталого в конфиге )
                    foreach( $imageParams as $key=>$values )
                    {
                        if( $key!=1 )
                        {
                            $imageName = $key."_".$fileName;
                            $itemProperty =  "image_".$key;
                        }
                            else
                        {
                            $imageName = $fileName;
                            $itemProperty =  "image";
                        }

                        Yii::app()->ih
                            ->load( $_SERVER['DOCUMENT_ROOT'] . "/" . $itemObject->image )
                            ->watermark($_SERVER['DOCUMENT_ROOT'] . Yii::app()->getTheme()->getBaseUrl().'/images/watermark.png', 0, 0, CImageHandler::CORNER_RIGHT_BOTTOM)
                            ->thumb( $values[0], $values[1] )
                            ->save( $_SERVER['DOCUMENT_ROOT'] . "/" . $dirName."/".$imageName );

                        if( is_object( $itemObject ) && property_exists( $itemObject, $propertyName ) )$itemObject->$itemProperty =  $dirName."/".$imageName;
                    }

                    $itemObject->save();
                    return $itemObject->$propertyName;
                }
            }
        }

        return Yii::app()->getTheme()->getBaseUrl()."/images/no-image.png";
    }

    public function checkFileName($text)
    {
        $rus=array("а","б","в","г","д","е","ё","ж","з","и","й","к","л","м","н","о","п","р","с","т","у","ф","х","ц","ш","щ","ь","ъ","э","ю","я"," ",".","-","(",")","j","w");
        $eng=array("a","b","v","g","d","e","e","sh","z","i","i","k","l","m","n","o","p","r","s","t","u","f","h","c","sh","sch","","","e","yu","ya","_",".","_","(",")","j","w");
        $text=strtolower($text);

        $str="";
        for($n=0;$n<strlen($text);$n++)
        {
            for($i=0;$i<sizeof($rus);$i++)
            {
                if($text[$n]==$rus[$i])
                {
                    $str.=$eng[$i];
                    break;
                }

                if($text[$n]==$eng[$i])
                {
                    $str.=$eng[$i];
                    break;
                }

                if(intval($text[$n]))
                {
                    $str.=$text[$n];
                    break;
                }
            }
        }

        $ar=explode(".",$str);
        $type=$ar[sizeof($ar)-1];

        $rn=rand(1,999);
        $str=$rn.$ar[0].".".$type;

        return $str;
    }
}