<?php namespace Codesleeve\Platform\Validators;

class MenuValidator extends BaseValidator
{
    /**
     * Controller to use
     * 
     * @var string
     */
    protected $controller = "Codesleeve\Platform\Controllers\MenuController";

	/**
	 * Return rules for a user
	 * 
	 * @return array
	 */
    public function rules($input, $model, $type)
    {
        $update = [
            'title' => 'required',
        ];

        $create = [
            'title' => 'required',
        ];

        return $type == 'update' ? $update : $create;
    }
}