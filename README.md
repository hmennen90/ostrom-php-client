# Ostrom PHP Client

## Description

This package for Laravel provides a simple method to connect the Ostrom Customer API - NOT the Partner Endpoints for now.

## Usage

* Require via composer ```composer require hmennen90/ostrom-php-client```
* Add the following to your .env
```
OSTROM_API_AUTH_URL=<THE OSTROM API AUTH URL>
OSTROM_API_URL=<THE OSTROM API URL>
OSTROM_CLIENT_ID=<YOUR CLIENT ID>
OSTROM_CLIENT_SECRET=<YOUR CLIENT SECRET>
```
* Instantiate the Connector and use prepared request classes and prepared responses 
```<?php
use Hmennen90\OstromPhpClient\OstromServiceConnector;
use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\Users\GetMeRequest;
use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Users\GetMeResponse;
$ostrom = new OstromServiceConnector();

$request = new GetMeRequest();

/** @var GetMeResponse $response */
$response = $ostrom->executeRequest($request);

$response->getEmail();

$response->getFirstName();

$response->getLastName();

$response->getLangauge();
 ```