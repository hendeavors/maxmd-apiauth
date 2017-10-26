<?php

namespace Endeavors\MaxMD\Api\Auth\Auth\Contracts;

interface IAuthenticate
{
    /**
     * @return IAuthenticate
     */
    function Login($username, $password);
}