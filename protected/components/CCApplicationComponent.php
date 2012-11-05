<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колоюок
 * Date: 06.11.12
 * Time: 1:21
 * To change this template use File | Settings | File Templates.
 */
abstract class CCApplicationComponent extends CApplicationComponent
{

    public function beforeRender()
    {}

    public function render($view,$data=array(),$return=false)
    {
        $data = array_merge( $data,
            array(
                "Theme"     => Yii::app()->getTheme(),
            )
        );

        $output=$this->renderPartial($view,$data,true);

        if($return)
            return $output;
        else
            echo $output;

    }

    public function renderPartial($view,$data=null,$return=false,$processOutput=false)
    {
        if(($viewFile=$this->getViewFile($view))!==false)
        {
            $output=$this->renderFile($viewFile,$data,true);
            if($processOutput)
                $output=$this->processOutput($output);
            if($return)
                return $output;
            else
                echo $output;
        }
        else
            throw new CException(Yii::t('yii','{controller} cannot find the requested view "{view}".',
                array('{controller}'=>get_class($this), '{view}'=>$view)));
    }

}