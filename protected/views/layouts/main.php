<?php
Yii::app()->clientScript
    ->registerCssFile('css/bootstrap.css')
    ->registerCssFile('bootstrap-responsive.css')
    ->registerScriptFile('js/bootstrap-transition.js', CClientScript::POS_END)
    ->registerScriptFile('js/bootstrap-alert.js', CClientScript::POS_END)
    ->registerScriptFile('js/bootstrap-modal.js', CClientScript::POS_END)
    ->registerScriptFile('js/bootstrap-dropdown.js', CClientScript::POS_END)
    ->registerScriptFile('js/bootstrap-scrollspy.js', CClientScript::POS_END)
    ->registerScriptFile('js/bootstrap-tab.js', CClientScript::POS_END)
    ->registerScriptFile('js/bootstrap-tooltip.js', CClientScript::POS_END)
    ->registerScriptFile('js/bootstrap-popover.js', CClientScript::POS_END)
    ->registerScriptFile('js/bootstrap-button.js', CClientScript::POS_END)
    ->registerScriptFile('js/bootstrap-collapse.js', CClientScript::POS_END)
    ->registerScriptFile('js/bootstrap-carousel.js', CClientScript::POS_END)
    ->registerScriptFile('js/bootstrap-typeahead.js', CClientScript::POS_END)
    ;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="<?php echo Yii::app()->request->hostInfo . Yii::app()->baseUrl ?>/">
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle . ' | ' . Yii::app()->name) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>
    <?php  echo $this->renderPartial('//layouts/_topnav') ?>
    <div class="container">
        <?php if (! empty($this->breadcrumbs)) : ?>
            <div class="breadcrumb">
            <?php $this->widget(
                'zii.widgets.CBreadcrumbs',
                array(
                    'links' => $this->breadcrumbs
                )
            ); ?>
            </div>
        <?php endif ?>
        <?php echo $this->renderPartial('//layouts/_infobar') ?>
        <?php echo $content ?>
    </div>
  </body>
</html>

