<?php

/**
 * This is the model class for table "video".
 *
 * The followings are the available columns in table 'video':
 * @property string $videoID
 * @property integer $nro_avaliacoes
 * @property string $video_tags
 */
class Video extends EMongoDocument
{
    
        public $videoID;
        public $nro_avaliacoes;
        public $video_tags;
    
	/**
	 * @return string the associated database table name
	 */
//	public function tableName()
//	{
//		return 'video';
//	}

        // This method is required!
        public function getCollectionName()
        {
            return 'video';
        }
        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('videoID, nro_avaliacoes, video_tags', 'required'),
			array('nro_avaliacoes', 'numerical', 'integerOnly'=>true),
			array('videoID', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('videoID, nro_avaliacoes, video_tags', 'safe', 'on'=>'search'),
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
			'videoID' => 'Video',
			'nro_avaliacoes' => 'Nro Avaliacoes',
			'video_tags' => 'Video Tags',
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
//	public function search()
//	{
//		// @todo Please modify the following code to remove attributes that should not be searched.
//
//		$criteria=new CDbCriteria;
//
//		$criteria->compare('videoID',$this->videoID,true);
//		$criteria->compare('nro_avaliacoes',$this->nro_avaliacoes);
//		$criteria->compare('video_tags',$this->video_tags,true);
//
//		return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,
//		));
//	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
