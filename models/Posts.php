<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\helpers\Url;
use yii\web\Application;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $slug
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['author_id', 'slug'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\queries\PostsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\queries\PostsQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(\Da\User\Model\User::className(), ['id' => 'author_id']);
    }

    public function behaviors()
    {
        return [
            'blame' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'author_id',
                'updatedByAttribute' => false,
            ],
            'slug' => [
                'class' => SluggableBehavior::className(),
                'attribute' => ['title', 'id'],
            ]
        ];
    }

    public function getUrl()
    {
        if (\Yii::$app instanceof Application) {
            return Url::to(['posts/view', 'slug' => $this->slug]);
        }

        return '';
    }
}
