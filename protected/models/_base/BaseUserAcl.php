<?php

/**
 * This is the model base class for the table "UserAcl".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserAcl".
 *
 * Columns in table "UserAcl" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $accountID
 * @property string $userID
 * @property string $aclID
 * @property integer $accessLevel
 * @property string $description
 * @property string $lastUpdateTime
 * @property string $creationTime
 *
 */
abstract class BaseUserAcl extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'UserAcl';
    }

    public static function representingColumn() {
        return 'accountID';
    }

    public function rules() {
        return array(
            array('accountID, userID, aclID', 'required'),
            array('accessLevel', 'numerical', 'integerOnly'=>true),
            array('accountID, userID', 'length', 'max'=>32),
            array('aclID', 'length', 'max'=>64),
            array('description', 'length', 'max'=>128),
            array('lastUpdateTime, creationTime', 'length', 'max'=>10),
            array('accessLevel, description, lastUpdateTime, creationTime', 'default', 'setOnEmpty' => true, 'value' => null),
            array('accountID, userID, aclID, accessLevel, description, lastUpdateTime, creationTime', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'accountID' => Yii::t('app', 'Account'),
                'userID' => Yii::t('app', 'User'),
                'aclID' => Yii::t('app', 'Acl'),
                'accessLevel' => Yii::t('app', 'Access Level'),
                'description' => Yii::t('app', 'Description'),
                'lastUpdateTime' => Yii::t('app', 'Last Update Time'),
                'creationTime' => Yii::t('app', 'Creation Time'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('accountID', $this->accountID, true);
        $criteria->compare('userID', $this->userID, true);
        $criteria->compare('aclID', $this->aclID, true);
        $criteria->compare('accessLevel', $this->accessLevel);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('lastUpdateTime', $this->lastUpdateTime, true);
        $criteria->compare('creationTime', $this->creationTime, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}