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

    'pusher' => [
        'beams_instance_id' => '80cd9f18-6ec1-49a7-a2c4-33be8cea555b',
        'beams_secret_key' => '3AA4CFCA5410852A5FE1ADCC5257EAA4DE737FC104FA063FE2A6D396FBF71CD6',
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
      'client_id' => env('FACEBOOK_CLIENT_ID'),
      'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
      'redirect' => 'https://time-flow.app',
    ],

];
