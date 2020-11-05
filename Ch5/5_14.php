<?php

protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];
