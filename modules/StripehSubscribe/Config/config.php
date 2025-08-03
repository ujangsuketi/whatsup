<?php

return [
    'name' => 'StripehSubscribe',
    'stripe_key' => env('STRIPE_KEY'),
    'stripe_secret_key' => env('STRIPE_SECRET'),
    'stripe_webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
];