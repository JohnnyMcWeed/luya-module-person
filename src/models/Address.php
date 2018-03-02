<?php

namespace johnnymcweed\person\models;

use johnnymcweed\person\admin\Module;
use johnnymcweed\place\models\Place;
use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Address.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property integer $person_id
 * @property integer $place_id
 * @property integer $type
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $timestamp_create
 * @property integer $timestamp_update
 * @property tinyint $is_deleted
 */
class Address extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public $i18n = [''];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_address';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-person-address';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'person_id' => Module::t('Person'),
            'place_id' => Module::t('Place'),
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
            [['person_id', 'place_id', 'type', 'timestamp_create', 'timestamp_update'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return [''];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'person_id' => ['selectModel', 'modelClass' => Person::class, 'valueField' => 'id', 'labelField' => 'title'],
            'place_id' => ['selectModel', 'modelClass' => Place::class, 'valueField' => 'id', 'labelField' => 'title'],
            'type' => 'number', // TODO: Select array
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
            ['list', ['person_id', 'place_id', 'type']],
            [['create', 'update'], ['person_id', 'place_id', 'type', 'timestamp_create', 'timestamp_update']],
            ['delete', false],
        ];
    }
}