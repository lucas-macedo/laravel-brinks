<?php

return array(

    'multi' => array(
        'customer' => array(
            'driver' => 'database',
            'table' => 'customers'
        ),
        'user' => array(
            'driver' => 'database',
            'table' => 'users'
        )
    ),

    'reminder' => array(

        'email' => 'emails.auth.reminder',

        'table' => 'password_reminders',

        'expire' => 60,

    ),

);