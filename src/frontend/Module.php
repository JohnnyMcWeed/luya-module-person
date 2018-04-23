<?php

namespace johnnymcweed\person\frontend;

/**
 * Person Admin Module.
 *
 * File has been created with `module/create` command. 
 * 
 * @author
 * @since 1.0.0
 */
class Module extends \luya\base\Module
{
    /**
     * If true, views will be looked up in the @app/views folder.
     * @var bool
     */
    public $useAppViewPath = true;

    /**
     * @var array
     */
    public $urlRules = [
        ['pattern' => 'person/', 'route' => 'person/default/people'],
        ['pattern' => 'person/<id:\d+>/', 'route' => 'person/default/person'],
    ];
}