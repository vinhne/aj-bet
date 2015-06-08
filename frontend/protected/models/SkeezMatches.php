<?php

/**
 * This is the model class for table "skeez_matches".
 *
 * The followings are the available columns in table 'skeez_matches':
 * @property string $id
 * @property string $league_id
 * @property string $team_match
 * @property string $match_time
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property SkeezLeagues $league
 */
class SkeezMatches extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'skeez_matches';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('league_id, team_match, match_time', 'required'),
			array('league_id, team_match', 'length', 'max'=>10),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, league_id, team_match, match_time, created, modified', 'safe', 'on'=>'search'),
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
			'league' => array(self::BELONGS_TO, 'SkeezLeagues', 'league_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'league_id' => 'League',
			'team_match' => '\'Team Match\'',
			'match_time' => '\'Time of match\'',
			'created' => 'Created',
			'modified' => 'Modified',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('league_id',$this->league_id,true);
		$criteria->compare('team_match',$this->team_match,true);
		$criteria->compare('match_time',$this->match_time,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SkeezMatches the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
