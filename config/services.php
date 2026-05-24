<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | AI Food Scan Service (FastAPI)
    |--------------------------------------------------------------------------
    |
    | Konfigurasi koneksi ke FastAPI AI service untuk deteksi makanan.
    | Ubah AI_FOOD_SCAN_ENDPOINT di file .env sesuai IP/port server FastAPI.
    | Timeout dalam satuan detik.
    |
    */
    'ai_food_scan' => [
        'endpoint' => env('AI_FOOD_SCAN_ENDPOINT', 'http://192.168.61.33:8000/analyze-food'),
        'timeout'  => env('AI_FOOD_SCAN_TIMEOUT', 30),
    ],

];
