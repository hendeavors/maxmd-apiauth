<?php

namespace Endeavors\MaxMD\Api\Auth\Auth;

use Endeavors\MaxMD\Api\Auth\Session;
use Endeavors\MaxMD\Api\Auth\Auth\Contracts\IAuthenticate;

/**
 * Api Authentication occurs server to server, therefore we don't necessarily need a response out
 */
abstract class BaseAuth implements IAuthenticate
{
    /**
     * Create a session if login is successful
     */
    public function Session()
    {
        return Session::getInstance($this->root()->sessionId);
    }
    
    /**
     * Get the response output starting from the root "return"
     * @return the response from the root
     */
    protected function root()
    {
        if( null === $this->raw() ) {
            return json_decode(json_encode([
                'success' => false,
                'sessionId' => null
            ]));
        }
        
        $result = $this->raw()->return;

        if ( ! property_exists($result, 'sessionId' )) {
            $result->sessionId = null;
        }

        return $result;
    }
    
    /**
     * @return bool
     */
    protected function passes()
    {
        return $this->root()->success === true;
    }
    
    /**
     * @return bool
     */
    protected function fails()
    {
        return ! $this->passes();
    }

    /**
     * @return Raw
     */
    protected function raw()
    {
        return $this->response;
    }
}