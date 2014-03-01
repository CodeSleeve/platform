<?php namespace Codesleeve\Platform\Navigation;

use Config, ArrayObject, StdClass, InvalidArgumentException;

class Navigator extends ArrayObject
{
	/**
	 * [__construct description]
	 */
	public function __construct($items = array())
	{
		foreach ($items as $item)
		{
			$this->add($item);
		}
	}

	/**
	 * [all description]
	 * @return [type] [description]
	 */
	public function all()
	{
		return $this;
	}

	/**
	 * [add description]
	 * @param [type] $link [description]
	 */
	public function add($item)
	{
		$this->validate($item);

		$obj = new StdClass;

		foreach ($item as $attr => $value)
		{
			$obj->$attr = $value;
		}

		$this[] = $obj;
	}

	/**
	 * [validate description]
	 * @param  [type] $item [description]
	 * @return [type]       [description]
	 */
	private function validate($item)
	{
		$required = array('title', 'icon', 'url', 'shown', 'active');

		foreach ($required as $attribute)
		{
			if (!array_key_exists($attribute, $item))
			{
				$title = isset($item['title']) ? $item['title'] : 'Unknown';
				throw new InvalidArgumentException("The required attribute $attribute was not found for navigation item $title!");
			}
		}		
	}
}