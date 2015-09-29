<?php

/**
 * This is the model class for table "avaliacao".
 *
 * The followings are the available columns in table 'avaliacao':
 * @property string $avaliacaoID
 * @property string $videoID
 * @property string $email_user
 * @property string $tags_suggested
 * @property string $tags_random
 * @property string $tags_selected
 */
class Avaliacao extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'avaliacao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('videoID, email_user, tags_suggested, tags_random, tags_selected', 'required'),
			array('videoID', 'length', 'max'=>30),
			array('email_user', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('avaliacaoID, videoID, email_user, tags_suggested, tags_random, tags_selected', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'avaliacaoID' => 'Avaliacao',
			'videoID' => 'Video',
			'email_user' => 'Email User',
			'tags_suggested' => 'Tags Suggested',
			'tags_random' => 'Tags Random',
			'tags_selected' => 'Tags Selected',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('avaliacaoID',$this->avaliacaoID,true);
		$criteria->compare('videoID',$this->videoID,true);
		$criteria->compare('email_user',$this->email_user,true);
		$criteria->compare('tags_suggested',$this->tags_suggested,true);
		$criteria->compare('tags_random',$this->tags_random,true);
		$criteria->compare('tags_selected',$this->tags_selected,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Avaliacao the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
