<?php

class NewsTag
{
    static function normalisationDB()
    {
        foreach( CatNewsTags::fetchAll( DBQueryParamsClass::CreateParams()->setConditions("checked=:checked")->setParams(array( "checked"=>0 ))->setLimit(1000)->setCache(0) ) as $key=>$value )
        {
            $value->tag_translate = SiteHelper::checkedSlugName( $value->tag_translate );
            $value->checked=1;
            $value->save();
        }
    }
}