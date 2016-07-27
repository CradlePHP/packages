<?php //-->
/**
 * This file is part of the Cradle PHP Library.
 * (c) 2016-2018 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Cradle\Data;

/**
 * Allows the ability to listen to events made known by another
 * piece of functionality. Events are items that transpire based
 * on an action. With events you can add extra functionality
 * right after the event has triggered.
 *
 * @package  Cradle
 * @category Data
 * @author   Christian Blanquera <cblanquera@openovate.com>
 * @standard PSR-2
 */
interface CollectionInterface
{
	/**
	 * Attempts to use __callData then __callResolver
	 *
	 * @param *string $name name of method
	 * @param *array  $args arguments to pass
	 *
	 * @return mixed
	 */
	public function __call($name, $args);

	/**
     * Allow object property magic to redirect to the data variable
     *
     * @param *string $name  The name of the supposed property
     * @param *mixed  $value The value of the supposed property
     */
    public function __get($name);

    /**
     * Allow object property magic to redirect to the data variable
     *
     * @param *string $name  The name of the supposed property
     * @param *mixed  $value The value of the supposed property
     */
    public function __set($name, $value);
    
    /**
     * If we output this to string we should see it as json
     *
     * @return string
     */
    public function __toString();
	
	/**
     * Returns the data size
     * For Countable interface
     */
    public function count();
	
	/**
     * Returns the current item
     * For Iterator interface
     */
    public function current();
	
	/**
	 * Loop generator
	 */
	public function generator();
	
	/**
	 * Returns the entire data
	 * 
	 * @return array
	 */
	public function get();
	
	/**
     * Returns th current position
     * For Iterator interface
     */
    public function key();

    /**
     * Increases the position
     * For Iterator interface
     */
    public function next();
	
	/**
     * isset using the ArrayAccess interface
     *
     * @param *scalar|null|bool $offset The key to test if exists
     *
     * @return bool
     */
    public function offsetExists($offset);

    /**
     * returns data using the ArrayAccess interface
     *
     * @param *scalar|null|bool $offset The key to get
     *
     * @return mixed
     */
    public function offsetGet($offset);

    /**
     * Sets data using the ArrayAccess interface
     *
     * @param *scalar|null|bool $offset The key to set
     * @param mixed             $value  The value the key should be set to
     */
    public function offsetSet($offset, $value);

    /**
     * unsets using the ArrayAccess interface
     *
     * @param *scalar|null|bool $offset The key to unset
     */
    public function offsetUnset($offset);

	/**
     * Rewinds the position
     * For Iterator interface
     */
    public function rewind();
	
	/**
	 * Sets the entire data
	 *
	 * @param *array $data
	 * 
	 * @return CollectionInterface
	 */
	public function set(array $data);
    
    /**
     * Validates whether if the index is set
     * For Iterator interface
     *
     * @return bool
     */
    public function valid();
}
