<?php

namespace Endeavors\MaxMD\Api\Auth\Auth;

use Endeavors\MaxMD\Support\PatientRegistrationSoapClient;
use Endeavors\MaxMD\Api\Auth\Auth\Contracts\IAuthenticate;

class PatientRegistrationAuth extends BaseAuth implements IAuthenticate
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
        $client = PatientRegistrationSoapClient::getInstance();
        $user = ['username' => $username, 'password' => $password];
        $this->response = $client->Login($user);
        return $this;
    }
}