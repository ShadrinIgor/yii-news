<?php

/*
if( !empty( $GLOBALS["class_page"] ) )
$pageTemplateParams = $GLOBALS["class_page"]->getTemplateParametrs( "option" );
if( !empty( $pageTemplateParams[cid] ) )$cid = $pageTemplateParams[cid];
if( !$cid )$cid = 226;
if( !empty( $pageTemplateParams[cid] ) )$news_cid = $pageTemplateParams[news_cid];
if( !$news_cid )$news_cid= 230;
if( !empty( $pageTemplateParams[cid] ) )$news_table = $pageTemplateParams[news_table];
if( !$news_table )$news_table= "catalog_news";

$cidName = com_getItemFieldValue( "", $cid, $newsData[cid_id], "name" );
$pageKey = $_SESSION["page"]["key"];
$order = "ORDER BY `date` DESC, `col` DESC";
$sqlWhere = " archive=0 AND `date`<=now() ";
$people = $newsData["people"];

if( $pageKey=="news" && empty( $newsData[id] ) )return ;
if( $newsData["cid_id"] )$sqlWhere.=" AND cid_id='".$newsData["cid_id"]."' AND id!='".$newsData["id"]."' ";
if( $people )$peopleData = mysql_fetch_array( mysql_query( "SELECT * FROM catalog_people WHERE id='$people'" ) );
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

[address_line]
[rightColum]
<div id="PageText" class="newsPage">

    <h1><?= $newsData->name ?></h1>
    [banner_top]
    <div class="CS_params">
        <?php if( $newsData->cid_id->id >0 ) : ?>Категория: <a href="http://world-news.uz/category/$newsData[cid_id]/"><b><?= $newsData->cid_id->name; ?></b></a>&nbsp;<?php endif; ?>
        <?php if( $newsData->date ) : ?>Дата: <b><?= $newsData->date  ?></b><?php endif; ?>
    </div>
    <div id="CS_news"><div>статью посмотрели: <b><?= $newsData->col+1 ?></b> человек(а)</div></div>

    <?php if( $newsData->image ) : ?><img src="<?= ImageHelper::getImage( $newsData->image, 2, $newsData ) ?>" style="float:left;margin:0px 3px 3px 0px" alt="<?= $newsData->name ?>" title="$cidName - <?= $newsData->name ?> :: Мировые новости" /><?php endif; ?>
    <?= $newsData->description; ?>
    <?php if( $newsData->tags ) :?><?= $newsData->tags ?>{oth_getNewsTags( $newsData[tags], $newsData[tags_] )}</div><?php endif; ?>

<div class="listImg">
    {com_getItemImages( $newsData, $newsData[cid], $nameTable ):template_list_img}
</div>

<br/>
[cos_buttons]

<?php if( $newsData->people->id >0 ) : ?>
<div class="centerBlock peopleBlock">
    <h3>Подробнее о <?= $newsData->people->name ?>"</h3>
    <?= $newsData->people->description ?> ?>
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

<div class="centerBlock">
    <h3>Смотрите также</h3>
    {com_getCidItems( $news_cid, "news", 5, $sqlWhere, $order ):news_category_template}
</div>
<br/>

</div>

[foto_news]