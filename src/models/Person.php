<?php

namespace johnnymcweed\person\models;

use johnnymcweed\person\admin\Module;
use luya\admin\ngrest\plugins\CheckboxRelationActiveQuery;
use Yii;
use luya\admin\ngrest\base\NgRestModel;

/**
 * Person.
 * 
 * File has been created with `crud/create` command. 
 *
 * @property integer $id
 * @property text $first_name
 * @property text $last_name
 * @property integer $birthday
 * @property integer $image_id
 * @property text $image_list
 * @property text $file_list
 * @property integer $create_user_id
 * @property integer $update_user_id
 * @property integer $timestamp_create
 * @property integer $timestamp_update
 * @property tinyint $is_deleted
 */
class Person extends NgRestModel
{
    public $addresses = [];
    public $contactdetails = [];

    /**
     * @inheritdoc
     */
    public $i18n = ['first_name', 'last_name', 'image_list', 'file_list'];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person_person';
    }

    /**
     * @inheritdoc
     */
    public static function ngRestApiEndpoint()
    {
        return 'api-person-person';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name' => Module::t('First Name'),
            'last_name' => Module::t('Last Name'),
            'cat_id' => Module::t('Category'),
            'birthday' => Module::t('Birthday'),
            'image_id' => Module::t('Image'),
            'image_list' => Module::t('Images'),
            'file_list' => Module::t('Files'),
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
            [['first_name', 'last_name', 'image_list', 'file_list'], 'string'],
            [['birthday', 'timestamp_create', 'timestamp_update', 'cat_id'], 'integer'],
            [['image_id', 'addresses', 'contactdetails'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function genericSearchFields()
    {
        return ['first_name', 'last_name', 'image_list', 'file_list'];
    }

    /**
     * @inheritdoc
     */
    public function ngRestAttributeTypes()
    {
        return [
            'first_name' => 'text',
            'last_name' => 'text',
            'cat_id' => [
                'selectModel',
                'modelClass' => Cat::class,
                'valueField' => 'id',
                'labelField' => 'title'],
            'birthday' => 'date',
            'image_id' => 'image',
            'image_list' => 'imageArray',
            'file_list' => 'fileArray',
            'timestamp_create' => 'datetime',
            'timestamp_update' => 'date',
        ];
    }

    public function ngRestAttributeGroups()
    {
        return [
            [['timestamp_create', 'timestamp_update'], Module::t('Time'), 'collapsed' => true],
            [['image_id', 'image_list', 'file_list'], Module::t('Media'), 'collapsed' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function ngRestScopes()
    {
        return [
            ['list', ['first_name', 'last_name']], // TODO: Add place (street/city)
            [['create', 'update'], ['first_name', 'last_name', 'birthday', 'image_id', 'image_list', 'file_list', 'timestamp_create', 'timestamp_update',]],
            ['delete', false],
        ];
    }

    /**
     * Get the person's main image
     *
     * @return bool|\luya\admin\image\Item
     */
    public function getImage()
    {
        return Yii::$app->storage->getImage($this->image_id);
    }

    /**
     * Get the person's addresses
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::class, ['id' => 'person_id']);
    }

    /**
     * Get the person's contact details
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContactdetails()
    {
        return $this->hasMany(Contactdetails::class, ['id' => 'person_id']);
    }
}