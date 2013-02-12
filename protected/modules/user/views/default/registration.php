<?php echo CHtml::form(); ?>
<h1><?= $title ?></h1>
<?php echo CHtml::errorSummary($form); ?><br>

<table border="0" width="400" cellpadding="10" cellspacing="10" class="tableForm">
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'email'); ?>*</th>
        <td><?php echo CHtml::activeTextField($form, 'email') ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::activeLabel($form, 'password'); ?>*</th>
        <td><?php echo CHtml::activePasswordField($form, 'password') ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::activeLabel($form, 'password2'); ?>*</th>
        <td><?php echo CHtml::activePasswordField($form, 'password2') ?></td>
    </tr>
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'name'); ?>*</th>
        <td><?php echo CHtml::activeTextField($form, 'name') ?></td>
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
        <td><?php echo CHtml::dropDownList('country', ( !empty( $form->country ) ? $form->country : "" ), $arrayCountry, array('empty' => ' --- --- --- ', 'class'=>"countryList")); ?></td>
    </tr>
    <tr>
        <th width="150"><?php echo CHtml::activeLabel($form, 'city'); ?></th>
        <td><?php echo CHtml::dropDownList('city', ( !empty( $form->city ) ? $form->city : "" ), array(), array('empty' => ' - выберите страну - ', 'class'=>"cityList")); ?></td>
    </tr>
    <tr class="trNoBorder">
        <td></td>
        <td><?php echo CHtml::submitButton('Зарегистрироваться'); ?></td>
    </tr>
</table>
<?php echo CHtml::endForm(); ?>