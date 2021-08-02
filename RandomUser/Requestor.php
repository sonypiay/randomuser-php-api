<?php

namespace RandomUser;

use RandomUser\Config;

/**
 * Send a request to RandomUser API
 */

 class Requestor
 {
     /**
      * @param mixed $response
      */
      protected static $response;

     /**
      * Send GET Request
      * 
      * @param string $url
      */

      protected static function request( $url, array $params = [] )
      {
          $query_params = count( $params ) > 0
          ? http_build_query( $params )
          : null;

          if( ! empty( $query_params ) )
          {
              $url = $url . '?' . $query_params;
          }

          try 
          {
            $curl_init    = curl_init();
            $curl_options = array(
                CURLOPT_URL             => $url,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_CUSTOMREQUEST   => 'GET',
            );

            curl_setopt_array( $curl_init, $curl_options );
            self::$response = curl_exec( $curl_init );

            if( self::$response === false ) throw new \Exception('CURL Error: ' . curl_error( $curl_init ), curl_errno( $curl_init ));
            return self::$response;
          }
          catch (\Exception $e)
          {
              self::$response = 'There was an error: ' . $e->getMessage();
          }

          return self::$response;
      }

      public static function getResponse( array $params = [] )
      {
          $url = Config::getEndpointUrl();
          return self::request( $url, $params );
      }
 }