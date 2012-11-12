<div id="MRight">
    <div class="ML_block">
        <div class="BML_title">Популярные новости дня</div>
       <?php
            $listNews = CatalogNews::fetchAll(
                            DBQueryParamsClass::CreateParams()
                                ->setOrderBy("col DESC")
                                ->setLimit("6")
                        , array( "catalog_country", "catalog_cid" ));

            foreach( $listNews as $values )
            {
                $this->widget('newsWidget', array(
                    'values'=>$values,
                    'controller'=> $controller
                ));
            }
        ?>
    </div>
</div>