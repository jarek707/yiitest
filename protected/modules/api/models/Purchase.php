<?php

/**
 * This is the model class for table "purchase".
 *
 * The followings are the available columns in table 'purchase':
 * @property string $id
 * @property string $card_number
 * @property string $validation_code
 * @property string $expiry_date
 * @property string $createDate
 * @property double $amount
 * @property integer $merchant_id
 * @property integer $customer_id
 */
class Purchase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Purchase the static model class
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
		return 'purchase';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('merchant_id, customer_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('card_number', 'length', 'max'=>16),
			array('validation_code', 'length', 'max'=>3),
			array('expiry_date', 'length', 'max'=>5),
			array('createDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, card_number, validation_code, expiry_date, createDate, amount, merchant_id, customer_id', 'safe', 'on'=>'search'),
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
			'customer' => [ self::BELONGS_TO, 'Customer','customer_id' ],
			'merchant' => [ self::BELONGS_TO, 'Merchant','merchant_id' ]
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'card_number' => 'Card Number',
			'validation_code' => 'Validation Code',
			'expiry_date' => 'Expiry Date',
			'createDate' => 'Create Date',
			'amount' => 'Amount',
			'merchant_id' => 'Merchant',
			'customer_id' => 'Customer',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('card_number',$this->card_number,true);
		$criteria->compare('validation_code',$this->validation_code,true);
		$criteria->compare('expiry_date',$this->expiry_date,true);
		$criteria->compare('createDate',$this->createDate,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('merchant_id',$this->merchant_id);
		$criteria->compare('customer_id',$this->customer_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function set( $params, $isNewRecord = true ) {

		if ( $isNewRecord ) {
			$params['createDate'] = (new \DateTime())->format('Y-m-d H:i:s');
		} else {
			if  ( isset( $params['id'] ) ) {
				$this->findByPk($params['id']);
			} else {
				throw new \Exception('Id is required for update.');
			}
		}

		extract( $params );

		foreach ( $this->attributeLabels() as $key => $dummy )
			if ( isset( $$key ) )  $this->$key= $$key;

		$this->setIsNewRecord( $isNewRecord );

		if ( !$this->save() ) 
			throw new \Exception('Save/Update failed.');

		return $this->id;
	}

	public function find( $id ) {
		$res = $this->with('customer')->findByPk( $id );
		return $this->export( $res, true );
	}

	public function defaultScope() {
		return [
			'condition' => ''
		];
	}

	public function all( $id ) {
		$res = $this->findAll();
		$retA = [];
		foreach ( $res as $row ) {
			$retA[] = $this->export( $row, true );	
		}

		return $retA;
	}

	public function export( $row, $includeRelations=false ) {
		$retA = $merged = [];

		foreach ( $this->attributeLabels() as $key => $dummy )
			$retA[$key] = $row[$key];

		if ( $includeRelations )
			foreach( $this->relations() as $relation => $relationA ) 
				$merged[$relation] = (new $relationA[1]())->export( $row->$relation );

		return array_merge( ['main' => $retA ], $merged );
	}
}
