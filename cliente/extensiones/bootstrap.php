<?php 


require __DIR__ . '/vendor/autoload.php';

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

	// Replace these values by entering your own ClientId and Secret by visiting https://developer.paypal.com/developer/applications/
	$clientId = 'Ae0-RjfeYwEkHqidqKv1Zjt7ctvC2N3f1e4PHdS4b1KDbFEHDqQJ1sbtXak0krTFIXR3ViU7C8c2aCOa';
	$clientSecret = 'EO1phK54BGRrKLpIOWKjKI46iEkHI2goZvEVKKwfmgwl67eFLGFWuFQw6c0DWtrXICoK-lSntRwTIOzh';

	$apiContext = new ApiContext(
	    new OAuthTokenCredential(
	        $clientId,
	        $clientSecret
	    )
	);

    $apiContext->setConfig(
        array(
            'mode' => 'sandbox',
            'log.LogEnabled' => true,
            'log.FileName' => '../PayPal.log',
            'log.LogLevel' => 'DEBUG',
            'http.CURLOPT_CONNECTTIMEOUT' => 40
        )
    );