<?php
    foreach( $listNews as $values )
    {
        $this->widget('newsWidget', array(
                                        'values'=>$values
                    ));
    }
