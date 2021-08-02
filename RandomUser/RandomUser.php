<?php

namespace RandomUser;

use RandomUser\Requestor;

class RandomUser
{
    protected $response;
    protected $params;

    public function __construct( $params = [] )
    {
        $this->params = $params;
    }

    public function get()
    {
        try
        {
            $this->response = Requestor::getResponse( $this->params );
            return $this;
        }
        catch (\Throwable $th)
        {
            die( 'There was an error: ' . $th->getMessage() );
        }
    }

    public function toJson()
    {
        $result = $this->toArray();
        return json_encode( $result );
    }

    public function toArray()
    {
        $result = $this->response;
        return json_decode( $result, true );
    }
}