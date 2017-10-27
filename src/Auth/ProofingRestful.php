<?php

namespace Endeavors\MaxMD\Api\Auth\Auth;

use Endeavors\MaxMD\Support\Client;
use Endeavors\MaxMD\Api\Auth\Auth\Contracts\IAuthenticate;
use Endeavors\MaxMD\Api\Auth\Session;

class ProofingRestful extends BaseAuth implements IAuthenticate
{
    protected $response;
    
    public function Login($username, $password)
    {
        $user = ['username' => $username, 'password' => $password];
        $this->response = (object)['return' => json_decode(Client::ProofingRest()->Post('personal/logIn', $user, array("Accept: application/json", "Content-Type: application/json")))];
        $this->Session();
        return $this;
    }
}