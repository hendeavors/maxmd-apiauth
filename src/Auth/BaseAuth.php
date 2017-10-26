<?php

namespace Endeavors\MaxMD\Api\Auth\Auth;

use Endeavors\MaxMD\Api\Auth\Session;

/**
 * Api Authentication occurs server to server, therefore we don't necessarily need a response out
 */
abstract class BaseAuth
{
    /**
     * Create a session if login is successful
     */
    public function Session()
    {
        if($this->passes()) {
            return new Session($this->root()->sessionId);
        }

        return new Session();
    }
    
    /**
     * Get the response output starting from the root "return"
     * @return the response from the root
     */
    protected function root()
    {
        return $this->raw()->return;
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