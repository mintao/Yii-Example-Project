<h4>Comments</h4>

<?php if (0 === count($comments)) : ?>
    <p>No recent comments. Be the first one!</p>
<?php else : ?>
<ol>
<?php foreach ($comments as $comment) : ?>

<li>
    <?php echo CHtml::link(
        CHtml::encode($comment->name),
        'mailto:' . $comment->email
    ); ?>
    <?php echo date('d.m.Y H:i', $comment->created_at) ?>:
    <?php echo CHtml::encode($comment->comment) ?>
</li>

<?php endforeach ?>
</ol>
<?php endif ?>
