<?php

return [
    'publishable_key' => env('STRIPE_KEY'),
    'secret_key' => env('STRIPE_SECRET'),
    'merchant_url' => env('APP_URL')
];
