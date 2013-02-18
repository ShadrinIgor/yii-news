<?php
$cs=Yii::app()->clientScript;
$cs->scriptMap=array();
$baseUrl=$Theme->getBaseUrl();
$cs->registerScriptFile($baseUrl.'/js/jquery/jquery.js');
$cs->registerScriptFile($baseUrl.'/js/jquery/jquery.validationEngine-ru.js');
$cs->registerScriptFile($baseUrl.'/js/jquery/jquery.validationEngine.js');
$cs->registerCssFile($baseUrl.'/css/jquery/validationEngine.jquery.css');
?>

<?php echo CHtml::form('','post',array( 'id'=>'validateForm')); ?>
<h1>Авторизация</h1>
<?php echo CHtml::errorSummary($form); ?><br>
<table>
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'email'); ?><font class="redColor">*</font></th>
        <td><?php echo CHtml::activeTextField($form, 'email', array( 'class'=>'validate[required,custom[email]]' )) ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::activeLabel($form, 'password'); ?><font class="redColor">*</font></th>
        <td><?php echo CHtml::activePasswordField($form, 'password', array( 'class'=>'validate[required]' )) ?></td>
    </tr>
    <tr>
        <td colspan="2">
            <?php echo CHtml::submitButton('Авторизоватся'); ?>
        </td>
    </tr>
</table>
<?php echo CHtml::endForm(); ?>