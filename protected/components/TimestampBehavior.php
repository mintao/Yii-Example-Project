<?php
class TimestampBehavior extends CActiveRecordBehavior
{
    public $createColumnName = 'created';
    public $updateColumnName = 'updates';

    /**
     * @var boolean Also set a timestamp for update column if record is created
     */
    public $setUpdateOnCreate = false;

    public function beforeSave(CModelEvent $event)
    {
        $model = $event->sender;
        if (true === $model->isNewRecord) {
            $model->{$this->createColumnName} = time();
        }
        $model->{$this->updateColumnName} = time();
        if (false === $this->setUpdateOnCreate && true === $model->isNewRecord) {
            $model->{$this->updateColumnName} = null;
        }
        return parent::beforeSave($event);
    }
}

