<?php

namespace Endeavors\MaxMD\Api\Auth;

/**
 * I'm not sure why there is a login method on every service
 * It would seem more reasonable to have some global login service
 * But I digress
 */
final class MaxMD
{
    /**
     * @todo which login to use, are they all the same? use all of them?
     * @return Auth\Contracts\Authenticate
     */
    public static function Login($username, $password)
    {
        // using the proofing restful login for now
        return (new Auth\ProofingRestful())->Login($username, $password);
    }

    public static function ProofingLogin($username, $password)
    {
        // works for now unless the global login has to be changed
        return static::Login($username,$password);
    }

    /**
     * @return Auth\Contracts\Authenticate
     */
    public static function PatientRegistrationLogin($username, $password)
    {
        return (new Auth\PatientRegistration())->Login($username, $password);
    }
}