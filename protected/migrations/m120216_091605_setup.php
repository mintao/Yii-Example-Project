<?php

class m120216_091605_setup extends CDbMigration
{
	public function up()
	{
        // This table stores the post
        $this->createTable(
            'post',
            array(
                'id'         => 'pk',
                'title'      => 'string',
                'body'       => 'text',
                'created_at' => 'timestamp',
            )
        );

        // This table stores all the comments
        $this->createTable(
            'comment',
            array(
                'id'         => 'pk',
                'post_id'    => 'int',
                'name'       => 'string',
                'email'      => 'string',
                'comment'    => 'text',
                'created_at' => 'timestamp',
            )
        );
	}

	public function down()
	{
        $this->dropTable('comment');
        $this->dropTable('post');
	}

}
