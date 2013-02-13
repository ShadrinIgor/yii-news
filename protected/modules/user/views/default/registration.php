<?php
    $cs=Yii::app()->clientScript;
    $cs->scriptMap=array();
    $baseUrl=$Theme->getBaseUrl();
    $cs->registerScriptFile($baseUrl.'/js/jquery/jquery.js');
    $cs->registerScriptFile($baseUrl.'/js/jquery/jquery.validationEngine-ru.js');
    $cs->registerScriptFile($baseUrl.'/js/jquery/jquery.validationEngine.js');
    $cs->registerCssFile($baseUrl.'/css/jquery/validationEngine.jquery.css');

    $cs->registerScriptFile($baseUrl.'/js/chosen/chosen.jquery.js');
    $cs->registerCssFile($baseUrl.'/js/chosen/chosen.css');
?>

<!--
<link rel="stylesheet" href="/bitrix/templates/Embassy Alliance/css/validationEngine.jquery.css" type="text/css" media="screen" charset="utf-8" />
-->

<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data', 'id'=>'validateForm')); ?>
<h1><?= $title ?></h1>
<?php echo CHtml::errorSummary($form); ?><br>

<table border="0" width="400" cellpadding="10" cellspacing="10" class="tableForm">
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'email'); ?><font class="redColor">*</font></th>
        <td><?php echo CHtml::activeTextField($form, 'email', array( 'class'=>'validate[required,custom[email]]' )) ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::activeLabel($form, 'password'); ?><font class="redColor">*</font></th>
        <td><?php echo CHtml::activePasswordField($form, 'password', array( 'class'=>'validate[required]' )) ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::activeLabel($form, 'password2'); ?><font class="redColor">*</font></th>
        <td><?php echo CHtml::activePasswordField($form, 'password2', array( 'class'=>'validate[required]' )) ?></td>
    </tr>
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'name'); ?><font class="redColor">*</font></th>
        <td><?php echo CHtml::activeTextField($form, 'name', array( 'class'=>'validate[required]' )) ?></td>
    </tr>
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'surname'); ?></th>
        <td><?php echo CHtml::activeTextField($form, 'surname') ?></td>
    </tr>
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'fatchname'); ?></th>
        <td><?php echo CHtml::activeTextField($form, 'fatchname') ?></td>
    </tr>
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'country'); ?></th>
        <td><?php echo CHtml::dropDownList('CatalogUsersRegistration[country]', ( !empty( $form->country ) ? $form->country : "" ), $arrayCountry, array('empty' => ' --- --- --- ', 'class'=>"countryList chzn-select")); ?></td>
    </tr>
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'city'); ?></th>
        <td>
            <?php echo CHtml::dropDownList('CatalogUsersRegistration[city]', ( !empty( $form->city ) ? $form->city : "" ), array(), array('empty' => ' - выберите страну - ', 'class'=>"cityList chzn-select")); ?><br/>
            <font class="fontSmall"><?php echo CHtml::activeLabel($form, 'country_other'); ?>:</font><br/>
            <?php echo CHtml::activeTextField($form, 'country_other') ?>
        </td>
    </tr>
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'image'); ?></th>
        <td><?php echo CHtml::activeFileField( $form, "image" ); ?></td>
    </tr>
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'captcha'); ?><font class="redColor">*</font></th>
        <td>
            <?$this->widget('CCaptcha', array('buttonLabel' => '<br>[новый код]'));?>
            <?php echo CHtml::activeTextField($form, 'captcha', array( 'class'=>'validate[required]' )) ?>
        </td>
    </tr>
    <tr class="trNoBorder">
        <td></td>
        <td><?php echo CHtml::submitButton('Зарегистрироваться'); ?></td>
    </tr>
</table>
<?php echo CHtml::endForm(); ?>