<?php

namespace Endeavors\MaxMD\Api\Auth\Auth;

use Endeavors\MaxMD\Support\ProofingRestClient;
use Endeavors\MaxMD\Api\Auth\Auth\Contracts\IAuthenticate;

class ProofingRestfulAuth extends BaseAuth implements IAuthenticate
{
    public function Login($username, $password)
    {
        // personal/logIn
        $client = ProofingRestClient::getInstance();
        $user = ['username' => $username, 'password' => $password];

        $this->response = (object)['return' => json_decode($client->Post('personal/logIn', $user, array("Accept: application/json", "Content-Type: application/json")))];
        return $this;
    }
}