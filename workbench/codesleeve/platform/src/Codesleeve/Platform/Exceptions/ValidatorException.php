<?php namespace Codesleeve\Platform\Exceptions;

class ValidatorException extends \Exception
{
	/**
	 * [$validator description]
	 * @var [type]
	 */
	private $validator;

	/**
	 * [$input description]
	 * @var [type]
	 */
	private $input;

	/**
	 * [$action description]
	 * @var [type]
	 */
	private $action;

	/**
	 * Creates a new exception
	 * 
	 * @param [type] $message     [description]
	 * @param [type] $validator   [description]
	 * @param [type] $input       [description]
	 * @param [type] $action [description]
	 */
	public function __construct($message, $input, $validator, $action)
	{
		parent::__construct($message);

		$this->validator = $validator;
		$this->input = $input;
		$this->action = $action;
	}

	/**
	 * [getValidator description]
	 * @return [type] [description]
	 */
	public function getValidator()
	{
		return $this->validator;
	}

	/**
	 * [getInput description]
	 * @return [type] [description]
	 */
	public function getInput()
	{
		return $this->input;
	}

	/**
	 * [getAction description]
	 * @return [type] [description]
	 */
	public function getAction()
	{
		return $this->action;
	}

	/**
	 * [setValidator description]
	 * @param [type] $validator [description]
	 */
	public function setValidator($validator)
	{
		$this->validator = $validator;
	}

	/**
	 * [setInput description]
	 * @param [type] $input [description]
	 */
	public function setInput($input)
	{
		$this->input = $input;
	}

	/**
	 * [setAction description]
	 * @param [type] $action [description]
	 */
	public function setAction($action)
	{
		$this->action = $action;
	}
}