<?php

class m120216_105631_prefill extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
        $postPks = array();

        for ($i = 0; $i <= 3; $i++) {
            $post = new Post;
            $post->title = 'Demo blog post title number ' . $i;
            $post->body = 'Lorem ipsum dolor sit amet, consectetur adipiscing'
               . ' elit. Donec a diam lectus. Sed sit amet ipsum mauris.'
               . ' Maecenas congue ligula ac quam viverra nec consectetur '
               . 'ante hendrerit. Donec et mollis dolor. Praesent et diam eget'
               . ' libero egestas mattis sit amet vitae augue. Nam tincidunt'
              . ' congue enim, ut porta lorem lacinia consectetur.';
            $post->save();
            $postPks[] = $post->id;
        }

        foreach($postPks as $pk) {
            for ($i = 0; $i <= rand(0, 4); $i++) {
                $comment = new Comment;
                $comment->attributes = array(
                    'post_id' => $pk,
                    'name'    => 'Florian Fackler',
                    'email'   => 'florian.fackler@mayflower.de',
                   'comment' => 'This is a really great post ' .md5($i.time()),
                );
                $comment->save();
            }
        }
    }

	public function safeDown()
	{
        $this->truncateTable('comment');
        $this->truncateTable('post');
	}
}
