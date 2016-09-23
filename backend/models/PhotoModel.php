<?php

namespace backend\models;

use karpoff\icrop\CropImageUploadBehavior;
use yii;

/**
 * This is the model class for table "portfolio".
 *
 * @property integer $id
 * @property string $photo
 * @property string $photo_crop
 * @property string $photo_cropped
 *
 */
class PhotoModel extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'photo';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title'], 'required'],
			['photo', 'file', 'extensions' => 'png, jpeg, jpg, gif', 'on' => ['insert', 'update']],
			[['photo_crop', 'photo_cropped', 'title'], 'string', 'max' => 100]
		];
	}

	function behaviors()
	{
		return [
			[
				'class' => CropImageUploadBehavior::className(),
				'attribute' => 'photo',
				'scenarios' => ['insert', 'update'],
				'path' => '@webroot/uploads',
				'url' => '@web/uploads',
				'ratio' => 1,
				'crop_field' => 'photo_crop',
				'cropped_field' => 'photo_cropped',
			],
		];
	}
}
