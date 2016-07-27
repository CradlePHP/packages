<?php //-->
/**
 * This file is part of the Cradle PHP Library.
 * (c) 2016-2018 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Cradle\Resolver;

/**
 * 
 * @package  Cradle
 * @category Resolver
 * @author   Christian Blanquera <cblanquera@openovate.com>
 * @standard PSR-2
 */
interface ResolverInterface
{
	/**
	 * Returns true if name can be resolved
	 *
	 * @param *string $name
	 *
	 * @return bool
	 */
	public function canResolve($name);

	/**
	 * Returns true if name is registered
	 *
	 * @param *string $name
	 *
	 * @return bool
	 */
	public function isRegistered($name);
	
	/**
	 * Returns true if name is shared
	 *
	 * @param *string $name
	 *
	 * @return bool
	 */
	public function isShared($name);

	/**
	 * Registers a resolver callback
	 *
	 * @param *string   $name     Name of Resolver
	 * @param *callable $callback What to execute when we need resolving
	 *
	 * @return ResolverInterface
	 */
    public function register($name, $callback);

	/**
	 * Does the resolving
	 *
	 * @param *string $name Name of Resolver
	 * @param *mixed  $args What to execute when we need resolving
	 *
	 * @return mixed
	 */
    public function resolve($name, ...$args);

	/**
	 * Does the resolving but considers shared
	 *
	 * @param *string $name Name of Resolver
	 * @param *mixed  $args What to execute when we need resolving
	 *
	 * @return mixed
	 */
    public function shared($name, ...$args);
}
