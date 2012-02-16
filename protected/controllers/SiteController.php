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
        $this->render('index');
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

