<?php

/**
 * A randomuser.me API Client for PHP
 * Author: sonypiay
 * Email: sonypiay@mail.com
 * Date: 2 August 2021
 */

 /** 
  * Check PHP Version
  */
if( version_compare(PHP_VERSION, '7.0', '<') )
{
    throw new Exception('PHP Version >= 7.0 required.');
}

/**
 * Check PHP Curl extension.
 */

if( ! extension_loaded('curl') )
{
    throw new Exception('Your PHP must loaded curl extension.');
}

if( ! extension_loaded('json') )
{
    throw new Exception('Your PHP must loaded JSON extension');
}

/**
 * Load bootstrap file
 */
 require_once __DIR__ . '/RandomUser/bootstrap.php';