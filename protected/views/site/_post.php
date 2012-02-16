<div class='well'>
    <h3>
        <?php echo CHtml::encode($post->title) ?>
    </h3>
    <p class='muted pull-right'>
        <?php echo date('d.m.Y H:i:s', $post->created_at) ?>
    </p>
    <?php $this->beginWidget('CHtmlPurifier'); ?>
    <?php echo $post->body ?>
    <?php $this->endWidget() ?>

    <?php if (0 === count($post->comments)) : ?>
        <p>No recent comments. Be the first one!</p>
    <?php  else : ?>
        <hr>
        <?php $this->renderPartial(
            '_comments',
            array('comments' => $post->comments)
        ); ?>
    <?php endif ?>
</div>
