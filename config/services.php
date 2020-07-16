<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],


    'facebook'  =>  [
        'client_id'  =>  env ( 'FACEBOOK_CLIENT_ID' ),   //  Votre  identifiant d' application Facebook  
        'client_secret'  =>  env ( 'FACEBOOK_CLIENT_SECRET' ),  //  Votre  secret d' application Facebook  
        'redirect'  =>  env ( 'FACEBOOK_CALLBACK_URL' ),
    ],



    'google'  =>  [
        'client_id'  =>  env ( 'GOOGLE_CLIENT_ID' ),   //  Votre  identifiant d' application GOOGLE  
        'client_secret'  =>  env ( 'GOOGLE_CLIENT_SECRET' ),  //  Votre  secret d' application GOOGLE  
        'redirect'  =>  env ( 'GOOGLE_CALLBACK_URL' ),
    ],



    /*'facebook' => [
        'client_id'=>'376999589932591',
        'client_secret'=>'0a68773f6e5123e9d7a6afdfcba6336b', 
        'redirect'=>'https://www.nowody.com/login/facebook/callback',
    ],*/



    /*'google' => [
        'client_id' => '97574517193-kt330869c0jclt9kdsjt0u8nlvj97uk1.apps.googleusercontent.com',
        'client_secret' => '0uwWqU43vT0gbWYfzncWc7PV',
        'redirect' => 'https://www.nowody.com/login/callback/google',
    ],*/

];
