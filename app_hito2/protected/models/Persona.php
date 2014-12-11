<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $estudiante
 * @property string $sexo
 * @property string $color
 */
class Persona extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona';
	}

    public function behaviors()
    {
        return array(
            'renderModel' => array('class' => '\rest\model\Behavior')
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('id, nombre, apellido, email, estudiante, sexo, color', 'safe', 'on'=>'render'),
			array('nombre, apellido, email, estudiante, sexo, color', 'required'),
			array('nombre, apellido, color, estudiante', 'length', 'max'=>20),
			array('email', 'length', 'max'=>30),
			array('sexo', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido, email, estudiante, sexo, color', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'email' => 'Email',
			'estudiante' => 'Estudiante',
			'sexo' => 'Sexo',
			'color' => 'Color',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('estudiante',$this->estudiante, true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('color',$this->color,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Persona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
