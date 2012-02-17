<?php
class SiteController extends Controller
{

    // Index => Show recent posts
    public function actionIndex()
    {
        // Blank new post model
        $model = new Post;

        // Http post of a new blog post
        $post = Yii::app()->getRequest()->getPost('Post');

        // Get recent 5 posts
        $posts = Post::model()->with('comments')->recent()->findAll();

        // Count for all posts
        $postCount = Post::model()->count();

        // User has submitted the "new blog post" form
        if ($post) {
            // Assign all HTTP post attributes to model. Don't worry!
            $model->attributes = $post;
            // Model will only store the attributes defined in the
            // validation rules.
            // Save automatically validates per default.
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    'success',
                    'Successfully created blog entry'
                );
                // Prevent user from re-submitting
                $this->refresh();
            }
        }

        $this->render(
            'index',
            array(
                'postCount' => $postCount,
                'posts'     => $posts,
                'model'     => $model,
            )
        );
    }

    // Show a blog post
    public function actionShow($id)
    {
        $post = Post::model()->with('comments', 'commentCount')->findByPk($id);

        if (! $post instanceof Post) {
            throw new CHttpException(
                'Post could not be found'
            );
        }

        $this->render('show', array('post' => $post));
    }

}

