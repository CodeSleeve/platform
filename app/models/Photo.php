<?php

class Photo extends Eloquent 
{
	use Codesleeve\Stapler\StaplerTrait;

    /**
	 * __construct method
	 * 
	 * @param array   $attributes - An array of attributes to initialize the model with
	 * @param boolean $exists     - Boolean flag to indicate if the model exists or not
	 */
	public function __construct($attributes = array(), $exists = false){
        parent::__construct($attributes, $exists);

        $this->hasAttachedFile('photo', [
            'styles' => [
                'thumbnail' => '100x100#'
            ],
            'default_url' => '/img/:class/missing.jpg'
        ]);
    }
}