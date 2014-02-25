<?php namespace Codesleeve\Platform\Validators;

class PageValidator extends BaseValidator
{
    /**
     * Controller to use
     * 
     * @var string
     */
    protected $controller = "Codesleeve\Platform\Controllers\PageController";

	/**
	 * Return rules for a user
	 * 
	 * @return array
	 */
    public function rules($input, $model, $type)
    {
        $update = [
            'title' => 'required',
            'content' => 'required',
        ];

        $create = [
            'title' => 'required',
            'content' => 'required',
        ];

        return $type == 'update' ? $update : $create;
    }
}