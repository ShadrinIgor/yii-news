<?php if( $banner->type!=1 ) : ?>
<a href="".$href."" title=""><img src="".$banner."" alt="" /></a>
<?php else :
 if( $banner->width )$width = " width=\"".$banner->width."\"";
 if( $banner->height )$height = "height=\"".$banner->height."\"";
?>
<a href="<?= $banner->href ?>" title="">
    <object <?= $width ?> <?= $height ?> classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
       <param value="<?= $banner->image ?>" name="movie"/>
       <embed  <?= $width ?> <?= $height ?> src="<?= $banner->image ?>" type="application/x-shockwave-flash"/>
    </object></a>
<?php endif; ?>