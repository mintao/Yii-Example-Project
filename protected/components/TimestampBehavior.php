<?php
class TimestampBehavior extends CActiveRecordBehavior
{
    public $createColumnName = 'created';

    public function beforeSave(CModelEvent $event)
    {
        $model = $event->sender;
        if ($model->isNewRecord) {
            $model->{$this->createColumnName} = time();
        }
        return parent::beforeSave($event);
    }
}
?>
