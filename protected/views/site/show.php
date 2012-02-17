<?php
$this->pageTitle = $post->title;
$this->breadcrumbs = array(
    $this->pageTitle,
)
?>
<hgroup class="page-header">
    <h1><?php echo CHtml::encode($post->title) ?>
    <span class="pull-right"><?php
    echo date('d.m.Y', $post->created_at)
    ?></span>
    </h1>
</hgroup>

<?php $this->beginWidget('CHtmlPurifier'); ?>
<?php echo nl2br($post->body) ?>
<?php $this->endWidget() ?>

<?php echo $post->commentCount ?>

<hr>

<?php $this->renderPartial('_comments', array('comments' => $post->comments)); ?>
