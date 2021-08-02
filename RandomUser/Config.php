<?php

namespace RandomUser;

/**
 * RandomUser Configuration
 */

 class Config
 {
     /**
      * Define endpoint API
      */
      protected static $endpoint_api    = 'https://randomuser.me/api/';

      /**
       * API Version
       */
      protected static $api_version     = 'latest';

      /**
       * Get endpoint url
       * 
       * @return string RandomUser API url
       */

      public static function getEndpointUrl()
      {
          return self::$api_version == 'latest'
          ? self::$endpoint_api
          : self::$endpoint_api . self::$api_version . '/';
      }
 }