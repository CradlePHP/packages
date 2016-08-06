<?php //-->
/**
 * This file is part of the Cradle PHP Library.
 * (c) 2016-2018 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Cradle\Http\Request;

/**
 * Designed for the Request Object; Adds methods to store $_SESSION data
 *
 * @vendor   Cradle
 * @package  Http
 * @author   Christian Blanquera <cblanquera@openovate.com>
 * @standard PSR-2
 */
trait SessionTrait
{
    /**
     * Returns $_SESSION given name or all $_SESSION
     *
     * @param mixed ...$args
     *
     * @return mixed
     */
    public function getSession(...$args)
    {
        return $this->get('session', ...$args);
    }
    
    /**
     * Removes $_SESSION given name or all $_SESSION
     *
     * @param mixed ...$args
     *
     * @return bool
     */
    public function removeSession(...$args)
    {
        return $this->remove('session', ...$args);
    }
    
    /**
     * Returns true if has $_SESSION given name or if $_SESSION is set
     *
     * @param mixed ...$args
     *
     * @return bool
     */
    public function hasSession(...$args)
    {
        return $this->exists('session', ...$args);
    }

    /**
     * Sets $_SESSION
     *
     * @param *array $data
     * @param mixed  ...$args
     *
     * @return SessionTrait
     */
    public function setSession(&$data, ...$args)
    {
        if (is_array($data)) {
            return $this->set('session', $data);
        }
        
        if (count($args) === 0) {
            return $this;
        }
        
        return $this->set('session', $data, ...$args);
    }
}
