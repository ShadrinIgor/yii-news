<?php

/*
$cidName = com_getItemFieldValue( "", $cid, $newsData[cid_id], "name" );
$pageKey = $_SESSION["page"]["key"];
$order = "ORDER BY `date` DESC, `col` DESC";
$sqlWhere = " archive=0 AND `date`<=now() ";
$people = $newsData["people"];

if( $_POST[coment_add] )
{
$_POST[name] = $newsData[id];
$_POST[date_add] = date("Y-m-d");
$_POST[time_add] = date("H:i");
$_POST[u_name] = chek( $_POST[u_name] );
$_POST[u_email] = chek( $_POST[u_email] );
$_POST[description] = chek( $_POST[description] );
}
$image = oth_getItemImage( "", $newsData[image], 2, $newsData );
$countShow = oth_getCountShows( "", $newsData[col], 1 ) + 1;

if( $newsData[cid] == 236 )$news_table = "catalog_items";
*/
?>

[rightColum]
<?php
// , array( "slug"=>$newsData->cid_id->key_word)
$this->widget('addressLineWidget', array(
    'links'=>array(
        $newsData->cid_id->name => array( 'category/', array("slug"=>$newsData->cid_id->key_word) ),
        $newsData->name,
    ),
));
?>
<div id="PageText" class="newsPage">

    <h1><?= $newsData->name ?></h1>
    |<?php Yii::app()->banners->getBaner( 1, 1 ); ?>|
    <div class="CS_params">
        <?php if( $newsData->cid_id->id >0 ) : ?>Категория: <a href="#"><b><?= $newsData->cid_id->name; ?></b></a>&nbsp;<?php endif; ?>
        <?php if( $newsData->date ) : ?>Дата: <b><?= SiteHelper::getDateOnFormat( $newsData->date, "d.m.Y" )  ?></b><?php endif; ?>
    </div>
    <div id="CS_news"><div>статью посмотрели: <b><?= $newsData->col+1 ?></b> человек(а)</div></div>

    <?php if( $newsData->image ) : ?><img src="<?= ImageHelper::getImage( $newsData->image, 2, $newsData ) ?>" style="float:left;margin:0px 3px 3px 0px" alt="<?= $newsData->name ?>" title="<?= $newsData->cid_id->name." - ". $newsData->name ?> :: Мировые новости" /><?php endif; ?>
    <?= $newsData->description; ?>
    <?php if( $newsData->tags ) :?><?= SiteHelper::getTags( $newsData->tags ); ?></div><?php endif; ?>

<div class="listImg">
    <?php foreach( $newsData->getImages() as $value  ) : ?>
        <img src="<?= ImageHelper::getImage( $value->image, 2, $value ) ?>" />
    <?php endforeach; ?>
</div>

<br/>
<?php $this->widget( 'cosbuttonsWidget' ); ?>

<?php if( $newsData->people->id >0 ) : ?>
<div class="centerBlock peopleBlock">
    <h3>Подробнее о <?= $newsData->people->name ?>"</h3>
    <?php if( $value->image ) : ?><img src="<?= ImageHelper::getImage( $value->image, 2, $value ) ?>" /><?php endif; ?>
    <?= SiteHelper::getSubTextOnWorld( $newsData->people->description, 600 ) ?>
</div>
<?php endif; ?>

<?php
/*
if( $pageKey=="news" ) :
$cout.="
<!--div id="centerBlock">
 <h3>Комментарии</h3>
 _?_( $_POST[coment_add] )com_saveCategoryAddForm(239, "", "", "add_comment")_?_
 com_getCidItems( 239, "", "", " name='$newsData[id]'", "", 1 ):coments
 <div id="CNAdd">
   <form action="" method="post"> 
     <table class="tableBorder" align="center">
       com_getCategoryAddForm( 239 )
       <tr>
         <td ></td><td><input type="submit" class="button_no_border" name="coment_add" value=" Отправить " /></td>
       </tr>
     </table>
   </form>
 </div>
</div-->
";

endif;
*/
?>

<?php if( sizeof( $otherNews )>0 ) : ?>
    <div class="centerBlock">
        <h3>Смотрите также</h3>
        <?php
            foreach( $otherNews as $values )
            {
                $this->widget('newsWidget', array(
                'values'=>$values,
                'controller'=> $controller
                ));
            }
        ?>
    </div>
    <br/>
<?php endif; ?>

</div>

<?php $this->widget( 'fotoNewsWidget' ); ?>