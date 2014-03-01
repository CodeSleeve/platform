<?php namespace Codesleeve\Platform\Validators;

class UserValidator extends BaseValidator
{
	/**
	 * Return rules for a user
	 *
	 * @return array
	 */
    public function rules($input, $model, $type)
    {
        $update = [
            'first_name' 		     => 'required|max:256',
            'last_name' 		     => 'required|max:256',
            'email' 			     => "required|email|unique:users,email,$model->id",
            'password_confirmation'  => 'required_with:password|same:password'
        ];

        $create = [
            'first_name'            => 'required|max:256',
            'last_name' 		    => 'required|max:256',
            'email'     		    => 'required|email|unique:users',
            'password'  		    => 'required|min:8|max:20|alpha_dash',
            'password_confirmation' => 'required|same:password'
        ];

        return $type == 'update' ? $update : $create;
    }
}