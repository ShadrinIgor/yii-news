<?php

return array(
    'onRegistration'=>array(
        array('UserNotifier', 'registration'),
    ),

    'onRegistrationConfirm'=>array(
        array('UserNotifier', 'registrationConfirm'),
    ),

    'onLogin'=>array(
        array('UserNotifier', 'updateDateVisit'),
    ),

    'onLostPassword'=>array(
        array('UserNotifier', 'lostPassword'),
    ),


);