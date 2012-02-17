<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <?php
      echo CHtml::link(
          CHtml::encode(Yii::app()->name),
          array('site/index'),
          array('class' => 'brand')
      ) ?>
      <div class="nav-collapse">

<?php
$this->widget(
    'zii.widgets.CMenu',
    array(
        'htmlOptions' => array(
            'class' => 'nav'
        ),
        'items' => array(
            array(
                'url' => array('site/index'),
                'label' => 'Home',
            ),
            //array(
                //'url' => array('site/contact'),
                //'label' => 'Contact',
            //),
            //array(
                //'url' => array('site/page', 'view' => 'about'),
                //'label' => 'About',
            //),
        ),
    )
)
?>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

