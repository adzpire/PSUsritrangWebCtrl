<?php

use yii\db\Migration;

class  m210215_070426_create_control_history extends Migration
{
    public function safeUp()
    {
		$this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull(),
            'auth_key' => $this->string(255)->defaultValue(NULL),
            'password_hash' => $this->string(255)->defaultValue(NULL),
            'password_reset_token' => $this->string(255)->defaultValue(NULL),
            'email' => $this->string(255)->notNull(),
            'status' => $this->integer()->defaultValue(10),
            'created_at' => $this->integer()->defaultValue(0),
            'updated_at' => $this->integer()->defaultValue(0),
        ]);		
		
		$this->createTable('control_history', [
            'id' => $this->primaryKey(),
            'zone' => $this->string(255),
            'pclist' => $this->text(),
            'operation' => $this->string(255),
            'created_by' => $this->integer()->notNull()->defaultValue(1),
            'updated_by' => $this->integer()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
        ]);
		
		$this->addForeignKey(
            'fk1-user-control',
            'control_history',
            'created_by',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
		$this->addForeignKey(
            'fk2-user-control',
            'control_history',
            'updated_by',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );
		
		$this->insert('user', [
            'username' => 'abdul-aziz.d',
            'email' => 'abdul-aziz.d@psu.ac.th',
        ]);
		
		$this->insert('control_history', [
            'zone' => 'zone2',
            'pclist' => '192.168.136.333,192.168.136.444',
            'operation' => 'Restart(windows)',
            'created_by' => 1,
            'updated_by' => 1,
        ]);		
    }

    public function safeDown()
    {
        echo "m210215_070426_create_control_history cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    /*public function up()
    {
		$this->createTable('user1', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull(),
            'auth_key' => $this->string(255),
            'password_hash' => $this->string(255),
            'password_reset_token' => $this->string(255),
            'email' => $this->string(255)->notNull(),
            'status' => $this->integer()->defaultValue(10),
            'created_at' => $this->integer()->defaultValue(0),
            'updated_at' => $this->integer()->defaultValue(0),
        ]);		
		
		$this->createTable('control_history1', [
            'id' => $this->primaryKey(),
            'zone' => $this->string(255),
            'pclist' => $this->text(),
            'operation' => $this->string(255),
            'created_by' => $this->integer()->notNull()->defaultValue(1),
            'updated_by' => $this->integer()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
        ]);
		
		$this->addForeignKey(
            'fk1',
            'control_history1',
            'created_by',
            'user',
            'id',
            'CASCADE'
        );
		$this->addForeignKey(
            'fk2',
            'control_history1',
            'updated_by',
            'user',
            'id',
            'CASCADE'
        );
		
		$this->insert('user1', [
            'username' => 'abdul-aziz.d',
            'email' => 'abdul-aziz.d@psu.ac.th',
        ]);
		
		$this->insert('control_history1', [
            'zone' => 'zone2',
            'pclist' => '192.168.136.333,192.168.136.444',
            'operation' => 'Restart(windows)',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
		
    }

    public function down()
    {
        echo "m210215_070426_create_control_history cannot be reverted.\n";

        return false;
    }
    */
}
