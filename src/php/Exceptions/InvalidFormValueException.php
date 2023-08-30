<?php

namespace Beestjeskwijt\Exceptions;

use Exception;
use Throwable;

class InvalidFormValueException extends Exception
{
	private $field;
	public function __construct($field, $message = "", $code = 0, Throwable $previous = null)
	{
		$this->field = $field;

		parent::__construct($message, $code, $previous);
	}

	public function get_field(){
		return $this->field;
	}
}
