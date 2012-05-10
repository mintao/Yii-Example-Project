<?php
class TimestampBehavior extends CActiveRecordBehavior
{
    public $createColumnName = 'created';

    public function beforeSave(CModelEvent $event)
    {
        $model = $event->sender;
            $model->{$this->createColumnName} = time();
        }
        return parent::beforeSave($event);
    }
}

