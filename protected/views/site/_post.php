<div class='well'>
    <h4><?php echo CHtml::encode($post->title) ?></h4>
    <?php $this->beginWidget('CHtmlPurifier'); ?>
    <?php echo $post->body ?>
    <?php $this->endWidget() ?>
</div>
