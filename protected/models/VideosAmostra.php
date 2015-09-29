<?php

/**
 * This is the model class for table "videos_amostra".
 *
 * The followings are the available columns in table 'videos_amostra':
 * @property string $idVideo
 * @property integer $nro_avaliacoes
 * @property string $tags
 * @property integer $num_video
 */
class VideosAmostra extends EMongoDocument
{
    
    public $idVideo;
    public $nro_avaliacoes;
    public $tags;
    public $num_video;
        
	/**
	 * @return string the associated database table name
	 */
//	public function tableName()
//	{
//		return 'videos_amostra';
//	}

	/**
	 * @return array validation rules for model attributes.
	 */
    
         // This method is required!
        public function getCollectionName()
        {
            return 'videos_amostra';
        }
    
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idVideo, tags, nro_avaliacoes, num_video', 'required'),
			array('nro_avaliacoes', 'numerical', 'integerOnly'=>true),
			array('idVideo', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idVideo, nro_avaliacoes, tags, num_video', 'safe', 'on'=>'search'),
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
			'idVideo' => 'Id Video',
			'nro_avaliacoes' => 'Nro Avaliacoes',
			'tags' => 'Tags',
			'num_video' => 'Num Video',
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
//		$criteria->compare('idVideo',$this->idVideo,true);
//		$criteria->compare('nro_avaliacoes',$this->nro_avaliacoes);
//		$criteria->compare('tags',$this->tags,true);
//		$criteria->compare('num_video',$this->num_video);
//
//		return new CActiveDataProvider($this, array(
//			'criteria'=>$criteria,
//		));
//	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VideosAmostra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
