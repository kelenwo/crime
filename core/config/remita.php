<?php


		$config['MerchantID']		=		2547916;

		/*
		|--------------------------------------------------------------------------
		| Service Type ID
		|--------------------------------------------------------------------------
		|
		| This is a unique service type receiving the payment
		|
		*/

		$config['ServiceTypeID'] 	= 		4430731;

		/*
		|--------------------------------------------------------------------------
		| Api Key
		|--------------------------------------------------------------------------
		|
		| This is a unique key generated for you
		| For security reasons you are required to hash your payment details with your API Key
		|
		*/

		$config['ApiKey'] 			= 		1946;

		/*
		|--------------------------------------------------------------------------
		| Remita Status Url
		|--------------------------------------------------------------------------
		|
		| This is a Web API Base URL where all apis call should goes through
		|
		*/

		$config['CSU'] 				= 		"https://www.remitademo.net/remita/ecomm";

		/*
		|--------------------------------------------------------------------------
		| Gateway url
		|--------------------------------------------------------------------------
		|
		| This is an endpoint where payment form should be posted
		|
		*/

		$config['GatewayUrl'] 		= 		"https://remitademo.net/remita/exapp/api/v1/send/api/echannelsvc/merchant/api/paymentinit";

		/*
		|--------------------------------------------------------------------------
		| Final Payment Gateway url
		|--------------------------------------------------------------------------
		|
		| This is an endpoint where payment form should be posted
		|
		*/

		$config['GatewayUrlRRR'] 		= 		"https://remitademo.net/remita/ecomm/finalize.reg";

		/*
		|--------------------------------------------------------------------------
		| Application URL
		|--------------------------------------------------------------------------
		|
		| This URL is used to be a callback url when a form is submited
		|
		*/

		$config['url'] 				= 		'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		$config['URL'] 				=		'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
