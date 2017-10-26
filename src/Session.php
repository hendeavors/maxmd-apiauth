<?php

namespace Endeavors\MaxMD\Api\Auth;

/**
 * Handle the maxmd api session
 */
class Session
{
    private static $instance = null;

    protected $sessionId;

    protected $loginTime;

    public function __construct($sessionId = null)
    {
        $this->sessionId = $sessionId;

        $this->loginTime = null !== $sessionId ? time() : null;
    }

    final private static function instance()
    {
        return static::$instance;
    }

    final public static function getInstance($sessionId = null)
    {
        if( null === static::instance() ) {
            static::$instance = new Session($sessionId);
        }

        return static::instance();
    }
    
    /**
     * The session id
     * @return string
     */
    public function Id()
    {
        return $this->sessionId;
    }
    
    /**
     * The login time in minutes
     * @todo create a more elegant api for time conversion
     */
    public function LoginTime()
    {
        return $this->loginTime / 60;
    }
    
    /**
     * The expire time in minutes
     */
    public function ExpiresAt()
    {
        return $this->LoginTime() + 10;
    }
    
    /**
     * Is now greater than the login time plus 10 minutes
     * @return bool
     */
    public function Expired()
    {
        return (time() / 60) >= $this->ExpiresAt();
    }
    
    /**
     * Alias
     * @see Active
     */
    public function Valid()
    {
        return $this->Active();
    }
    
    /**
     * We are not expired
     */
    public function Active()
    {
        return ! $this->Expired();
    }
}