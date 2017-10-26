<?php

namespace Endeavors\MaxMD\Api\Auth\Auth;

use Endeavors\MaxMD\Support\Client;
use Endeavors\MaxMD\Api\Auth\Auth\Contracts\IAuthenticate;

class PatientRegistration extends BaseAuth implements IAuthenticate
{
    protected $response;
    
    /**
     * Authenticate with maxmd to make api requests
     * void
     * @param username
     * @param password
     */
    public function Login($username, $password)
    {
        $user = ['username' => $username, 'password' => $password];
        $this->response = Client::PatientRegistration()->Login($user);
        return $this;
    }
}