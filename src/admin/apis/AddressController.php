<?php

namespace johnnymcweed\person\admin\apis;

/**
 * Address Controller.
 * 
 * File has been created with `crud/create` command. 
 */
class AddressController extends \luya\admin\ngrest\base\Api
{
    /**
     * @var string The path to the model which is the provider for the rules and fields.
     */
    public $modelClass = 'johnnymcweed\person\models\Address';
}