<?php

use yii\db\Migration;

/**
 * Class m180301_210255_person_basetables
 */
class m180301_210255_person_basetables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('person_cat', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'text' => $this->text()
        ]);

        $this->createTable('person_person', [
            'id' => $this->primaryKey(),
            'cat_id' => $this->integer(),
            'first_name' => $this->text(),
            'last_name' => $this->text(),
            'birthday' => $this->integer(),
            'image_id' => $this->integer(11)->defaultValue(0),
            'image_list' => $this->text(),
            'file_list' => $this->text(),
            'create_user_id' => $this->integer(11)->defaultValue(0),
            'update_user_id' => $this->integer(11)->defaultValue(0),
            'timestamp_create' => $this->integer(11)->defaultValue(0),
            'timestamp_update' => $this->integer(11)->defaultValue(0),
            'is_deleted' => $this->boolean()->defaultValue(false),
        ]);

        $this->createTable('person_address', [
            'id' => $this->primaryKey(),
            'person_id' => $this->integer(),
            'place_id' => $this->integer(),
            'type' => $this->integer(),
            'create_user_id' => $this->integer(11)->defaultValue(0),
            'update_user_id' => $this->integer(11)->defaultValue(0),
            'timestamp_create' => $this->integer(11)->defaultValue(0),
            'timestamp_update' => $this->integer(11)->defaultValue(0),
            'is_deleted' => $this->boolean()->defaultValue(false),
        ]);

        $this->createTable('person_contactdetails', [
            'id' => $this->primaryKey(),
            'person_id' => $this->integer(),
            'value' => $this->text(),
            'type' => $this->integer(),
            'create_user_id' => $this->integer(11)->defaultValue(0),
            'update_user_id' => $this->integer(11)->defaultValue(0),
            'timestamp_create' => $this->integer(11)->defaultValue(0),
            'timestamp_update' => $this->integer(11)->defaultValue(0),
            'is_deleted' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('person_contactdetails');
        $this->dropTable('person_address');
        $this->dropTable('person_person');
        $this->dropTable('person_cat');
    }
}
