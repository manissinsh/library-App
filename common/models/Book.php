<?php

namespace common\models;

use Imagine\Image\Box;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\imagine\Image;

/**
 * This is the model class for table "{{%books}}".
 *
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property int|null $published_at
 * @property int|null $language
 * @property int|null $library
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property Librarys $library0
 * @property User $updatedBy
 */
class Book extends \yii\db\ActiveRecord
{
    const STATUS_UNLISTED = 0;
    const STATUS_PUBLISHED = 1;

     /**
     * @var \yii\web\UploadedFile
     */
    public $thumbnail;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%books}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [['library', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['published_at'], 'string', 'max' => 255],
            [['language'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 255],
            ['thumbnail', 'image', 'maxWidth' => 3000],
            [['image'], 'string', 'max' => 2000],
            ['status', 'default', 'value' => self::STATUS_UNLISTED],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['library'], 'exist', 'skipOnError' => true, 'targetClass' => Librarys::className(), 'targetAttribute' => ['library' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'published_at' => 'Published At',
            'language' => 'Language',
            'library' => 'Library',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'thumbnail' => 'Thumbnail'
        ];
    }

    public function getStatusLabels()
    {
        return [
            self::STATUS_UNLISTED => 'Unlisted',
            self::STATUS_PUBLISHED => 'Published',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Library0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\LibrarysQuery
     */
    public function getLibrary0()
    {
        return $this->hasOne(Librarys::className(), ['id' => 'library']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\BooksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\BooksQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        
        $id = Yii::$app->security->generateRandomString(8);
        $isInsert = $this->isNewRecord;
        if ($this->thumbnail) {
            $this->image = $id.'-'.$this->thumbnail->name;
        }
        $saved = parent::save($runValidation, $attributeNames);
        if (!$saved) {  
            return false;
        }
        if ($this->thumbnail) {
            $thumbnailPath = Yii::getAlias('@frontend/web/storage/thumbs/' . $this->image);
            if (!is_dir(dirname($thumbnailPath))) {
                FileHelper::createDirectory(dirname($thumbnailPath));
            }
            $this->thumbnail->saveAs($thumbnailPath);
            Image::getImagine()
                ->open($thumbnailPath)
                ->thumbnail(new Box(600, 400))
                ->save();
        }

        return true;
    }

    public function getImageUrl()
    {
        return $this->image ?
            Yii::$app->params['frontendUrl'] . '/storage/thumbs/' . $this->image
            : Yii::$app->params['frontendUrl'] . '/img/no_image_available.png';
    }

    /**
     *
     * @return string
     * @author 
     */
    public function getShortDescription()
    {
        return \yii\helpers\StringHelper::truncateWords(strip_tags($this->description), 30);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        if ($this->image) {
            $thumbnailPath = Yii::getAlias('@frontend/web/storage/thumbs/' . $this->image);
            if (file_exists($thumbnailPath)) {
            unlink($thumbnailPath);
            }
        }
    }
    public static function getBooks()
    {
        return Self::find()->select(['title', 'id'])->andWhere(['library' => 'NULL'])->indexBy('id')->column();
    }
}