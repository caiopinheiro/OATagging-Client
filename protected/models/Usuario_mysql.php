<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $email_user
 * @property string $faixa_etaria
 * @property string $nivel_esc
 * @property string $conhec_area
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email_user, nome, senha, faixa_etaria, nivel_esc, conhec_area', 'required'),
			array('email_user', 'length', 'max'=>50),
			array('nome', 'length', 'max'=>100),
			array('senha', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('email_user, nome, faixa_etaria, nivel_esc, conhec_area', 'safe', 'on'=>'search'),
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
			'nome' => 'Nome Completo',
			'email_user' => 'Email',
                        'senha' => 'Senha',
			'faixa_etaria' => 'Faixa Etaria',
			'nivel_esc' => 'Nivel Esc',
			'conhec_area' => 'Conhec Area',
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

		$criteria->compare('email_user',$this->email_user,true);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('faixa_etaria',$this->faixa_etaria,true);
		$criteria->compare('nivel_esc',$this->nivel_esc,true);
		$criteria->compare('conhec_area',$this->conhec_area,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
