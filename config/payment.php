<?php

return [
    'default' => env("DEFAULT_PAYMENT", "Cash"),
    'systems' => [
        'Click' => [
            'active' => env("CLICK_ACTIVE", false),
            'img' => null,
            'footer_img' => null,
            'min' => 0,
            'max' => INF,
            'provider' => \App\Payment\Click\ClickServiceProvider::class,
            'redirectable' => true,
        ],
        'Paycom' => [
            'active' => env("PAYCOM_ACTIVE", false),
            'img' => null,
            'footer_img' => null,
            'min' => 0,
            'max' => INF,
            'provider' => \App\Payment\Paycom\PaycomServiceProvider::class,
            'redirectable' => true,
        ],
        'Apelsin' => [
            'active' => env("APELSIN_ACTIVE", false),
            'img' => null,
            'footer_img' => null,
            'min' => 0,
            'max' => INF,
            'provider' => \App\Payment\Apelsin\ApelsinServiceProvider::class,
            'redirectable' => true,
        ],
    ]
];