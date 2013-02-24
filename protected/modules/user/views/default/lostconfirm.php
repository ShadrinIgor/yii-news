<?php
$cs=Yii::app()->clientScript;
$cs->scriptMap=array();
$baseUrl=$Theme->getBaseUrl();
$cs->registerScriptFile($baseUrl.'/js/jquery/jquery.js');
$cs->registerScriptFile($baseUrl.'/js/jquery/jquery.validationEngine-ru.js');
$cs->registerScriptFile($baseUrl.'/js/jquery/jquery.validationEngine.js');
$cs->registerCssFile($baseUrl.'/css/jquery/validationEngine.jquery.css');
?>

<div id="PageText">
    <?php
    $this->widget('addressLineWidget', array(
        'links'=>array( "Смена пароля" ),
    ));
    ?>
    <?php Yii::app()->banners->getBannerByCategory( 1 ); ?>
    <?php echo CHtml::form('','post',array( 'id'=>'validateForm')); ?>
    <h1>Смена пароля</h1>
    <?php echo CHtml::errorSummary($form); ?><br/>
    <table id="loginForm" align="center">
        <tr>
            <th><?php echo CHtml::activeLabel($form, 'password'); ?><font class="redColor">*</font></th>
            <td><?php echo CHtml::activePasswordField($form, 'password', array( 'class'=>'validate[required]' )) ?></td>
        </tr>
        <tr>
            <th><?php echo CHtml::activeLabel($form, 'password2'); ?><font class="redColor">*</font></th>
            <td><?php echo CHtml::activePasswordField($form, 'password2', array( 'class'=>'validate[required]' )) ?></td>
        </tr>
        <tr>
            <td></td>
            <td align="center">
                <?php echo CHtml::submitButton('Сохранить'); ?>
            </td>
        </tr>
    </table>
    <?php echo CHtml::endForm(); ?>
</div>