<?php

namespace RandomUser;

use RandomUser\Config;

/**
 * Send a request to RandomUser API
 */

 class Requestor
 {
     /**
      * Send GET Request
      * 
      * @param string $url
      */

      protected static function request( array $params = [] )
      {
          $url = Config::getEndpointUrl();

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
            );

            curl_setopt_array( $curl_init, $curl_options );
            $response = curl_exec( $curl_init );

            if( $response === false ) throw new \Exception('CURL Error: ' . curl_error( $curl_init ), curl_errno( $curl_init ));
          }
          catch (\Exception $e)
          {
              die( 'An error has occured:' . $e->getMessage() );
          }

          return $response;
      }

      public static function getResponse( array $params = [] )
      {
          return self::request( $params );
      }
 }