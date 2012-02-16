<?php

class m120216_091605_setup extends CDbMigration
{
	public function up()
	{
        // This table stores the post
        $this->createTable(
            'post',
            array(
                'title' => 'string',
                'body' => 'text',
                'created_at' => 'date',
            )
        );

        // This table stores all the comments
        $this->createTable(
            'comment',
            array(
                'name' => 'string',
                'email' => 'string',
                'comment' => 'text',
                'created_at' => 'date',
            )
        );
	}

	public function down()
	{
        $this->dropTable('comment');
        $this->dropTable('post');
	}

}
