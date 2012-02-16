<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<h2>Previous posts</h2>
<?php
foreach ($posts as $post) {
    $this->renderPartial('_post', array('post' => $post));
}
?>

<h2>Your post</h2>
<?php
$form = $this->beginWidget(
    'CActiveForm',
    array(
        'htmlOptions' => array(
            'class' => 'well',
        ),
        'errorMessageCssClass' => 'error',
    )
);
?>

<?php echo $form->errorSummary($model) ?>

<div>
    <?php
    echo $form->labelEx($model, 'title');
    echo $form->textField($model, 'title');
    ?>
</div>

<div>
    <?php
    echo $form->labelEx($model, 'body');
    echo $form->textArea($model, 'body');
    ?>
</div>

<div>
    <?php
    echo CHtml::resetButton(
        'Cancel',
        array('class' => 'btn')
    );
    ?>
    <?php
    echo CHtml::submitButton(
        'Save your post',
        array('class' => 'btn btn-primary')
    );
    ?>
</div>

<?php $this->endWidget() ?>
