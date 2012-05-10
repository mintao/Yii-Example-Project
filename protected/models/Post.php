<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property string $created_at
 */
class Post extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return Post the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'post';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, body', 'required'),
            array('title', 'length', 'max'=>255),
            array('body, created_at', 'safe'),
            array('title, body, created_at', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'comments'     => array(self::HAS_MANY, 'Comment', 'post_id'),
            'commentCount' => array(self::STAT, 'Comment', 'post_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'title'      => 'Title',
            'body'       => 'Your blog post',
            'created_at' => 'Created At',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        $criteria=new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('body', $this->body ,true);
        $criteria->compare('created_at', $this->created_at, true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function behaviors()
    {
        return array(
            'Timestamp'            => array(
                'class'            => 'application.components.TimestampBehavior',
                'createColumnName' => 'created_at',
            )
        );
    }

    public function defaultScope()
    {
        return array(
            'order' => $this->getTableAlias(false, false) . '.created_at DESC',
        );
    }

    public function scopes()
    {
        return array(
            'recent' => array(
                'limit' => 3,
            )
        );
    }
}

