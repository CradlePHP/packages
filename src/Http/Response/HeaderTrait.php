<?php //-->
/**
 * This file is part of the Cradle PHP Library.
 * (c) 2016-2018 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE.txt
 * distributed with this package.
 */

namespace Cradle\Http\Response;

/**
 *
 * @vendor   Cradle
 * @package  Server
 * @author   Christian Blanquera <cblanquera@openovate.com>
 * @standard PSR-2
 */
trait HeaderTrait
{
	/**
	 * Adds a header parameter
	 *
	 * @param *string     $name  Name of the header
	 * @param string|null $value Value of the header
	 *
	 * @return Response
	 */
	public function addHeader($name, $value = null) 
	{
		if(!is_null($value)) {
			return $this->set('headers', $name, $value);
		}

		return $this->set('headers', $name, null);
	}
	
	/**
	 * Returns either the header value given
	 * the name or the all headers
	 *
	 * @return mixed
	 */
	public function getHeaders($name = null)
	{
		if(is_null($name)) {
			return $this->get('headers');
		}

		return $this->get('headers', $name);
	}
}