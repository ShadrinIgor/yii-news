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
        if( !file_exists( $imageFile ) )
        {
            $itemObject->image = "";
            $result = $itemObject->save();
            $error = true;
        }

        if( !$error )
        {
            // 1. Проверяем указана ли в катологе уже отптимизированные капии картинки, если да то просто их отдаем
            // 2. Иначе: Проверяем существут ли в действительности файл если дл то
            // создаем 2 картинки меньшего размера и сохраняем их пути в базе для этой записи

            if( $size>1 )$propertyName = "image_".$size;
                    else $propertyName = "image";

            // Проверяем проводилась ли проверка ранее
            if( property_exists( $itemObject, $propertyName ) )
            {
                if( $itemObject->$propertyName != "" )return $itemObject->$propertyName;
                    else
                {
                    $dirName = dirname( $imageFile );
                    $fileName = basename( $imageFile );
                    $tableName = $itemObject->tableName();
                    $imageParams = Yii::app()->params["images"][ $tableName ];

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
                            ->thumb( $values[0], $values[1] )
                            ->save( $_SERVER['DOCUMENT_ROOT'] . "/" . $dirName."/".$imageName );

                        $itemObject->$itemProperty =  $dirName."/".$imageName;
                    }

                    $itemObject->save();
                }
            }
        }

        return Yii::app()->getTheme()->getBaseUrl()."/images/no-image.png";
    }
    /*
     * Проверяем существование картинки если нет то выдает тефолтную картинку
     * @param string $imageUrl урл картинки
     * @param integer $size размер необходимой картинки
     * @pram string $className название класса, чтобы сохранять изменные варинаты в базе ( в талице обязательно должны быть свойства image_2 и image_3 )
     * @return bool $cout

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

    public function sheck_file_name($text)
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

    public function optimization($file,$path,$id_type,$itypre="", $dopUrl='')
    {
        $dir=dirname($path);

        $fileName = basename( $file );
        $dirPath = $dopUrl.dirname( $file )."/";

        $res=mysql_query("SELECT * FROM img_type WHERE id='".$id_type."'");
        $line=mysql_fetch_array($res);

        list($width0,$height0)=getimagesize($path);

        $wprocent = ceil( ($height0*100)/ $width0 );
        $hprocent = ceil( ($width0*100)/ $height0 );
        $cout = "";

        for($i=3;$i>0;$i--)
        {
            $width=0;
            $height=0;
            if($i==1)
            {
                $new_file_name = $dirPath . $fileName;

                $width=$line['width'];
                $height=$line['height'];
                if(!$width&&!$height)list($width,$height)=getimagesize($path);

                if( !$width && $height )$width= ceil( ($height*$hprocent)/100 );
                if( $width && !$height )$height= ceil( ($width*$wprocent)/100 );
            }
            else
            {
                $new_file_name = $dirPath.$i."_".$fileName;
                $height=$line['height'.$i];
                $width=$line['width'.$i];

                if( $width0 == $height )
                {
                    if( !$width && $height )$width=$height;
                    if( $width && !$height )$height=$width;
                }

                if( !$width && $height )$width= ceil( ($height*$hprocent)/100 );
                if( $width && !$height )$height= ceil( ($width*$wprocent)/100 );
            }

//         echo $dopUrl.$file." - |".$itypre."|<br/>";

            if( $width&&$height )
            {
                switch($itypre)
                {
                    case "jpg" :$image_o=imagecreatefromjpeg( $dopUrl.$file);break;
                    case "image/jpg" :$image_o=imagecreatefromjpeg($dopUrl.$file);break;

                    case "jpeg":$image_o=imagecreatefromjpeg($dopUrl.$file);break;
                    case "image/jpeg":$image_o=imagecreatefromjpeg($dopUrl.$file);break;
                    case "image/pjpeg":$image_o=imagecreatefromjpeg($dopUrl.$file);break;

                    case "gif" :$image_o=imagecreatefromgif($dopUrl.$file);break;
                    case "image/gif" :$image_o=imagecreatefromgif($dopUrl.$file);break;

                    case "png" :$image_o=imagecreatefrompng($dopUrl.$file);break;
                    case "image/png" :$image_o=imagecreatefrompng($dopUrl.$file);break;

                    default : $image_o=imagecreatefromjpeg( $dopUrl.$file);break;
                }

                list($width_o,$height_o)=getimagesize($path);
                $new_file=imagecreatetruecolor($width,$height);
                $res=imagecopyresampled($new_file,$image_o,0,0,0,0,$width,$height,$width_o,$height_o);

                if($res===True)
                {
                    if( $i<3 )$compressing = 70;
                    else $compressing = 50;

                    switch( $itypre )
                    {
                        case "jpeg":ImageJPEG($new_file,$new_file_name, $compressing);break;
                        case "image/jpeg":ImageJPEG($new_file,$new_file_name, $compressing);break;
                        case "image/pjpeg":ImageJPEG($new_file,$new_file_name, $compressing);break;

                        case "jpg":ImageJPEG($new_file,$new_file_name, $compressing);break;
                        case "image/jpg":ImageJPEG($new_file,$new_file_name, $compressing);break;

                        case "gif":ImageGIF($new_file,$new_file_name);break;
                        case "image/gif":ImageGIF($new_file,$new_file_name);break;

                        case "png":ImagePNG($new_file,$new_file_name);break;
                        case "image/png":ImagePNG($new_file,$new_file_name);break;
                    }
                }
                else
                    $cout.="<p class=\"err\">Произошла ошибка обработки файла (".$new_file_name.")</p>";

                #Наложение логотипа на картинки
                if( trim(getLocalVaribal("addLogoOnImage")) )$this->addLogoOnImage( $new_file_name, $itypre, $dopUrl.getLocalVaribal("logo") );
            }
        }

        return $cout;
    }

    function addLogoOnImage( $tempImage, $imgType, $logo )
    {
        switch( $imgType )
        {
            case "jpeg":$srcImage = ImageCreateFromJPEG($tempImage);break;
            case "image/jpeg":$srcImage = ImageCreateFromJPEG($tempImage);break;
            case "image/pjpeg":$srcImage = ImageCreateFromJPEG($tempImage);break;

            case "jpg":$srcImage = ImageCreateFromJPEG($tempImage);break;
            case "image/jpg":$srcImage = ImageCreateFromJPEG($tempImage);break;

            case "gif":$srcImage = ImageCreateFromGIF($tempImage);break;
            case "image/gif":$srcImage = ImageCreateFromGIF($tempImage);break;

            case "png":$srcImage = ImageCreateFromPNG($tempImage);break;
            case "image/png":$srcImage = ImageCreateFromPNG($tempImage);break;
            default:return -1;break;
        }

        $logoImage = imagecreatefrompng( $logo );

        $srcWidth  = ImageSX($srcImage);
        $srcHeight = ImageSY($srcImage);

        $logoWidth  = ImageSX($logoImage);
        $logoHeight = ImageSY($logoImage);

        $newLogoWeight = $logoWidth;
        $newlogoHeightt = $logoHeight;

        if( $logoWidth>$srcWidth )
        {
            $newLogoWeight = $srcWidth;
            $pr = (100*$srcWidth)/$logoWidth;
            $newlogoHeightt = ($logoHeight*$pr)/100;
        }

        $res = imagecopyresized($srcImage, $logoImage, 0, $srcHeight - $newlogoHeightt, 0, 0, $newLogoWeight, $newlogoHeightt, $logoWidth, $logoHeight);

        unlink($tempImage);

        switch( $imgType )
        {
            case "jpeg":ImageJPEG($srcImage, $tempImage, 100);break;
            case "image/jpeg":ImageJPEG($srcImage, $tempImage, 100);break;
            case "image/pjpeg":ImageJPEG($srcImage, $tempImage, 100);break;

            case "jpg":ImageJPEG($srcImage, $tempImage, 100);break;
            case "image/jpg":ImageJPEG($srcImage, $tempImage, 100);break;

            case "gif":ImageGIF($srcImage, $tempImage);break;
            case "image/gif":ImageGIF($srcImage, $tempImage);break;

            case "png":ImagePNG($srcImage, $tempImage);break;
            case "image/png":ImagePNG($srcImage, $tempImage);break;
        }

        ImageDestroy($srcImage);
    }*/
}