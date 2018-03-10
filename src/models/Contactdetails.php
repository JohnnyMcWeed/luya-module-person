<?php

namespace johnnymcweed\person\models;

use johnnymcweed\person\admin\Module;
use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Contactdetails.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $person_id
 * @property text $value
 * @property integer $type
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $timestamp_create
 * @property integer $timestamp_update
 * @property tinyint $is_deleted
 */
class Contactdetails extends NgRestModel
{
    const TYPE_EMAIL = 'E-Mail';
    const TYPE_PHONE = 'Phone';
    const TYPE_MOBILE = 'Mobile';
    const TYPE_FACEBOOK = 'Facebook';
    const TYPE_TWITTER = 'Twitter';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_contactdetails';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-person-contactdetails';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => Module::t('Person'),
            'value' => Module::t('Value'),
            'type' => Module::t('Type'),
            'timestamp_create' => Module::t('Timestamp Create'),
            'timestamp_update' => Module::t('Timestamp Update'),
            'is_deleted' => Module::t('Is Deleted'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'type', 'create_user_id', 'update_user_id', 'timestamp_create', 'timestamp_update'], 'integer'],
            [['value'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return ['value'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'person_id' => [
                'selectModel',
                'modelClass' => Person::class,
                'valueField' => 'id',
                'labelField' => function($model) {
                    return $model->first_name . ' ' . $model->last_name;
                }
            ],
            'value' => 'textarea',
            'type' => ['selectArray', 'data' => [
                1 => Module::t(self::TYPE_EMAIL),
                2 => Module::t(self::TYPE_PHONE),
                3 => Module::t(self::TYPE_MOBILE),
                4 => Module::t(self::TYPE_FACEBOOK),
                5 => Module::t(self::TYPE_TWITTER),
            ]],
            'timestamp_create' => 'datetime',
            'timestamp_update' => 'date',
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['person_id', 'value', 'type']],
            [['create', 'update'], ['person_id', 'value', 'type', 'timestamp_create', 'timestamp_update']],
            ['delete', false],
        ];
    }
}