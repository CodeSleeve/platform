<?php namespace Codesleeve\Platform\Validators;

class MenuLinkValidator extends BaseValidator
{
    /**
     * Controller to use
     * 
     * @var string
     */
    protected $controller = "Codesleeve\Platform\Controllers\MenuLinkController";

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

    /**
     * Handle validation failures
     * 
     * @param  array $input
     * @param  object $model
     * @param  object $validator
     * @return boolean
     */
    public function onFailure($input, $model, $validator, $type)
    {
        $action = null;

        if ($this->controller)
        {
            $action = $type == 'update' ? action("{$this->controller}@edit", [$model->id]) : action("{$this->controller}@create", [$model->menu_id]);
        }
        
        $this->throwValidationException("Given input is invalid!", $input, $validator, $action);
    }
}