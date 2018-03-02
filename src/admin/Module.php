<?php

namespace johnnymcweed\person\admin;

/**
 * Person Admin Module.
 *
 * File has been created with `module/create` command. 
 * 
 * @author
 * @since 1.0.0
 */
class Module extends \luya\admin\base\Module
{
    public $apis = [
        'api-person-cat' => 'johnnymcweed\person\admin\apis\CatController',
        'api-person-person' => 'johnnymcweed\person\admin\apis\PersonController',
        'api-person-address' => 'johnnymcweed\person\admin\apis\AddressController',
        'api-person-contactdetails' => 'johnnymcweed\person\admin\apis\ContactdetailsController',
    ];

    public function getMenu()
    {
        return (new \luya\admin\components\AdminMenuBuilder($this))
            ->node(self::t('Person'), 'perm_identity')
            ->group(self::t('Group'))
            ->itemApi(self::t('Category'), 'personadmin/cat/index', 'supervisor_account', 'api-person-cat')
            ->itemApi(self::t('Person'), 'personadmin/person/index', 'perm_identity', 'api-person-person')
            ->itemApi(self::t('Address'), 'personadmin/address/index', 'chrome_reader_mode', 'api-person-address')
            ->itemApi(self::t('Contact Details'), 'personadmin/contactdetails/index', 'phone', 'api-person-contactdetails');
    }

    public static function onLoad()
    {
        self::registerTranslation('personadmin', '@personadmin/messages', [
            'personadmin' => 'personadmin.php',
        ]);
    }

    /**
     * Translat news messages.
     *
     * @param string $message
     * @param array $params
     * @return string
     */
    public static function t($message, array $params = [])
    {
        return parent::baseT('personadmin', $message, $params);
    }
}