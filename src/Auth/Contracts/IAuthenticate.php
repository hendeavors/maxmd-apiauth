<?php

namespace Endeavors\MaxMD\Api\Auth\Auth\Contracts;

interface IAuthenticate
{
    /**
     * @return Endeavors\MaxMD\Api\Auth\Session
     */
    function Login($username, $password);
}