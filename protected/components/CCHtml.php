<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колоюок
 * Date: 23.11.12
 * Time: 1:56
 * To change this template use File | Settings | File Templates.
 */

class CCHtml extends CHtml
{
    public static function link($text,$url='#',$htmlOptions=array())
    {
        $url = SiteHelper::checkedSlugName();
        if($url!=='')
            $htmlOptions['href']=self::normalizeUrl($url);
        self::clientChange('click',$htmlOptions);
        return self::tag('a',$htmlOptions,$text);
    }
}