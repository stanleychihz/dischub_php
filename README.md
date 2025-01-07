## Dischub PHP SDK

## Overview 

Dischub Payment Gateway is a robust and easy-to-use solution for integrating online payment processing into your PHP-based applications. It supports various payment methods, including Visa, MasterCard, and mobile money wallets, and is designed to ensure secure and seamless transactions.

## Features

Simple Integration: Quickly integrate payment functionality with minimal setup.
Multiple Payment Methods: Support for credit/debit cards, mobile money, and more.
Secure Transactions: PCI-compliant and supports advanced encryption protocols.
Customizable: Flexible options to suit your application’s needs.
Error Handling: Comprehensive response and error-handling mechanisms.
Lightweight and Fast: Optimized for performance and easy to use.

## Installation Requirements
Before you begin, ensure your server meets the following requirements:

PHP 7.4 or higher
cURL extension enabled
JSON extension enabled
Composer (for dependency management)
Installation
Using Composer
Install the package via Composer:

Copy code
```bash
composer require dischub/dischub
```
Include the below Composer autoload file in your project:

Copy code
```bash
require_once 'vendor/autoload.php';
```

## Usage

```bash
<?php

require 'vendor/autoload.php';

function payment() {
    $data = [
        "api_key" => "your-api-key",
        "sender" => "sender-dischub-account-email@gmail.com",
        "recipient" => "your-dischub-business-account-email@gmail.com",
        "amount" => 100,
        "currency" => "USD"
    ];

    $dischub = new Dischub();
    $response = $dischub->createPayment($data);

    print_r($response);
}

payment();

?>

```

## Success Response

```bash
Array
(
    [status] => success
    [message] => payment initiated
    [response_code] => 200
)
```

## Missing Keys Response

```bash
Array
(
    [status] => error
    [message] => missing or invalid required keys
    [response_code] => 400
)
```

## Currency Response

```bash
Array
(
    [status] => error
    [message] => Invalid or unsupported currency
    [response_code] => 400
)
```

## Authorization Response

```bash
Array
(
    [status] => error
    [message] => authorization failed
    [response_code] => 401
)
```


## Completing Payment

If you manage to receive 'success' response from dischub that means your payment has been initiated but not yet completed. To complete the payment you have to attach the link below on the payment button which is on your website, you can name it 'Pay with DiscHub'. This button is the one going to be clicked by your customers so they can complete their payments on your dischub page

```bash
 https://dischub.co.zw/api/make/payment/to/{your_dischub_business_account_email}
```

Replace the {your_dischub_business_account_email} with your dischub business email as stated see example below

```bash
https://dischub.co.zw/api/make/payment/to/softwarez@gmail.com
```