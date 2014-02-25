<?php namespace Codesleeve\Platform\Validators;

use Validator;
use Codesleeve\Platform\Exceptions\ValidatorException;

abstract class BaseValidator
{

    /**
     * Allows us to set a controller for a given validator
     * and then the onFailure will take care of putting the
     * correct action in onFailure()
     * 
     * @var string
     */
    protected $controller = null;

    /**
     * Rules for a given model
     */
    abstract public function rules($input, $model, $type);

    /**
     * Run validation if these values are not null
     * 
     * @param array $input
     * @param Eloquent\Model $model
     */
    public function __construct($input = null, $model = null)
    {
        if ($input && $model)
        {
            $this->validate($input, $model);
        }
    }

    /**
     * Validate the given input for the given model
     * 
     * @param  array $input
     * @param  object $model
     * @return boolean       
     */
    public function validate($input, $model)
    {
        if ($model->id)
        {
            return $this->validateForUpdate($input, $model);
        }

        return $this->validateForCreate($input, $model);
    }

    /**
     * Validate that we can create this user
     *
     * @param  User $user
     * @return bool
     */
    public function validateForCreate($input, $model)
    {
        return $this->validateForType($input, $model, 'create');
    }

    /**
     * Validate that we can update this user
     *
     * @param  User $user
     * @return bool
     */
    public function validateForUpdate($input, $model)
    {
        return $this->validateForType($input, $model, 'update');
    }

    /**
     * Triggers when the validation is successful
     * 
     * @param  array $input
     * @param  object $model
     * @param  object $validator
     * @return boolean
     */
    public function onSuccess($input, $model, $validator, $type)
    {
        return true;
    }

    /**
     * When validation fails what should we do?
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
            $action = $type == 'update' ? action("{$this->controller}@edit", [$model->id]) : action("{$this->controller}@create");
        }
        
        $this->throwValidationException("Given input is invalid!", $input, $validator, $action);
    }

    /**
     * Handles throwing validation exceptions for us
     * 
     * @param  string $reason
     * @param  array  $input
     * @param  object $validator
     * @param  string $action
     * @return void
     */
    protected function throwValidationException($reason, $input, $validator, $action)
    {
        throw new ValidatorException($reason, $input, $validator, $action);
    }

    /**
     * Validates for a given type (update or create)
     * 
     * @param  array $input
     * @param  object $model
     * @param  string $type
     * @return boolean
     */
    protected function validateForType($input, $model, $type)
    {
        $rules = $this->rules($input, $model, $type);

        $validator = $this->validator($input, $rules);

        if ($validator->passes())
        {
            return $this->onSuccess($input, $model, $validator, $type);
        }

        return $this->onFailure($input, $model, $validator, $type);
    }

    /**
     * Create a new validator instance for us
     * 
     * @param  array $input
     * @param  array $rules
     * @param  array $messages
     * @return Validator
     */
    protected function validator($input, $rules, $messages = [])
    {
        return Validator::make($input, $rules, $messages);
    }
}