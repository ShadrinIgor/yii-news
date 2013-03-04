<?php
$baseUrl=$Theme->getBaseUrl();
$this->listJsFiles[] = $baseUrl.'/js/jquery/jquery.validationEngine-ru.js';
$this->listJsFiles[] = $baseUrl.'/js/jquery/jquery.validationEngine.js';
$this->listCssFiles[] = $baseUrl.'/css/jquery/validationEngine.jquery.css';
?>

<div id="PageText">
    <?php
    $this->widget('addressLineWidget', array(
        'links'=>array( "Авторизация" ),
    ));
    ?>
    <?php Yii::app()->banners->getBannerByCategory( 1 ); ?>
    <?php echo CHtml::form('','post',array( 'id'=>'validateForm')); ?>
    <h1>Авторизация</h1>
    <?php echo CHtml::errorSummary($form); ?><br>
    <table id="loginForm" align="center">
        <tr>
            <td colspan="2" align="center">
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
                    <td></td>
                    <td align="left">
                        <?php echo CHtml::submitButton('Авторизоватся'); ?>
                    </td>
                </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <h4>Если у Вас есть аккаунт, то авторизуйтесь через него?</h4>
                <?php
                    $this->widget('ext.eauth.EAuthWidget', array('action' => 'default/login'));
                ?>
            </td>
        </tr>
    </table>
    <?php echo CHtml::endForm(); ?>
</div>