<div class='well'>

    <h3><?php echo CHtml::encode($post->title) ?></h3>

    <?php $this->beginWidget('CHtmlPurifier'); ?>
    <?php echo mb_substr($post->body, 0, 250, Yii::app()->charset) ?>
    <p>
        <?php echo CHtml::link(
            'Read the full post',
            array('site/show', 'id' => $post->id)
        ) ?>
    </p>
    <?php $this->endWidget() ?>

    <hr>

    <p class="muted pull-left">
        <?php echo count($post->comments) . ' comments' ?>
    </p>
    <p class='muted pull-right'>
        <?php echo date('d.m.Y H:i:s', $post->created_at) ?>
    </p>

</div>
