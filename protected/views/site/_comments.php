<h4>Comments</h4>

<ol>
<?php foreach ($comments as $comment) : ?>

<li>
    <?php echo CHtml::link(
        CHtml::encode($comment->name),
        'mailto:' . $comment->email
    ); ?>:
    <?php echo CHtml::encode($comment->comment) ?>
</li>




<?php endforeach ?>
</ol>
