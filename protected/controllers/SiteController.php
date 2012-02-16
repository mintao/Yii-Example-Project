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
        $post  = Yii::app()->getRequest()->getPost('Post');
        $posts = Post::model()->findAll();
        $model = new Post;

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

            }
        }

        $this->render('contact', array('model' => $form));
    }
}

