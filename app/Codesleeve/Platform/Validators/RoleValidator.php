<?php namespace Codesleeve\Platform\Validators;

class RoleValidator extends BaseValidator
{
	/**
	 * Return rules for a user
	 *
	 * @return array
	 */
    public function rules($input, $model, $type)
    {
        $update = [
            'name' 		     => 'required|max:256',
        ];

        $create = [
            'name'           => 'required|max:256',
        ];

        return $type == 'update' ? $update : $create;
    }
}