<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property string $name
 * @property string $email
 * @property string $comment
 * @property string $created_at
 */
class Comment extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return Comment the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'comment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, email', 'length', 'max'=>255),
            array('comment, created_at', 'safe'),
            array('post_id', 'exist', 'className' => 'Post', 'attributeName' => 'id'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('post_id, name, email, comment, created_at', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            'post' => array(self::BELONGS_TO, 'Post', 'id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'name'       => 'Name',
            'email'      => 'Email',
            'comment'    => 'Comment',
            'created_at' => 'Created At',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('name',$this->name,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('comment',$this->comment,true);
        $criteria->compare('created_at',$this->created_at,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function behaviors()
    {
        return array(
            'Timestamp' => array(
                'class' => 'application.components.TimestampBehavior',
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
}
