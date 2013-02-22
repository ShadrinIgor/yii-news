<?php

return array(
    'onRegistration'=>array(
        array('UserNotifier', 'registration'),
    ),

    'onRegistrationConfirm'=>array(
        array('UserNotifier', 'registrationConfirm'),
    ),
);