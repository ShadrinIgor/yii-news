<?php echo CHtml::form(); ?>
<?php echo CHtml::errorSummary($form); ?><br>

<table border="0" width="400" cellpadding="10" cellspacing="10">
    <tr>
        <td width="150"><?php echo CHtml::activeLabel($form, 'email'); ?>*</td>
        <td><?php echo CHtml::activeTextField($form, 'email') ?></td>
    </tr>
    <tr>
        <td><?php echo CHtml::activeLabel($form, 'password'); ?>*</td>
        <td><?php echo CHtml::activePasswordField($form, 'password') ?></td>
    </tr>
    <tr>
        <td><?php echo CHtml::activeLabel($form, 'password2'); ?>*</td>
        <td><?php echo CHtml::activePasswordField($form, 'password2') ?></td>
    </tr>
    <tr>
        <td width="150"><?php echo CHtml::activeLabel($form, 'name'); ?>*</td>
        <td><?php echo CHtml::activeTextField($form, 'name') ?></td>
    </tr>
    <tr>
        <td width="150"><?php echo CHtml::activeLabel($form, 'surname'); ?></td>
        <td><?php echo CHtml::activeTextField($form, 'surname') ?></td>
    </tr>
    <tr>
        <td width="150"><?php echo CHtml::activeLabel($form, 'fatchname'); ?></td>
        <td><?php echo CHtml::activeTextField($form, 'fatchname') ?></td>
    </tr>
    <tr>
        <td width="150"><?php echo CHtml::activeLabel($form, 'country'); ?></td>
        <td><?php //echo CHtml::activeTextField($form, 'country') ?></td>
    </tr>
    <tr>
        <td width="150"><?php echo CHtml::activeLabel($form, 'city'); ?></td>
        <td><?php //echo CHtml::activeTextField($form, 'city') ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo CHtml::submitButton('Зарегистрироваться'); ?></td>
    </tr>
</table>
<?php echo CHtml::endForm(); ?>