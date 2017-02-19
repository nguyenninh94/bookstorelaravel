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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '2048058320-vpsaakgf3i50mnep3ruigd7rnj3hbrvi.apps.googleusercontent.com',
        'client_secret' => '1rMUVXayJFmjCvVS6rEeaolF',
        'redirect' => 'http://localhost:81/bookstore/google/callback',
    ],

    'facebook' => [
        'client_id' => '211859729276400',
        'client_secret' => 'b0ee3ea43dcc5b168be9e03ab2c3e47e',
        'redirect' => 'http://localhost:81/bookstore/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'RG01R2NleaNTwe1OExqbrikyY',
        'client_secret' => 'rU9NrPl7MhrTL7aQOFFsEo0D1v5X7ny3BsGguHbQo8NBhAB9fB',
        'redirect' => 'http://localhost:81/bookstore/twitter/callback',
    ],


];
