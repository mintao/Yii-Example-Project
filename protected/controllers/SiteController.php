<?php
class SiteController extends Controller
{

    public function actions()
    {
        return array(
            // Static pages
            'page'=>array(
                'class' => 'CViewAction',
            ),
        );
    }

    // Index
    public function actionIndex()
    {
        $model = new Post;
        $post  = Yii::app()->getRequest()->getPost('Post');
        $posts = Post::model()->with('comments')->recent()->findAll();

        if ($post) {
            $model->attributes = $post;
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    'success',
                    'Successfully created blog entry'
                );
                // Prevent re-submitting
                $this->refresh();
            }
        }

        $this->render(
            'index',
            array(
                'posts' => $posts,
                'model' => $model,
            )
        );
    }

    // Contact request
    public function actionContact()
    {
        $form = new ContactForm;
        $post = Yii::app()->getRequest()->getPost('ContactForm');

        if ($post) {
            $form->attributes = $post;
            if ($form->validate()) {
                Yii::app()->user->setFlash(
                    'success',
                    'We will send out an email ... NOT'
                );
            }
        }

        $this->render('contact', array('model' => $form));
    }
}

