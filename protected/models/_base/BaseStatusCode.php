<?php

/**
 * This is the model base class for the table "StatusCode".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "StatusCode".
 *
 * Columns in table "StatusCode" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $accountID
 * @property string $deviceID
 * @property string $statusCode
 * @property string $statusName
 * @property string $foregroundColor
 * @property string $backgroundColor
 * @property string $iconSelector
 * @property string $iconName
 * @property string $description
 * @property string $lastUpdateTime
 * @property string $creationTime
 *
 */
abstract class BaseStatusCode extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'StatusCode';
    }

    public static function representingColumn() {
        return 'accountID';
    }

    public function rules() {
        return array(
            array('accountID, deviceID, statusCode', 'required'),
            array('accountID, deviceID', 'length', 'max'=>32),
            array('statusCode, foregroundColor, backgroundColor, lastUpdateTime, creationTime', 'length', 'max'=>10),
            array('statusName', 'length', 'max'=>18),
            array('iconSelector, description', 'length', 'max'=>128),
            array('iconName', 'length', 'max'=>24),
            array('statusName, foregroundColor, backgroundColor, iconSelector, iconName, description, lastUpdateTime, creationTime', 'default', 'setOnEmpty' => true, 'value' => null),
            array('accountID, deviceID, statusCode, statusName, foregroundColor, backgroundColor, iconSelector, iconName, description, lastUpdateTime, creationTime', 'safe', 'on'=>'search'),
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
                'deviceID' => Yii::t('app', 'Device'),
                'statusCode' => Yii::t('app', 'Status Code'),
                'statusName' => Yii::t('app', 'Status Name'),
                'foregroundColor' => Yii::t('app', 'Foreground Color'),
                'backgroundColor' => Yii::t('app', 'Background Color'),
                'iconSelector' => Yii::t('app', 'Icon Selector'),
                'iconName' => Yii::t('app', 'Icon Name'),
                'description' => Yii::t('app', 'Description'),
                'lastUpdateTime' => Yii::t('app', 'Last Update Time'),
                'creationTime' => Yii::t('app', 'Creation Time'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('accountID', $this->accountID, true);
        $criteria->compare('deviceID', $this->deviceID, true);
        $criteria->compare('statusCode', $this->statusCode, true);
        $criteria->compare('statusName', $this->statusName, true);
        $criteria->compare('foregroundColor', $this->foregroundColor, true);
        $criteria->compare('backgroundColor', $this->backgroundColor, true);
        $criteria->compare('iconSelector', $this->iconSelector, true);
        $criteria->compare('iconName', $this->iconName, true);
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