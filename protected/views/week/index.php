<?php
    $curent = date( "w" )-1;
    $startDate = time() - $curent*3600*24;
?>
<div id="MLeft">
    <h1>Новости за неделю</h1>
<?php
    for( $i=$curent;$i>0;$i-- ):
        $day = date( "j", $startDate ) + $i;
        $monthYear = date( ".m.Y", $startDate );

        $date_ = date( "d.m.Y", strtotime( $day.$monthYear ) );
        $date_sql = date( "Y-m-d", strtotime( $day.$monthYear ) );

        $list01Params =  DBQueryParamsClass::CreateParams()
            ->setConditions( 'date=:date AND country=1' )
            ->setParams( array( ":date" => $date_sql ) )
            ->setLimit( 5 )
            ->setOrderBy(" col DESC");


        $list02Params =  DBQueryParamsClass::CreateParams()
            ->setConditions( 'date=:date AND country!=1' )
            ->setParams( array( ":date" => $date_sql ) )
            ->setLimit( 5 )
            ->setOrderBy(" col DESC");
?>
        <div class="week_news">
            <h2><?= $date_ ?></h2>
            <div class="WN_Block WN_Left">
            <?php
                foreach( CatalogNews::fetchAll( $list01Params )as $values )
                {
                    $this->widget('newsWidget', array(
                                    'values'=>$values
                                ));
                }
            ?>
            </div>
            <div class="WN_Block">
                <?php
                foreach( CatalogNews::fetchAll( $list02Params ) as $values )
                {
                    $this->widget('newsWidget', array(
                        'values'=>$values
                    ));
                }
                ?>
            </div>
        </div>
    <?php endfor; ?>
</div>