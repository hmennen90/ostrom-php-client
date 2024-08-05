<?php
return [
    'auth_api_url' => env('OSTROM_API_AUTH_URL', 'https://auth.production.ostrom-api.io/oauth2/token'),
    'api_url' => env('OSTROM_API_URL', 'https://api.ostrom.com'),
    'client_id' => env('OSTROM_CLIENT_ID'),
    'client_secret' => env('OSTROM_CLIENT_SECRET'),
];